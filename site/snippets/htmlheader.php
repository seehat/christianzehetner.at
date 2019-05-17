<?= snippet('maintenance');  ?>

<!DOCTYPE html>
<html class="no-js" lang="<?php echo (is_null($site->language()) ? 'de' : $site->language()->code()) ?>">
  <head>

    <meta charset="utf-8">
    <meta name="mobile-web-app-capable" content="yes" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="HandheldFriendly" content="true"/>
    <link rel="authorization_endpoint" href="https://indieauth.com/auth">
    <link rel="token_endpoint" href="https://tokens.indieauth.com/token">
    <link rel="microsub" href="https://aperture.p3k.io/microsub/288">
    <base href="<?= site()->url() ?>">
    <?php echo $page->metaTags() ?>

    <?php // snippet('favicons') ?>

    <?php echo css('files/css/site' . c::get('assets.suffix') . '.css') ?>

  </head>
<body>
