<?php

class Gallery {

  private static $defaults = array(
    'margins' => 6,
    'limit' => false,
    'order' => 'default',
  );

  private static $figure_defaults = array(
    'classes' => [],
  );

  public static function create ($images, $args = array()) {

    $options = array_merge(static::$defaults, $args);
    jsvars::set('modgallery_margins', $options['margins']);

    $images_count = count($images);

    // Order Images
    $order = strtolower($options['order']);
    if ($order === 'reverse') $images = $images->flip();
    if ($order === 'random' || $order === 'shuffle') $images = $images->shuffle();

    $limit = $options['limit'];
    $use_limit = $limit && $limit < $images_count;
    $preview_count = $use_limit ? $limit : $images_count;

    $gallery = new Brick('div');
    $gallery->addClass('c-gallery js-gallery');
    $gallery->addClass('justified-gallery');
    $gallery->attr('itemscope', true);
    $gallery->attr('itemtype', 'http://schema.org/ImageGallery');

    $idx = 0;
    foreach ($images as $image) {

      // Check if the image should be previewed
      $is_last_previewed = $idx == ($preview_count - 1);
      $is_not_previewed = $idx >= $preview_count;

      $figure = static::createFigure($image, $args);
      $figure->attr('data-count', $images_count);
      $figure->attr('data-more-count', $images_count - $idx - 1);

      if ($is_last_previewed) $figure->addClass('is-last-previewed');
      if ($is_not_previewed) $figure->addClass('is-not-previewed');

      $gallery->append($figure);

      $idx++;
    }

    return $gallery;
  }

  public static function createFigure ($image, $args = array()) {
    $options = array_merge(static::$figure_defaults, $args);

    $caption = $image->caption()->or($image->filename());

    $figure = new Brick ('figure');
    $figure->attr('itemscope', true);
    $figure->attr('itemprop', 'associatedMedia');
    $figure->attr('itemtype', 'http://schema.org/ImageObject');

    $figure->addClass($options['classes']);

    $link = new Brick('a');
    $link->attr('itemprop', 'contentUrl');
    $link->data('size', $image->width() . 'x' . $image->height());
    $link->attr('href', $image->url());
    $link->attr('title', $caption);

    $thumb = $image->width(800);
    $img = new Brick('img');
    $img->attr('src', $thumb->url());
    $img->attr('itemprop', 'thumbnail');
    $img->attr('alt', $caption);
    $img->attr('width', $thumb->width());
    $img->attr('height', $thumb->height());

    $figcaption = new Brick('figcaption');
    $figcaption->addClass('caption');
    $figcaption->append($caption);

    $link->append($img);
    $figure->append($link);
    $figure->append($figcaption);

    return $figure;
  }

}



kirbytext::$tags['gallery'] = array(
  'attr' => [ 'limit', 'page', 'order'],
  'html' => function($tag) {
    $page = $tag->page();
    $images = $tag->attr('gallery');

    // Allow other pages as file-source (esp. for the `kirbytag` function)
    $custom_page = $tag->attr('page', false);
    if ($custom_page) $custom_page = page($custom_page);
    if ($custom_page) $page = $custom_page;

    if ($images == 'all') {
      $images = $page->images()->sortBy('sort', 'asc');
    }
    else {
      $images = str::split($images);

      if (count($images) == 1) {
        $images = array($page->file($images[0]));
      }
      else {
        $images = $page->files()->find($images);
      }
    }

    $args = array(
      'limit' => $tag->attr('limit', false),
      'order' => $tag->attr('order', 'default'),
    );

    if (!empty($images)) {

      $gallery = Gallery::create($images, $args);
      $gallery->addClass('u-margin-bottom');

      return $gallery;
    }
  }
);
