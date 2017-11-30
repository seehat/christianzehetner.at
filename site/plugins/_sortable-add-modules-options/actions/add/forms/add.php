<?php

use Kirby\Panel\Models\Page\Blueprint;

return function($page, $model, $field) {

  $options = [];

  if ($page->intendedTemplate() == 'modules') {
    $blueprints = blueprint::all();
    foreach ($blueprints as $name) {
      $blueprint = new Blueprint($name);
      $moduleprefix = c::get('modules.template.prefix', 'module.');
      if (str::contains($name, $moduleprefix)) $options[$name] = $blueprint->title();
    }
  }
  else {
    foreach($page->blueprint()->pages()->template() as $template) {
      $options[$template->name()] = $template->title();
    }
  }

  $form = new Kirby\Panel\Form(array(
    'template' => array(
      'label'    => $field->l('field.sortable.add.template.label'),
      'type'     => 'select',
      'options'  => $options,
      'default'  => key($options),
      'required' => true,
      'readonly' => count($options) == 1 ? true : false,
      'icon'     => count($options) == 1 ? $page->blueprint()->pages()->template()->first()->icon() : 'chevron-down',
    )
  ));

  $form->cancel($model);
  $form->buttons->submit->val($field->l('field.sortable.add'));

  return $form;

};
