<div id="map" class="map"></div>

<?php
$coords_all = array();
foreach($locations->toStructure() as $location) {
  $coords = $location->location()->yaml();
  $coords_all[] = array(
    'text' => (string)$location->text()->kirbytext(),
    'latlng' => array($coords['lat'], $coords['lng']),
  );
}

jsvars::set('modulemapcoords', $coords_all);
?>
