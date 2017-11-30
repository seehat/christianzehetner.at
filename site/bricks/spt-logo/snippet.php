<div itemscope itemtype="http://schema.org/Organization">
  <a itemprop="url" href="<?= url($href) ?>" class="c-logo" title="<?php echo $alt ?>">
    <?php if (isset($image)): ?>
      <img itemprop="logo" src="<?php echo $image ?>" alt="<?php echo $alt ?>">
    <?php else: ?>
      <?php echo $title; ?>
    <?php endif ?>
  </a>
</div>
