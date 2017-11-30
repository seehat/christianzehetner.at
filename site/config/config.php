<?php

/*
  = CORE
*/

// Licencse
c::set('license', 'put your license key here');

// Language
c::set('languages', array(
  array(
    'code'    => 'de',
    'name'    => 'Deutsch',
    'locale'  => 'de_DE',
    'url'     => '/',
    'default' => true,
  ),
  // array(
  //   'code'    => 'en',
  //   'name'    => 'English',
  //   'locale'  => 'en_US',
  //   'url'     => '/en',
  // ),
));
c::set('language.detect', false);


// General
c::set('locale', 'de_DE');
c::set('thumbs.driver', 'im');
c::set('date.handler', 'strftime');
c::set('markdown.extra', true);

// Cache
c::set('cache', true);
c::set('cache.ignore', []);

// Panel
c::set('panel.stylesheet', 'files/css/panel.css');

// Video
c::set('kirbytext.video.class', 'c-video o-ratio o-ratio--16:9');

/*
  = MODULES
*/

// Anchors
c::set('anchorheadings.id.prefix', 'section-');
c::set('anchorheadings.id.prepend.enum', false);
c::set('anchorheadings.heading.max', 4);
c::set('anchorheadings.markup', "<a href='" . url::current() . "#{id}' class='c-headingenum'>{enum}.</a> {heading}");


// Wrappers
c::set('wrapper_tags', [
  [
    'tag' => 'iconlist',
    'classname' => 'c-iconlist',
  ],
  [
    'tag' => 'teaser',
    'classname' => 'u-h5',
  ],
]);

// Cachebuster plugin
c::set('cachebuster', true);

// Use production assets by default
c::set('assets.suffix', '.min');

// Map Field Plugin
c::set('map.key', 'AIzaSyAR6VTa4YO3fXTFjdTWKOaRDDOWx1sZhp8');

// XML-Sitemap plugin
c::set('xmlsitemap.excludeSites', array('error'));
c::set('xmlsitemap.excludeTemplates', array('modules'));

// Bricks
c::set('plugin.bricks.remove.prefix', ['mod-', 'spt-', 'tpl-']);

// Metatags
c::set('meta-tags.default', [
    'title' => function ($page) {
        $controller = SeoCore::panel( $page );
	    $content = $controller['title']['full-replaced'];
        return $content;
    },
    'meta' => [
        'description' => function ($page) {
            $controller = SeoCore::panel( $page );
            $content = $controller['description']['full-replaced'];
            return $content;
        }
    ],
    'link' => [
        'canonical' => function($page) { return $page->url(); },
    ],
    'og' => [
        'title' => function($page) {
            return $page->isHomePage()
                    ? $page->site()->title()
                    : $page->title();
        },
        'type' => 'website',
        'site_name' => function ($page) {
          return $page->site()->title();
        },
        'url' => function($page) { return $page->url(); },
        'locale' => function ($page) {
          return str_replace('.UTF8','',$page->site()->locale());
        },
    ]
]);



// Localhost settings

if (in_array( r::ip(), [ 'localhost', '127.0.0.1', '::1' ] )) {
  // Enable debugging on the dev host but disable caching
  c::set('debug', true);
  c::set('cache', false);

  // Disable assets suffix on the dev host
  c::set('assets.suffix', '');
}
