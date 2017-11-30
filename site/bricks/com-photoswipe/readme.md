
## Installation

Paste into footer:

~~~php
<?php echo photoswipe(); ?>
~~~

## Basic Gallery

Build up your image gallery:

~~~php
<div class="gallery" itemscope itemtype="http://schema.org/ImageGallery">
  <?php foreach ($page->images() as $image): ?>
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="<?php echo $image->url() ?>" itemprop="contentUrl" data-size="<?php echo $image->width() . 'x' . $image->height() ?>">
        <img src="<?php echo $image->width(500)->url() ?>" itemprop="thumbnail" alt="<?php echo $image->caption() ?>">
      </a>
      <figcaption itemprop="caption description"><?php echo $image->caption() ?></figcaption>
    </figure>
  <?php endforeach ?>
</div>
~~~

or use the gallery plugin.