<?php
$margin = $module->margin()->value;
switch ($margin) {
  case 'none': $margin = 0; break;
  case 'tiny': $margin = 6; break;
  case 'small': $margin = 12; break;
  case 'middle': $margin = 24; break;
  case 'large': $margin = 48; break;
  case 'huge': $margin = 96; break;
}

$args = array(
  'margins' => $margin,
);

?>

<?php echo Gallery::create($module->images()->sortBy('sort', 'asc'), $args) ?>
