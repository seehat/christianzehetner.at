<?php snippet('htmlheader') ?>

<div class="c-main u-padding-small">
  <h1><?php echo $page->title(); ?></h1>

  <?php echo $page->text()->kirbytext(); ?>

  <div class="o-layout o-layout--small">
    <?php foreach($page->children()->visible() as $p): ?>
      <div class="o-layout__item u-1/2 u-1/5@md u-margin-bottom-small">
        <a href="<?php echo $p->url() ?>">
          <img src="<?php echo $p->images()->first()->focusCrop(800, 800)->url(); ?>" title="<?php echo $p->title()->html() ?>" alt="<?php echo $p->title()->html() ?>">
        </a>
      </div>
    <?php endforeach ?>
  </div>

  <div class="c-footer">
      <?php if ($site->footertext()->isNotEmpty()): ?>
        <?php echo $site->footertext()->kirbytextRaw(); ?>
      <?php endif ?>
      <?php snippet("sociallinks") ?>
  </div>

</div>

<?php snippet('htmlfooter') ?>
