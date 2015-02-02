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


// Add slements to social deal archives
add_action( 'wps_deals_home_more_deals_content', 'pts_deal_ratings', 17 );
add_action( 'wps_deals_home_more_deals_content', 'pts_deal_description', 22 );

function pts_deal_ratings() {
	if( empty( $rating ) ) return; ?>
	<div class="deals-rating-label">
		<?php apply_filters( 'wps_deals_rating_text', __( 'Customer Rating', 'wpsdeals' ) ); ?>
	</div>
	<?php
}

function pts_deal_description() {
	the_excerpt();
}
