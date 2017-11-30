<?php

kirbytext::$pre[] = function($kirbytext, $text) {

  $text = preg_replace_callback('!\(demo(…|\.{3})\)(.*?)\((…|\.{3})demo\)!is', function($matches) use($kirbytext) {

    $columns = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
    $html    = array();

    $i = 0;
    foreach($columns as $column) {
      $field = new Field($kirbytext->field->page, null, trim($column));
      $classes = array('c-demo__item');
      $classes[] = $i == 1 ? 'c-demo__item--code' : 'c-demo__item--preview';

      $html[] = '<div class="' . implode(' ', $classes) . '">' . kirbytext($field) . '</div>';
      $i++;
    }

    return '<div class="c-demo">' . implode($html) . '</div>';

  }, $text);

  return $text;

};
