<?php
define('PTS_DOMAIN', 'pts');
require_once( get_template_directory() . '/framework/init.php' );

/* Rearranging Deal Page */

// Swap left and right sides of the deal page
remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 30 );
remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 35 );

add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 35 );
add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 30 );

// Move sharing link from left to right (right to left)
remove_action( 'wps_deals_single_header_right', 'wps_deals_social_buttons', 20 );
add_action( 'wps_deals_single_header_left', 'wps_deals_social_buttons', 40 );

// Remove price since it is now added to button
remove_action( 'wps_deals_single_header_left', 'wps_deals_single_deal_price', 5 );