<?php
function pts_enqueue_js() {
    wp_enqueue_script( 'bootstrap', trailingslashit(PARENT_URL) . 'js/bootstrap.js', array('jquery'), '3.3.1', true );
    wp_enqueue_script( 'gsdk-bootstrapswitch', trailingslashit(PARENT_URL) . 'js/gsdk-bootstrapswitch.js', array('jquery'), '2.0', true );
    wp_enqueue_script( 'gsdk-checkbox', trailingslashit(PARENT_URL) . 'js/gsdk-checkbox.js', array('jquery'), '2.0', true );
    wp_enqueue_script( 'gsdk-radio', trailingslashit(PARENT_URL) . 'js/gsdk-radio.js', array('jquery'), '2.0', true );
    wp_enqueue_script( 'jqui', trailingslashit(PARENT_URL) . 'js/jquery-ui-1.10.4.custom.min.js', array('jquery'), '1.10.4', true );
    wp_enqueue_script( 'prettyphoto', trailingslashit(PARENT_URL) . 'js/jquery.prettyPhoto.js', array('jquery'), '3.1.5', false );
    wp_enqueue_script( 'hoverdropdown', trailingslashit(PARENT_URL) . 'js/bootstrap-hover-dropdown.min.js', array('jquery'), '2.0.11', false );
    wp_enqueue_script( 'pts-js', trailingslashit(PARENT_URL) . 'js/scripts.js', array('jquery'), '1.0.0', true );
    if(is_archive() || is_home())
    {
        wp_enqueue_script( 'isotopejs', trailingslashit(PARENT_URL) . 'js/isotope.js', array('jquery'), '2.1.0', false );
        wp_enqueue_script( 'il', trailingslashit(PARENT_URL) . 'js/il.js', array('jquery'), '2.1.0', false );
    }
}
add_action( 'wp_enqueue_scripts', 'pts_enqueue_js' );
