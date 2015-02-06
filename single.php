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
    <div class="entry-meta"><?php echo pts_posted_on(); ?></div>
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
                        ?>
                        <div class="tags">
                            <?php the_tags(); ?>
                        </div>
                <?php
                        endwhile;
                    endif;
                ?>
                <?php
                    ob_start();
                    comments_template('', true);
                    $output = ob_get_contents();
                    ob_end_clean();

                    $output = str_replace('type="text"','type="text" class="form-control"',$output);
                    $output = str_replace('<textarea','<textarea class="form-control"',$output);
                    $output = str_replace('class="submit"','class="btn btn-default"',$output);

                    echo '<br/>'.$output;
                ?>
            </div>
            <div class="sidebar-area col-xs-12 col-sm-4 col-md-3 hidden-overflow">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single_post_widget') ) : else : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
