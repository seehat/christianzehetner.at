<?php snippet('header') ?>

<div class="o-wrapper">

<div class="c-avatar">
  <img src="<?php echo $page->images()->first()->crop(500,500)->url() ?>" class="c-avatar__img">
  <div class="c-avatar__title">Christian Zehetner</div>
  <div class="c-avatar__description">lösungsorientierter Coach für Persönlichkeitsentwicklung</div>
</div>


<?php echo $page->text()->kirbytext() ?>

</div>

<?php snippet('footer') ?>
