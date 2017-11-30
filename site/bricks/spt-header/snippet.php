<div class="c-header u-color-tint-bg">
  <div class="o-wrapper">
    <div class="o-layout o-layout--middle o-layout--flush">
      <div class="c-header__logo u-padding-top-small u-padding-bottom-small o-layout__item u-3/5@sm u-1/5@md">
        <?= snippet ('logo'); ?>
      </div>
      <div class="c-header__nav o-layout__item u-4/5 u-hide u-display-inline-block@md u-text-right">
        <?= snippet ('nav'); ?>
      </div>
      <div class="c-header__mobile o-layout__item u-2/5 u-hide@md u-text-right">
        <?php if ($site->phone()->isNotEmpty()): ?>
          <?= kirbytag(array('tel' => $site->phone(), 'text' => '<i class="fa fa-phone"></i>', 'class' => 'c-header__mobile__item')); ?>
        <?php endif ?>

        <?php if ($site->email()->isNotEmpty()): ?>
        <?= kirbytag(array('email' => $site->email(), 'text' => '<i class="fa fa-envelope"></i>', 'class' => 'c-header__mobile__item')); ?>
        <?php endif ?>

        <a href="#" id="js-responsive-nav-toggle" class="c-header__mobile__item" onclick=""><i class="fa fa-bars"></i></a>
      </div>
    </div>
  </div>
</div>
