<?php
$height = $module->height()->or(0)->value;
$class = "";
$style = "";

switch ($height) {
  case 1: $class = 'u-margin-top-tiny'; break;
  case 2: $class = 'u-margin-top-small'; break;
  case 3: $class = 'u-margin-top-large'; break;
  case 4: $class = 'u-margin-top-huge'; break;
  case 5: $style = 'height: 100vh;'; break;
}

?>

<div class="<?php echo $class; ?>" <?php ecco ($style != '', 'style="' . $style . '"'); ?> ></div>
