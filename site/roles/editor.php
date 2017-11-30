<?php

// site/roles/editor.php
return [
  'name'        => 'Editor',
  'default'     => false,
  'permissions' => [
    '*'              => true,
    'panel.page.url' => false,
    'panel.access.users'      => false,
  ]
];
