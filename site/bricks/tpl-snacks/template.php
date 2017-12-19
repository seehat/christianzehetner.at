<?php snippet('htmlheader') ?>

<div id="snacks" class="c-snacks js-snacks">

  <div class="c-snacks__topbar">
    <h1 class="u-h2 u-padding-small u-margin-bottom-none"><?php echo $page->title(); ?></h1>
  </div>

  <div class="c-snacks__main o-layout o-layout--fullheight o-layout--flush">

    <div class="c-sidebar o-layout__item u-2/5@md u-1/5@lg">
      <div class="c-filter">
        <div class="c-filter__element">
          <input type="text" class="o-input search" placeholder="Suche nach..." />
        </div>

        <div class="c-filter__element">
          <div class="c-filter__tags js-filter-tags u-clearfix">
            <?php foreach ($tags as $tag): if ($tag == "") continue; ?>
                <div class="o-checkbox-tag">
                  <input type="checkbox" name="tags" value="<?php echo str::slug($tag); ?>" id="checkbox-<?php echo str::slug($tag); ?>">
                  <label for="checkbox-<?php echo str::slug($tag); ?>">
                    <?php echo ucfirst($tag); ?>
                  </label>
                </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="c-filter__element">
          <label for="duration">Dauer <span class="js-duration-value"></span></label>
          <input id="duration" name="duration" class="c-rangeslider o-range c-filter__duration js-filter-duration" type="range" min="<?php echo $durationmin ?>" max="<?php echo $durationmax ?>" step="1" value="<?php echo $durationmax ?>">
        </div>
      </div>
    </div>

    <div class="o-layout__item u-3/5@md u-4/5@lg">
      <div class="c-main u-padding-tiny">
        <?php echo $page->text()->kirbytext(); ?>

        <div class="o-layout o-layout--tiny list">
          <?php foreach($snacks as $p): ?>
            <div class="o-layout__item u-1/3 u-1/5@md u-margin-bottom-tiny">
              <a href="<?php echo $p->url() ?>">
                <span class="u-hide title"><?php echo $p->title() ?></span>
                <span class="u-hide duration"><?php echo $p->duration() ?></span>
                <span class="u-hide tags"><?php echo str::slug($p->tags()); ?></span>
                <span class="u-hide duration"><?php echo $p->duration(); ?></span>
                <img src="<?php echo $p->images()->first()->focusCrop(400, 400)->url(); ?>" title="<?php echo $p->title()->html() ?>" alt="<?php echo $p->title()->html() ?>">
              </a>
            </div>
          <?php endforeach ?>
        </div>

        <div class="c-footer u-margin-top">
          Mit <i class="fa fa-heart" title="für Karin"></i> gemacht -

          <?php if ($site->footertext()->isNotEmpty()): ?>
            <?php echo $site->footertext()->kirbytextRaw(); ?>
          <?php endif ?>
          <?php snippet("sociallinks") ?>
        </div>
      </div>

    </div>

  </div>

</div>

<!-- <script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vuex"></script> -->

<?php snippet('htmlfooter') ?>
