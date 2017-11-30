<?php

// link tag
kirbytext::$tags['space'] = array(
  'attr' => array(
  ),
  'html' => function($tag) {

    $brick = new Brick('div');
    $brick->addClass('u-padding-bottom');
    $brick->addClass('u-padding-bottom-' . $tag->attr('space'));

    return $brick;

  }
);
