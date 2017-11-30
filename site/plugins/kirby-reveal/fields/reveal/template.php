<?php
$url = url('/' . $page->id());
if(site()->language()) {
	$url = $page->url(site()->language()->code());
}
?>

<div class="rvl-preview">
	<div class="rvl-iframe">
		<iframe src="<?php echo $url; ?>"></iframe>
	</div>
	<?php if(count(site()->languages()) > 1) : ?>
		<style>
		.rvl-action {
			margin-right: 8.5em;
		}
		</style>
	<?php endif; ?>
</div>
