<?php

use mgf\ImageConverter;

function onimagechange($file) {
  $options = array(
    'destination'=> c::get('onimagechange.destination', '{name}.{extension}'),
    'quality'    => c::get('onimagechange.quality', 100),
    'blur'       => c::get('onimagechange.blur', false),
    'blurpx'     => c::get('onimagechange.blurpx', 10),
    'width'      => c::get('onimagechange.width', 1280),
    'height'     => c::get('onimagechange.height', 1280),
    'upscale'    => c::get('onimagechange.upscale', false),
    'crop'       => c::get('onimagechange.crop', false),
    'grayscale'  => c::get('onimagechange.grayscale', false),
    'tosRGB'     => c::get('onimagechange.tosRGB', true),
    'autoOrient' => c::get('onimagechange.autoOrient', true),
    'interlace'  => c::get('onimagechange.interlace', false),
  );

  try {
    if ($file->type() == 'image') {
      ImageConverter::convert($file, $options);
    }
  } catch(Exception $e) {
    return response::error($e->getMessage());
  }
}

$kirby->set('hook', 'panel.file.upload', 'onimagechange');
$kirby->set('hook', 'panel.file.replace', 'onimagechange');
