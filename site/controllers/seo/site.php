<?php
return function($site, $pages, $page) {
  $title = '{{title}} - {{sitename}}';
  if ($page->isHomePage())  $title = '{{sitename}}';

  return [
    'title' => [
      'template' => $title,
      'suffix' => '',
      'prefix' => ''
    ],
    'description' => [
      'template' => '{{excerpt}}',
    ],
    'values' => [
        'title' => $page->title(),
        'excerpt' => $page->text()->excerpt(),
        'sitename' => $site->title(),
    ]
  ];
};
