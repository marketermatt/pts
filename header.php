<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" href="<?php echo pts_get_favicon(); ?>"/>
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', PTS_DOMAIN), max($paged, $page));

        ?></title>
    <?php
    if (is_singular() && get_option('thread_comments'))
        wp_enqueue_script('comment-reply');

    wp_head();

    ?>
</head>
<body <?php body_class(); ?>>

<div class="container-fluid" id="header-area">
    <div id="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4">
                    <a href="<?php echo home_url(); ?>">
                        <?php pts_get_logo(); ?>
                    </a>
                </div>
                <div class="hidden-xs col-sm-8 col-md-8">
                    <div id="top-widget">
                        <?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar('top_widget') ) : else : ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="header-bottom">
        <div class="container no-15">
            <div class="branding-menu col-xs-12 col-sm-12 col-md-9 no-15">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigationbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?php
                        $args = array(
                            'theme_location' => 'main',
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse head-nav',
                            'container_id' => 'navigationbar',
                            'menu_class' => 'nav navbar-nav',
                            'walker'=>new wp_pts_navwalker()
                        );
                        echo wp_nav_menu($args);
                    ?>
                </div>
            </div>
            <div class="hidden-xs col-sm-12 col-md-3">
                <div class="shopping-cart">
                    <a href="#">Shopping Cart(0)</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(!is_front_page()):
    get_template_part('template/breadcrumb','index');
endif; ?>
<?php if(is_front_page()): ?>
        <div class="container-fluid full-fluid">
            <?php get_template_part('template/slider-structure', ot_get_option('pts_slider_area')); ?>
        </div>
<?php endif; ?>

