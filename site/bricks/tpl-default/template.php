<?php snippet('pageheader') ?>

<div class="c-main o-wrapper">
  <h1><?php echo $page->title(); ?></h1>

  <?php if ($page->aside()->isNotEmpty()): ?>
    <div class="o-layout">
      <div class="o-layout__item u-4/5@lg">
  <?php endif ?>


  <?php echo $page->text()->kirbytext(); ?>

  <?php if ($page->aside()->isNotEmpty()): ?>
    </div>
  <?php endif ?>

  <?php if ($page->aside()->isNotEmpty()): ?>
    <aside class="c-sidebar o-layout__item u-1/5@lg">
      <?php echo $page->aside()->blocks(); ?>
    </aside>
  </div>
  <?php endif ?>
</div>

<?php snippet('pagefooter') ?>
