<?php
//get all the styles for the front-end loaded
function pts_enqueue_styles() {
    wp_enqueue_style( 'bootstrap', trailingslashit(PARENT_URL).'css/bootstrap.css' );
    wp_enqueue_style( 'default-css', trailingslashit(PARENT_URL).'css/css.css' );
    wp_enqueue_style( 'fa-css', trailingslashit(PARENT_URL).'css/font-awesome.css' );
    wp_enqueue_style( 'prettyphoto-css', trailingslashit(PARENT_URL).'css/prettyPhoto.css' );
    wp_enqueue_style( 'responsive', trailingslashit(PARENT_URL).'css/responsive.css' );
    wp_enqueue_style( 'js_composer_front');
}

add_action( 'wp_enqueue_scripts', 'pts_enqueue_styles' );
