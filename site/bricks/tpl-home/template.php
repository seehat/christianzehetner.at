<?php snippet('htmlheader') ?>

<?php $portrait = $page->image('christianzehetner.jpg'); ?>

<div class="c-main o-wrapper u-text-center u-margin-top-large">

  <img class="u-rounded-full" src="<?php echo $portrait->crop(200)->url(); ?>" alt="<?php echo $portrait->alt(); ?>">

  <h1>Christian Zehetner</h1>

  <p>
    <a href="https://github.com/seehat" rel="me" target="_blank">
      <?php echo kirbytag(['tel' => '0680 32 89 783']) ?>
    </a>
    /
    <a href="https://github.com/seehat" rel="me" target="_blank">
      <?php echo kirbytag(['email' => 'mail@christianzehetner.at']) ?>
    </a>
    <br>
    Atzelsdorferstr. 3/1/7, 3372 Blindenmarkt
  </p>

  <ul class="o-list-inline">
    <li class="o-list-inline__item u-margin-left-small">
      <a href="https://www.facebook.com/seehat/about" rel="me" target="_blank">Facebook</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a href="https://github.com/seehat" rel="me" target="_blank">Github</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a href="https://www.instagram.com/christian.zehetner/" rel="me" target="_blank">Instagram</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a href="<?php echo $page->file('Lebenslauf.pdf')->url(); ?>" rel="me" target="_blank">Lebenslauf</a>
    </li>
  </ul>

</div>

<?php snippet('pagefooter') ?>
