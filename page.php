<?php

/**
 * page.php
 * This is just the page template with a sidebar
 *
 * @package pts theme
 * @since version 1.0
 */

get_header(); ?>
<div class="container-wrap">
    <div class="container-fluid borderbottom">
        <div class="page-excerpt container">
            <h3><?php echo get_the_title(); ?></h3>
            <?php pts_breadcrumbs(); ?>
            <?php echo theme_excerpts(); ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="content-area col-xs-12 col-sm-8 col-md-9 hidden-overflow">
                <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            the_content();
                        endwhile;
                    endif;
                ?>
            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
