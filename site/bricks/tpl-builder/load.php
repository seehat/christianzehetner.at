<?php

kirby()->hook('panel.page.update', function($page) {
  if ($page->template() == "builder" AND !$page->children()->has('modules')) {
    $page->children()->create('modules', 'modules', array(
    	'title' => '_modules'
    ));
  }
  elseif($page->children()->find("modules")) {
    $page->children()->find("modules")->delete(true);
  }
});
