<div class="c-footer">
  <div class="o-wrapper">
    <?php if ($site->footertext()->isNotEmpty()): ?>
      <?php echo $site->footertext()->kirbytextRaw(); ?>
    <?php endif ?>
    <?php snippet("sociallinks") ?>
  </div>
</div>
