<?php snippet('htmlheader') ?>

<div id="entries" class="c-snacks js-snacks js-entries">

  <div class="c-vue-loading" v-cloak>

    <div class="c-main u-padding-small">
      <h1><?php echo $page->title(); ?></h1>

      <div class="c-filter">
        <input class="search" placeholder="Suche nach..." />

        <ul class="o-layout js-filter-tags">
          <?php foreach ($tags as $tag): if ($tag == "") continue; ?>
            <li class="o-layout__item u-1/4">
              <label>
                <input type="checkbox" name="tags" value="<?php echo str::slug($tag); ?>">
                <?php echo $tag; ?>
              </label>
            </li>
          <?php endforeach; ?>
        </div>

        <input class="c-filter__duration js-filter-duration" type="range" min="<?php echo $durationmin ?>" max="<?php echo $durationmax ?>" step="1" value="1">
      </div>

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

<!-- <script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/vuex"></script> -->

<?php snippet('htmlfooter') ?>
