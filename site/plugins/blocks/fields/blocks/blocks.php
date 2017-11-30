<?php

class BlocksField extends SortableField {

  public $add     = true;
  public $copy    = true;
  public $paste   = true;
  public $layout  = 'block';
  public $variant = 'blocks';
  public $actions = array(
    'edit',
    'duplicate',
    'delete',
  );

  static public $assets = array(
    'css' => array(
      'blocks.css',
    ),
  );

}
