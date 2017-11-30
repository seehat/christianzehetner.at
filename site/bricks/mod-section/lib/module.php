<?php

namespace mgf\ModulesRenderer;

use tpl;
use obj;
use Brick;

class Module extends obj {

  public function __construct ($modulePage) {
    $this->modulePage = $modulePage;
    $this->moduleObj = $modulePage->module();
  }

  public function render () {
    return $this->renderModule($this->modulePage);
  }

  private function renderModule ($modulePage, $output = "") {

    if ($modulePage->hasModules()) {
      $output = "";

      foreach ($modulePage->moduleList() as $child) {
        $modulecontent = $this->renderModule($child, $output);
        $output .= $modulecontent;
      }
    }
    else {
      $output = $modulePage->render(array(), true);
    }

    switch ($modulePage->layout()->or('off')) {
      case 'off':
        if ($modulePage->width() == 'default') {
          $wrapper = new Brick('div');
          $wrapper->addClass('o-wrapper');
          $output = $wrapper->append($output);
        }
        else if ($modulePage->width() == 'halve') {
          $wrapper = new Brick('div');
          $wrapper->addClass('o-wrapper o-wrapper--1/2');
          $output = $wrapper->append($output);
        }
        break;
    }


    if ($modulePage->layout()->or('off') != 'off') {

      $contentLayer = new Brick('div');
      $contentLayer->addClass('o-section__content');
      $output = $contentLayer->append($output);

      $imageLayer = new Brick('div');
      $imageLayer->addClass('o-section__image');

      if ($modulePage->img()->isNotEmpty()) {
        $image = $modulePage->img()->toFile();
        $imageLayer->attr('style', "background-image: url(" . $image->url() . "); background-position: " . $image->focusX() * 100 . "% " . $image->focusY() * 100 . "%; opacity: " . $modulePage->imagetransparency()->value);
      }

      $output = $output . $imageLayer;
    }

    $section = new Section($modulePage);
    $section->append($output);
    $output = $section;

    return $output;
  }

}
