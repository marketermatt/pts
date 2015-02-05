<?php
/**
 * Template Name: Full Width Template
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
    <div class="<?php echo set_container(); ?>">
            <?php
                if ( have_posts() ) :
                    // Start the Loop.
                    while ( have_posts() ) : the_post();
                        the_content();
                    endwhile;
                endif;
            ?>
    </div>
</div>
<?php get_footer(); ?>
