<?php

/**
 * JsVars
 *
 * This is the class to handle
 * transfer of phpvars to js.
 *
 * Usage: jsvars::set('name', 'value');
 *
 * @author    Christian Zehetner <christian@mgf.at>
 * @copyright Christian Zehetner
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
class JSVars extends Silo {
  static public $data = array();

  static public function output () {
    if (count (JSVars::$data) > 0) {
      $script = new Brick('script');

      foreach (JSVars::$data as $key => $item) {
        $jsline = "window.mgf." . $key . " = " . json_encode($item) . ";";
        $script->append($jsline);
      }

      echo $script;
    }
  }
}
