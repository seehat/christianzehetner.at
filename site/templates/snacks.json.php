<?php

$children = [];

foreach ($page->children()->visible() as $child) {

  $children[] = [
    'uri' => $child->uri(),
    'title' => $child->title()->toString(),
    'image' => $child->images()->first()->url(),
  ];
}

echo json_encode($children);
