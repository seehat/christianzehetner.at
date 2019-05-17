<?php snippet('htmlheader') ?>

<?php $portrait = $page->image('christianzehetner.jpg'); ?>

<div class="c-main o-wrapper u-text-center u-margin-top-large">

  <div class="h-card">
    <a class="u-url" href="<?php echo url() ?>">
      <img class="u-photo u-rounded-full" src="<?php echo $portrait->crop(200)->url(); ?>" alt="<?php echo $portrait->alt(); ?>">
    </a>

    <h1 class="p-name">Christian Zehetner</h1>
  </div>



  <ul class="o-list-inline">
    <li class="o-list-inline__item u-margin-left-small">
        <?php echo kirbytag(['email' => 'mail@christianzehetner.at', 'text' => 'E-Mail', 'rel' => 'me']) ?>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a class="u-url c-link" href="https://www.facebook.com/seehat/about" rel="me" target="_blank">Facebook</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a class="u-url c-link" href="https://github.com/seehat" rel="me" target="_blank">Github</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a class="u-url c-link" href="https://www.instagram.com/christian.zehetner/" rel="me" target="_blank">Instagram</a>
    </li>
    <li class="o-list-inline__item u-margin-left-small">
      <a class="c-link" href="<?php echo $page->file('Lebenslauf.pdf')->url(); ?>" target="_blank">Lebenslauf</a>
    </li>
  </ul>

  <p>
    Atzelsdorferstr. 3/1/7,
    <br>
    3372 Blindenmarkt
  </p>

</div>

<?php snippet('pagefooter') ?>
