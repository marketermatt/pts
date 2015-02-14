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
                <div class="post-list">
				<div class="list-item"> 
                    <div class="list-content">
                        <a href="<? the_permalink(); ?>"><h4><?php echo get_the_title(); ?></h4></a>
                        <div class="clearfix"></div>
                        <span>Posted on: <?php the_date(); ?></span> <?php echo do_shortcode('[display_rating_result post_id="'.get_the_ID().'" show_rich_snippets="true" show_count="false"]'); ?>
                        <div class="hr"></div>
                        <?php get_template_part('template/post','format'); ?>
                <?php
                            $comment_count = wp_count_comments( post_id );
                            $catlist='';
                            $categories = get_the_category();
                            foreach($categories as $cat){
                                $catlist .= '<a href="'.get_category_link($cat->term_id ).'">'.$cat->name.'</a>, ';
                            }
                        ?>
                        </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-4 no-15-right">
                            <div class="loop-grad">
                                <div class="ci icon-area"></div>
                                <div class="loop-lower-content">
                                    <h6>Comments</h6>
                                    <div><small><?php echo $comment_count->approved; ?> Comments</small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 no-15">
                            <div class="loop-grad">
                                <div class="cat icon-area"></div>
                                <div class="loop-lower-content">
                                    <h6>Categories</h6>
                                    <div><small><?php echo rtrim($catlist,','); ?></small></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-4 no-15-left">
                            <div class="loop-grad">

                            <div class="icon-area author-area"></div>
                                <div class="loop-lower-content">
                                    <h6>Author</h6>
                                    <div><small><?php echo get_the_author(); ?></small></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
				</div>				
            </div>
            <div class="sidebar-area col-xs-12 col-sm-4 col-md-3 hidden-overflow">
                <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('single_post_widget') ) : else : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
