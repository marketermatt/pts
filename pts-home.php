<?php
/**
 * Template Name: Home Page Template
 */
?>
<?php get_header();

// lets get the column sections for the homepage done
if(ot_get_option('pts_enable_homepage_sections')=='on')
{
    echo homepage_colums();
}
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
