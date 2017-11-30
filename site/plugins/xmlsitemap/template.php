<?php

$excludeSites = c::get('xmlsitemap.excludeSites', array('error'));
$excludeTemplates = c::get('xmlsitemap.excludeTemplates', array());

// send the right header
header('Content-type: text/xml; charset="utf-8"');

// echo the doctype
echo '<?xml version="1.0" encoding="utf-8"?>';

?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <?php foreach($pages as $p): ?>

  <?php // if($p->depth() > 2) continue ?>
  <?php if(in_array($p->intendedTemplate(), $excludeTemplates)) continue ?>
  <?php if(in_array($p->uri(), $excludeSites)) continue ?>
  <url>
    <loc><?php echo html($p->url()) ?></loc>
    <lastmod><?php echo date('c', $p->modified()) ?></lastmod>
    <priority><?php echo ($p->isHomePage()) ? 1 : number_format(0.5/$p->depth(), 1) ?></priority>
  </url>
  <?php endforeach ?>
</urlset>
