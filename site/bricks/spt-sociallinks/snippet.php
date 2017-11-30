<div class="c-sociallinks u-margin-vertical">

<?php foreach (array(
  'facebook',
  'twitter',
  'linkedin',
  'instagram',
  'github',
  'medium',
  'youtube',
  'vimeo',
  'soundcloud',
  'spotify',
) as $item): ?>

  <?php if ($site->{$item}()->isNotEmpty()): ?>
  <a class="c-sociallinks__item" href="<?php echo $site->{$item}(); ?>" target="_blank" title="<?php echo Architect::field_label('site', $item); ?>">
    <i class="fa fa-<?php echo Architect::field_info('site', $item)['icon']; ?>"></i>
  </a>
  <?php endif ?>
<?php endforeach ?>

</div>
