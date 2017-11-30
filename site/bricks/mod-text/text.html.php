<?php
$classes = array();
$styles = array();
$classes[] = 'u-text-' . $module->align()->or('left');

$classes[] = 'c-text-color-' . $module->textcolorswatch()->value;
$classes = implode(' ', $classes);
$styles = implode('; ',  $styles);
?>


<div class="c-text <?php echo $classes; ?>" style="<?php echo $styles; ?>">
  <?php snippet('moduletitle', array('module' => $module)) ?>
	<?= kirbytext($module->text()) ?>
</div>
