<?php

require __DIR__ . '/vendor/autoload.php';

$kirby = kirby();

$kirby->roots->avatars = __DIR__ . DS . 'files' . DS . 'avatars';
$kirby->roots->cache = __DIR__ . DS . 'files' . DS . 'cache';
$kirby->roots->thumbs = __DIR__ . DS . 'files' . DS . 'thumbs';

$kirby->urls->thumbs = url::makeAbsolute('/files/thumbs', $kirby->urls->index);
$kirby->urls->assets = url::makeAbsolute('/assets', $kirby->urls->index);
