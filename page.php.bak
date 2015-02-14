<?php

/**
 * page.php
 * This is just the page template with a sidebar
 *
 * @package pts theme
 * @since version 1.0
 */

get_header(); ?>
<div class='content_back title-area'>
    <h2 class="page-title"><?php the_title(); ?></h2>
</div>
<div class="container-wrap">
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
