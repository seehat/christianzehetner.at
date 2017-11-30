<?php $page->hideheaderfooter()->isTrue() ? snippet('htmlheader') : snippet('pageheader');  ?>

<?php
$renderer = new mgf\ModulesRenderer\Modules($page);
echo $renderer->render();
?>

<?php $page->hideheaderfooter()->isTrue() ? snippet('htmlfooter') : snippet('pagefooter'); ?>
