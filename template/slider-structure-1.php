<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1/14/15
 * Time: 2:02 AM
 */

//query slider post types for posts
$args = array(
    'posts_per_page'   => ot_get_option('pts_slider_count'),
    'post_type'        => 'slider'
);
$sliders = get_posts( $args );
$count = 0;
foreach ( $sliders as $slider ) : setup_postdata( $slider );
    if($count == 0):
        $activeness = ' active';
        $active_class = ' class="active"';
    else:
        $activeness = '';
        $active_class = '';
    endif;
    $count = $count+1;
    $feat_image = wp_get_attachment_url( get_post_thumbnail_id($slider->ID));
    $slides_nav.= '<li data-target="#carousel-generic" data-slide-to="'.$count.'"'.$active_class.'></li>';
    $slides.= '<div class="item'.$activeness.'"><img src="'.$feat_image.'" alt="'.get_the_title($slider->ID).'"></div>';
endforeach;
wp_reset_postdata();?>

<div id="carousel">
    <div id="carousel-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php echo $slides_nav; ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php echo $slides; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
        </a>
    </div>
</div> <!-- end carousel -->
