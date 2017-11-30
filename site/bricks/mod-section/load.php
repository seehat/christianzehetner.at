<?php

namespace mgf\ModulesRenderer;

require_once __DIR__ . DS . 'lib' . DS . 'section.php';
require_once __DIR__ . DS . 'lib' . DS . 'module.php';
require_once __DIR__ . DS . 'lib' . DS . 'modules.php';

kirby()->set('blueprint', 'modules', __DIR__ . '/blueprints/modules.yml');
kirby()->set('blueprint', 'fields/modules', __DIR__ . '/blueprints/fields/modules.yml');
kirby()->set('blueprint', 'fields/sectionsettings', __DIR__ . '/blueprints/fields/sectionsettings.yml');
