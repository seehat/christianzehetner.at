<?php


if(class_exists('Panel')) {

  $kirby->plugin('sortable');
  $kirby->plugin('kirby-bricks');
  $kirby->plugin('modules');

  if(!function_exists('sortable')) return;

  $sortable = sortable();
  $sortable->set('action', 'add', __DIR__ . DS . 'actions' . DS . 'add');

}

