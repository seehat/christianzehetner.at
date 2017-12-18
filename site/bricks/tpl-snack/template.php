<?php snippet('htmlheader') ?>

<div class="o-wrapper">

  <a class="c-btn c-btn--default c-btn--small" href="<?php echo url('snacks') ?>"><i class="fa fa-arrow-left"></i></a>

  <h1 class="u-margin-top u-margin-bottom-small"><?php echo $page->title(); ?></h1>

  <?php if ($page->duration()->isNotEmpty()): ?>
    <div class="u-margin-bottom-large">
      Zubereitungszeit: <?php echo $page->duration() ?> min
    </div>
  <?php endif ?>

  <div class="o-layout">

    <div class="o-layout__item u-2/5@md">

      <img src="<?php echo $page->images()->first()->url() ?>" alt="">

    </div>

    <div class="o-layout__item u-3/5@md">

      <div class="c-main u-padding-small">

        <?php foreach ($page->tags()->split() as $tag): ?>
          <?php //echo $tag ?>
        <?php endforeach ?>

        <?php if ($page->ingredients()->isNotEmpty()): ?>
          <h2>Das brauchst du dafür:</h2>
          <?php echo $page->ingredients()->kirbytext() ?>
        <?php endif ?>

        <?php if ($page->text()->isNotEmpty()): ?>
          <h2>Zubereitung:</h2>
          <?php echo $page->text()->kirbytext(); ?>
        <?php endif ?>

      </div>
    </div>

  </div>

  <div class="c-footer">
      <?php if ($site->footertext()->isNotEmpty()): ?>
        <?php echo $site->footertext()->kirbytextRaw(); ?>
      <?php endif ?>
      <?php snippet("sociallinks") ?>
  </div>

</div>

<?php snippet('htmlfooter') ?>
