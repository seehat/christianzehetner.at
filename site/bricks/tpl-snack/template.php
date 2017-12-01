<?php snippet('htmlheader') ?>

<img src="<?php echo $page->images()->first()->url() ?>" alt="">

<div class="c-main u-padding-small">
  <h1><?php echo $page->title(); ?></h1>

  <?php echo $page->text()->kirbytext(); ?>

  <h2>Das brauchst du dafür:</h2>
  <?php echo $page->ingredients()->kirbytext() ?>

  <div class="c-footer">
      <?php if ($site->footertext()->isNotEmpty()): ?>
        <?php echo $site->footertext()->kirbytextRaw(); ?>
      <?php endif ?>
      <?php snippet("sociallinks") ?>
  </div>
</div>

<?php snippet('htmlfooter') ?>
