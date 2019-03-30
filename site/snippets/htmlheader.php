<?= snippet('maintenance');  ?>

<!DOCTYPE html>
<html class="no-js" lang="<?php echo (is_null($site->language()) ? 'de' : $site->language()->code()) ?>">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true"/>
    <base href="<?= site()->url() ?>">
    <?php echo $page->metaTags() ?>

    <?php // snippet('favicons') ?>

    <?php echo css('files/css/site' . c::get('assets.suffix') . '.css') ?>

  </head>
<body>
