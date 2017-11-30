<?php
$items = site()->pages()->visible();
?>

<?php if($items->count() > 0): ?>
  <nav class="c-nav-mobile">
    <ul>
    <?php foreach($items as $item): ?>
      <li>
      <a class=""
         href="<?php echo $item->url() ?>">
         <?php echo html($item->title()) ?>
      </a>
      </li>
    <?php endforeach ?>
    </ul>
  </nav>
<?php endif ?>
