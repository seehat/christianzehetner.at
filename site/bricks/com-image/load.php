<?php

kirbytext::$tags['image'] = array(
  'attr' => array(
    'width',
    'height',
    'alt',
    'text',
    'title',
    'class',
    'imgclass',
    'linkclass',
    'caption',
    'link',
    'target',
    'popup',
    'rel'
  ),
  'html' => function($tag) {

    $url     = $tag->attr('image');
    $alt     = $tag->attr('alt');
    $title   = $tag->attr('title');
    $link    = $tag->attr('link');
    $caption = $tag->attr('caption');
    $file    = $tag->file($url);

    // use the file url if available and otherwise the given url
    $url = $file ? $file->url() : url($url);

    // alt is just an alternative for text
    if($text = $tag->attr('text')) $alt = $text;

    // try to get the title from the image object and use it as alt text
    if($file) {

      if(empty($alt) and $file->alt() != '') {
        $alt = $file->alt();
      }

      if(empty($title) and $file->title() != '') {
        $title = $file->title();
      }

    }

    // at least some accessibility for the image
    if(empty($alt)) $alt = ' ';

    $linkclass = $tag->attr('linkclass');
    $linkattr = array();

    // build the href for the link
    if($link == 'self') {
      $href = $url;
    } else if($file and $link == $file->filename()) {
      $href = $file->url();
    } else if($tag->file($link)) {
      $href = $tag->file($link)->url();
    } else if($link != "") {
      $href = $link;
    } else if ($file) {    // generate thumb and image zoom

      // save original image destination
      $href = $file->url();

      // add width for photoswipe
      $linkattr['data-width'] = $file->width();
      $linkattr['data-height'] = $file->height();

      // use thumb as standard image
      if ($file->extension() != 'gif') {
        $file = $file->width(1280);
      }

      $url = $file->url();

      // add class for photoswipe
      $linkclass .=  ' js-zoom';
    }
    else {
      return "";    // Image not found
    }

    // link builder
    $_link = function($image) use($tag, $url, $href, $file, $linkclass, $linkattr) {

      if(empty($href)) return $image;

      $attr = array(
        'rel'    => $tag->attr('rel'),
        'class'  => $linkclass,
        'title'  => $tag->attr('title'),
        'target' => $tag->target()
      );

      $attr = $attr + $linkattr;
      return html::a(url($href), $image, $attr);

    };

    // image builder
    $_image = function($class) use($tag, $url, $alt, $title) {
      return html::img($url, array(
        'width'  => $tag->attr('width'),
        'height' => $tag->attr('height'),
        'class'  => $class,
        'title'  => $title,
        'alt'    => $alt
      ));
    };

    if(kirby()->option('kirbytext.image.figure') or !empty($caption)) {
      $image  = $_link($_image($tag->attr('imgclass')));
      $figure = new Brick('figure');
      $figure->addClass($tag->attr('class'));
      $figure->append($image);
      if(!empty($caption)) {
        $figure->append('<figcaption>' . html($caption) . '</figcaption>');
      }
      return $figure;
    } else {
      $class = trim($tag->attr('class') . ' ' . $tag->attr('imgclass'));
      return $_link($_image($class));
    }

  }
);
