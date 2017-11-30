<?php

function handleLinkExtensions ($tag, $text){
  $icon = $tag->attr('icon');
  $btn = $tag->attr('btn');
  $iconposition = $tag->attr('iconposition') != null ? $tag->attr('iconposition') : 'left';
  $classes = explode(' ' , $tag->attr('class'));

  if ($icon) {
    $iconBrick = kirbytag(array(
      'icon'  => $icon,
    ));

    switch ($iconposition) {
      case 'left':
        $text = $iconBrick . ' ' . $text;
        break;
      case 'right':
        $text =  $text . ' ' . $iconBrick;
        break;
    }
  }

  if ($btn) {
    $btnclasses = explode(' ', $btn);
    if (!array_key_exists('default', $btnclasses)) $btnclasses[] = 'default';

    $btnclasses = array_map(function ($item) {
      return 'c-btn--' . $item;
    }, $btnclasses);
    $btnclasses[] = 'c-btn';
    $classes = array_merge($classes, $btnclasses);
  }
  else {
    $classes[] = 'c-link';
  }

  return array(
    'text' => $text,
    'classes' => $classes,
  );
}

// link tag
kirbytext::$tags['link'] = array(
  'attr' => array(
    'text',
    'class',
    'role',
    'title',
    'rel',
    'lang',
    'target',
    'popup',
    'icon',
    'iconposition',
    'btn',
  ),
  'html' => function($tag) {

    $link = url($tag->attr('link'), $tag->attr('lang'));
    $text = $tag->attr('text');

    if(empty($text)) {
      $text = $link;
    }

    if(str::isURL($text)) {
      $text = url::short($text);
    }

    $data = handleLinkExtensions($tag, $text);

    return html::a($link, $data['text'], array(
      'rel'    => $tag->attr('rel'),
      'class'  => trim(implode(' ', $data['classes'])),
      'role'   => $tag->attr('role'),
      'title'  => $tag->attr('title'),
      'target' => $tag->target(),
    ));

  }
);


kirbytext::$tags['email'] = array(
  'attr' => array(
    'text',
    'class',
    'title',
    'rel',
    'icon',
    'iconposition',
    'btn',
  ),
  'html' => function($tag) {

    $text = $tag->attr('text');

    $data = handleLinkExtensions($tag, $text);

    return html::email($tag->attr('email'), html($data['text']), array(
      'rel'    => $tag->attr('rel'),
      'class'  => trim(implode(' ', $data['classes'])),
      'role'   => $tag->attr('role'),
      'title'  => $tag->attr('title'),
      'target' => $tag->target(),
    ));
  }
);


kirbytext::$tags['tel'] = array(
  'attr' => array(
    'text',
    'class',
    'title',
    'icon',
    'iconposition',
    'btn',
  ),
  'html' => function($tag) {

    $text = $tag->attr('text');
    $tel  = str_replace(array('/', ' ', '-'), '', $tag->attr('tel'));

    if(empty($text)) $text = $tag->attr('tel');

    $data = handleLinkExtensions($tag, $text);

    return html::a('tel:' . $tel, html($data['text']), array(
      'rel'    => $tag->attr('rel'),
      'class'  => trim(implode(' ', $data['classes'])),
      'title'  => html($tag->attr('title'))
    ));
  }
);
