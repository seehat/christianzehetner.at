<?php
$classes = '';

use Uniform\Form;

$form = new Form([
  'name' => [],
  'email' => [
      'rules' => ['required', 'email'],
      'message' => 'Bitte gib eine gültige E-Mail-Adresse ein.',
  ],
  'message' => [
      'rules' => ['required'],
      'message' => 'Bitte gib eine Nachricht ein.',
  ],
]);

if (r::is('POST')) {
  $form->honeypotGuard()
      ->emailAction([
          'to' => $module->toemail()->or($site->email())->value,
          'from' => 'no-reply@' . trim(preg_replace('#^www\.(.+)#i', '$1', url::host())),
          'subject' => 'Neue Anfrage von {email}',
      ]);
}

?>

<div id="contactform"></div>

<?php snippet('moduletitle', array('module' => $module)) ?>
<?= kirbytext($module->text()) ?>

<form action="<?php echo $page->url() ?>#contactform" method="POST" class="c-form">
  <div class="c-form__element">
    <input name="name" type="text" value="<?php echo $form->old('name'); ?>" placeholder="Name">
  </div>
  <div class="c-form__element">
    <input name="email" type="email" value="<?php echo $form->old('email'); ?>" placeholder="E-Mail">
  </div>
  <div class="c-form__element">
    <textarea name="message" placeholder="Wie können wir dir helfen?"><?php echo $form->old('message'); ?></textarea>
  </div>
  <?php echo csrf_field(); ?>
  <?php echo honeypot_field(); ?>
  <div class="c-form__element">
    <input class="c-btn c-btn--default" type="submit" value="Absenden">
  </div>
</form>
<?php if ($form->success()): ?>
   Die Anfrage wurde erfolgreich verschickt.
<?php else: ?>
   <?php snippet('uniform/errors', ['form' => $form]); ?>
<?php endif; ?>



