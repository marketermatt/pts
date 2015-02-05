<?php
/**
 * Template Name: Home Page Template
 */
?>
<?php get_header();
?>
<div class="container-wrap">
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
