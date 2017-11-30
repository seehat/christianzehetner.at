<?php

kirby()->routes(array(
  array(
    'pattern' => 'sitemap.xml',
    'action'  => function() {
      $pages = kirby()->site()->pages()->visible()->index();
      $pages = $pages->filterBy('isModule', false);

      return new Response (tpl::load(__DIR__ . DS . 'template.php', array('pages' => $pages)));
    }
  )
));
