<?php

namespace mgf\ModulesRenderer;

use Brick;
use Str;
use mgf\Toolkit\Color;

class Section extends Brick {

  public static $containerClass = 'o-section';
  public $modulePage;

  private $availableOptions = array(
    'height',
    'layout',
  );

  private $styles = array();

  public function __construct ($modulePage) {
    parent::__construct('div');
    $this->modulePage = $modulePage;

    $this->attr('id', $modulePage->uid());

    $this->addClass(static::$containerClass);
    $this->addClass('o-section--' . str::slug($modulePage->template()));
    $this->addClass('is-inactive');

    foreach ($this->availableOptions as $name) {
      $this->addOption($name);
    }

    switch ($modulePage->layout()->or('off')) {
      case 'off':
        $this->addOption('width');
        $this->addOption('spacing');
      case 'sidebyside':
        $this->addOption('contentorientationhorizontal');
        $this->addOption('contentorientationvertical');
        $this->addOption('contentanimation', static::$containerClass . '--');
        $this->addOption('imageanimation', static::$containerClass . '--');
        break;
      case 'circle':
        $this->addOption('contentorientationhorizontal');
        $this->addOption('contentanimation', static::$containerClass . '--');
        $this->addOption('imageanimation', static::$containerClass . '--');
        break;
      case 'overlay':
        $this->addClass('o-section--width-full');
        $this->addOption('spacing');
        $this->addOption('contentposition');
        $this->addOption('contentanimation', static::$containerClass . '--');
        $this->addOption('imageanimation', static::$containerClass . '--');
        break;
    }

    if ($modulePage->bgcolor()->isNotEmpty()) {
      $this->styles[] = "background-color: " . $modulePage->bgcolor()->value;
    }

    $this->generateStyles();
  }

  public function getSectionSetting ($name) {
    return $this->modulePage->{$name}();
  }

  public function addOption ($name, $prefix = '') {
    if ($this->modulePage->{$name}()->isNotEmpty()) {
      if ($prefix == "") $prefix = static::$containerClass . '--' . $name . '-';
      $this->addClass($prefix . $this->modulePage->{$name}()->value);
    }
  }

  public function addStyle($style) {
    $this->styles[] = $style;
  }

  public function generateStyles() {
    $this->attr('style', implode('; ',  $this->styles));
  }

}
