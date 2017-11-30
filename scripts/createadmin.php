<?php

define('DS', DIRECTORY_SEPARATOR);

// load kirby
require(dirname(__DIR__) . DS . 'kirby' . DS . 'bootstrap.php');
require(dirname(__DIR__) . DS . 'site.php');

$user = kirby()->site()->users()->create([
  'username' => 'admin',
  'password' => 'pass',
  'email'    => 'admin@mgf.at',
  'role'     => 'admin',
  'language' => 'de'
]);
