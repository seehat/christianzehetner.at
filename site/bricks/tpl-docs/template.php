<?php snippet('pageheader') ?>

<div class="c-main o-wrapper">
  <h1><?php echo $page->title(); ?></h1>
  <div class="o-layout o-layout--fullheight">
    <div class="c-sidebar o-layout__item u-2/5@md">
      <div class="js-pinned">
        <h4>Inhaltsverzeichnis</h4>
        <?php echo $page->text()->kirbytext()->toc() ?>
      </div>
    </div>
    <div class="o-layout__item u-3/5@md">
      <?php echo str_replace('(\\', '(', $page->text()->kirbytext()->headingAnchors()) ?>
    </div>
  </div>
</div>

<?php snippet('pagefooter') ?>
