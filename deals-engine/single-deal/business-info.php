<?php

/**
 * The template for displaying the business info after the content.
 *
 * Override this template by copying it to yourtheme/deals-engine/single-deal/business-info.php
 *
 * @author 		Social Deals Engine
 * @package 	Deals-Engine/Includes/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div class="deals-row col-xs-12 col-sm-8 col-md-8">

	<div class="deals-business-single col-xs-12">

		<p class="deals-business-title">
			<?php echo $businesstitle; ?>
		</p>

		<div class="deals-business-logo-single col-xs-6 col-md-6">

			<img src="<?php echo $imgurl; ?>" alt="<?php _e( 'Logo', 'wpsdeals' ); ?>" />
			
		</div>

		<div class="business-address-single col-xs-6 col-md-6">

			<?php if( !empty( $address ) ) : ?>
			<p class="business-address">
				<?php echo nl2br( $address );?>
				
				<?php if( !empty( $businesslink ) ) : ?>
				<a class="business-link" href="<?php echo $businesslink; ?>" target="_blank">
					<?php echo $businesslink; ?>
				</a>
				<?php endif; ?>
			</p>
			<?php endif; ?>			
			
		</div>
		
		<div class="deals-google-map-single">
		
			<div class="deals-map" id="map"></div>
			
		</div>
		
	</div>

</div>