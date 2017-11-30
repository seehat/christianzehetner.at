<div class="c-contactline u-hide u-show@md">
    <div class="o-wrapper">
        <div class="o-list-inline o-list-bare">
          <?php if ($site->phone()->isNotEmpty()): ?>
            <div class="o-list-inline__item c-contactline__item"><?= kirbytag(array('tel' => $site->phone(), 'text' => '<i class="fa fa-phone"></i> ' . $site->phone())); ?> </div>
          <?php endif ?>

          <?php if ($site->email()->isNotEmpty()): ?>
            <div class="o-list-inline__item c-contactline__item"><?= kirbytag(array('email' => $site->email(), 'text' => '<i class="fa fa-envelope"></i> ' . $site->email())); ?></div>
          <?php endif ?>

            <?php foreach ($site->locations()->toStructure() as $location) : ?>
                <div class="o-list-inline__item c-contactline__item"><?= kirbytag(array('link' => "https://www.google.at/maps/place/" . escape::url($location->text()), 'text' => '<i class="fa fa-map-marker"></i> ' . $location->text())); ?></div>
            <?php endforeach ?>
        </div>
    </div>
</div>
