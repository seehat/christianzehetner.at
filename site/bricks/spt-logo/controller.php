<?php

return function($site, $pages, $page) {
  $options = array(
    'href' => url(),
    'title' => $site->title(),
    'alt' => 'zur Startseite',
  );

  if ($site->logo()->isNotEmpty()) {
    $logo = $site->logo()->toFile();

    if (file_exists($logo->root())) {
      $options['image'] = $logo->url();
    }
  }

  return $options;
};
