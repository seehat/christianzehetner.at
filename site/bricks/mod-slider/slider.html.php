<div class="fotorama"
     data-width="100%"
     <?php ecco ($module->fullheight()->isTrue(), 'data-height="100%"'); ?>
     data-ratio="<?php echo $module->ratio() ?>"
     data-fit="cover"
     data-autoplay="<?php ecco($module->autoplay()->isNotEmpty(), $module->autoplay(), '0') ?>"
     data-transition="<?php echo $module->transition() ?>"
     data-nav="<?php echo $module->nav() ?>"
     data-transitionduration="<?php echo $module->transitionduration() ?>"
     data-loop="<?php ecco($module->loop()->bool(), 'true', 'false') ?>">
  <?php foreach ($module->images()->sortBy('sort', 'asc') as $image): ?>
    <?php
    $ratio = explode('/', $module->ratio()->value);
    $ratio = $ratio[0] / $ratio[1];

    if($image->isLandscape() || $image->isSquare()) {
      $width  = $image->width();
      $height = round($width / $ratio);
    } else {
      $height = $image->height();
      $width  = round($height * $ratio);
    }
    ?>
    <div data-img="<?php echo $image->focusCrop($width, $height)->url() ?>" class="c-fotorama__overlay">
      <div class="c-fotorama__caption u-1/2@md"><?php echo $image->caption()->kirbytext(); ?></div>
    </div>
  <?php endforeach ?>
</div>
