<?php

field::$methods['blocks'] = function($field) {
  $output = new Brick('div');

  foreach ($field->toStructure() as $entry) {
    $block = page('blocks')->find($entry->uid());
    if ($block) {
      $header = new Brick("h2");
      if ($entry->caption()->isNotEmpty()) {
        $header->append($entry->caption());
      }
      else {
        $header->append($block->title());
      }

      $output->append($header);
      $output->append($block->text()->kirbytext());
    }
  }

  return $output;
};



$kirby->plugin('sortable');

if(!function_exists('sortable')) return;

$kirby->set('field', 'blocks', __DIR__ . DS . 'fields' . DS . 'blocks');

$sortable = sortable();
// $sortable->set('action', 'stock', __DIR__ . DS . 'actions' . DS . 'stock');
$sortable->set('layout', 'block', __DIR__ . DS . 'layouts' . DS . 'block');
$sortable->set('variant', 'blocks', __DIR__ . DS . 'variants' . DS . 'blocks');


$kirby->set('blueprint', 'fields/blockselector', __DIR__ . '/blueprints/fields/blockselector.yml');
