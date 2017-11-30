<?php
$classes = '';
$items = array();
foreach(site()->pages()->visible() as $entry) {
  $items[] = array(
    'title' => $entry->title(),
    'url' => $entry->url(),
    'isOpen' => $entry->isOpen(),
  );
}
?>

<?php if(count($items) > 0): ?>
  <nav class="c-nav">
    <?php foreach($items as $item): ?>
      <a class="c-nav__link <?php echo $classes ?>
         <?php ecco($item['isOpen'], 'c-nav__link--active') ?>"
         href="<?php echo $item['url'] ?>">
         <?php echo html($item['title']) ?>
      </a>
    <?php endforeach ?>
  </nav>
<?php endif ?>
