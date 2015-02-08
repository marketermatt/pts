<div class="post-list">
	<!--<div class="list-item">-->
		<div class="row">
<<<<<<< HEAD
    <?php
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>
=======
    <?php
        if ( have_posts() ) :
            // Start the Loop.
            while ( have_posts() ) : the_post(); ?>
>>>>>>> pts/master
                        <div class="col-xs-12 col-sm-4 col-md-3">
						<div class="deal-content deals-shortcode">
						<div class="ribbon">
                            <div style="padding:15px; color: #fff; font-weight:bold; font-size:12px;">
                                <span style="color:#f9c205">0%</span>
                                OFF
                            </div>
                        </div>
					<div class="deals-single-image">
						<?php
							echo get_the_post_thumbnail( get_the_ID() , 'wpsdeals-single', array( 'alt' => __('Deal Image','wpsdeals')));
						?>
					</div>
<<<<<<< HEAD

					<div style="text-align:center;"><span class="rating-result  rating-result-349"></span></div><a href="<?php echo the_permalink();?>">
					<h5><?php the_title();?></h5></a>
					<?php the_content();?>
					<?php
					$normal_price = get_post_meta(get_the_ID(),'_wps_deals_normal_price');

					$sale_price = get_post_meta(get_the_ID(),'_wps_deals_sale_price');
					?>

					<div class="price-container"><div class="oldPrice">$<?php echo $normal_price[0] ;?></div><div class="salePrice">$<?php echo $sale_price[0] ;?></div></div><div class="clearfix"></div><div style="margin:10px 10px; border-bottom: 1px dashed #ccc; height:5px;"></div><a href=""><div style="margin-left:10px;margin-bottom:10px; font-size:10px;" class="btn btn-fill btn-accent-color fa fa-shopping-cart"> To Cart</div></a><a href="<?php echo the_permalink();?>"><div style="margin-right:10px;margin-bottom:10px; font-size:10px; float:right;" class="btn btn-default btn-fill fa fa-bars"> Details</div></a>
					</div>
					</div>

=======

					<div style="text-align:center;"><span class="rating-result  rating-result-349"></span></div><a href="<?php echo the_permalink();?>">
					<h5><?php the_title();?></h5></a>
					<?php the_content();?>
					<?php
					$normal_price = get_post_meta(get_the_ID(),'_wps_deals_normal_price');

					$sale_price = get_post_meta(get_the_ID(),'_wps_deals_sale_price');
					?>

					<div class="price-container"><div class="oldPrice">$<?php echo $normal_price[0] ;?></div><div class="salePrice">$<?php echo $sale_price[0] ;?></div></div><div class="clearfix"></div><div style="margin:10px 10px; border-bottom: 1px dashed #ccc; height:5px;"></div><a href=""><div style="margin-left:10px;margin-bottom:10px; font-size:10px;" class="btn btn-fill btn-accent-color fa fa-shopping-cart"> To Cart</div></a><a href="<?php echo the_permalink();?>"><div style="margin-right:10px;margin-bottom:10px; font-size:10px; float:right;" class="btn btn-default btn-fill fa fa-bars"> Details</div></a>
					</div>
					</div>

>>>>>>> pts/master
            <?php endwhile;  endif;   ?>
			</div><!-- row div-->
			<!--</div>-->
</div>
