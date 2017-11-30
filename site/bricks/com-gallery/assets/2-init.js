$(function() {
    $(".js-gallery").justifiedGallery({
        rowHeight : 120,
        lastRow : 'nojustify',
        margins : window.mgf.modgallery_margins,
        border: 0,
        selector: '> figure:not(.is-not-previewed), > div:not(.spinner)',
        lastRow: 'justify',
        waitThumbnailsLoad: false,
        cssAnimation: true,
        captions: false
    });
});
