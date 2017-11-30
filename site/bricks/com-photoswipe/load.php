<?php 

// Expose a PhotoSwipe DOM Snippet and whipe it off for its default html comments
function photoswipe() {
    return preg_replace('/<!--(.|\s)*?-->/', '', tpl::load( __DIR__ . DS . 'snippets' . DS . 'photoswipe-dom.php' ));
}