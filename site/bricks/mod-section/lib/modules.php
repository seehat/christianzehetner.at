<?php

namespace mgf\ModulesRenderer;

class Modules {

  private $page;

  public function __construct ($page) {
    $this->page = $page;
  }

  public function render () {
    $output = "";
    foreach ($this->page->moduleList() as $child) {
      $module = new Module($child);
      $output .= $module->render();
    }

    return $output;
  }

}
