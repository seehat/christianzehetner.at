<div class="c-footer u-text-center">
  <div class="o-wrapper">
    <?php if ($site->footertext()->isNotEmpty()): ?>
      <?php echo $site->footertext()->kirbytextRaw(); ?>
    <?php endif ?>
    <?php snippet("sociallinks") ?>
  </div>
</div>
