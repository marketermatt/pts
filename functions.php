<?php
define('PTS_DOMAIN', 'pts');
require_once( get_template_directory() . '/framework/init.php' );

/* Rearranging Deal Page */

remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 30 );
remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 35 );

add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 35 );
add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 30 );

