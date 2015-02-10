<?php

/**
 * Single Deal Description Template
 * 
 * Override this template by copying it to yourtheme/deals-engine/single-deal/description.php
 * 
 * @author 		Social Deals Engine
 * @package 	Deals-Engine/Includes/Templates
 * @version     1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<div itemprop="description" class="deals-description col-xs-12">

	<?php the_content();?>
    <?php pts_set_post_views(get_the_ID()); ?>
	
</div>
