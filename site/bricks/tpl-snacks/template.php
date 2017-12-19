<?php snippet('htmlheader') ?>

<div id="snacks" class="c-snacks js-snacks">

  <div class="c-snacks__topbar">
    <h1 class="u-padding-small u-margin-bottom-none"><?php echo $page->title(); ?></h1>
  </div>

  <div class="c-snacks__main o-layout o-layout--fullheight o-layout--flush">

    <div class="c-sidebar o-layout__item u-2/5@md u-1/5@lg">
      <div class="c-filter">
        <div class="c-filter__element">
          <input type="text" class="o-input search" placeholder="Suche nach..." />
        </div>

        <div class="c-filter__element">
          <ul class="c-filter__tags o-layout js-filter-tags">
            <?php foreach ($tags as $tag): if ($tag == "") continue; ?>
              <li class="o-layout__item">
                <label>
                  <input type="checkbox" name="tags" value="<?php echo str::slug($tag); ?>">
                  <?php echo ucfirst($tag); ?>
                </label>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>

        <div class="c-filter__element">
          <label for="duration">Dauer <span class="js-duration-value"></span></label>
          <input id="duration" name="duration" class="c-rangeslider o-range c-filter__duration js-filter-duration" type="range" min="<?php echo $durationmin ?>" max="<?php echo $durationmax ?>" step="1" value="<?php echo $durationmax ?>">
        </div>
      </div>
    </div>

    <div class="o-layout__item u-3/5@md u-4/5@lg">
      <div class="c-main">
        <?php echo $page->text()->kirbytext(); ?>

        <div class="o-layout o-layout--small list">
          <?php foreach($snacks as $p): ?>
            <div class="o-layout__item u-1/2 u-1/5@md u-margin-bottom-small">
              <a href="<?php echo $p->url() ?>">
                <span class="u-hide title"><?php echo $p->title() ?></span>
                <span class="u-hide duration"><?php echo $p->duration() ?></span>
                <span class="u-hide tags"><?php echo str::slug($p->tags()); ?></span>
                <span class="u-hide duration"><?php echo $p->duration(); ?></span>
                <img src="<?php echo $p->images()->first()->focusCrop(800, 800)->url(); ?>" title="<?php echo $p->title()->html() ?>" alt="<?php echo $p->title()->html() ?>">
              </a>
            </div>
          <?php endforeach ?>
        </div>

        <div class="c-footer">
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
