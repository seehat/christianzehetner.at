<?php snippet('htmlheader') ?>

<div class="c-main u-padding-small">
  <h1><?php echo $page->title(); ?></h1>

  <?php echo $page->text()->kirbytext(); ?>

  <div class="c-footer">
      <?php if ($site->footertext()->isNotEmpty()): ?>
        <?php echo $site->footertext()->kirbytextRaw(); ?>
      <?php endif ?>
      <?php snippet("sociallinks") ?>
  </div>
</div>




<?php snippet('htmlfooter') ?>
