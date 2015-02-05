<?php

/**
 * Register our sidebars and widgetized areas.
 **/

function pts_widget_init() {

    register_sidebar( array(
		'name' => 'Top Widget',
		'id' => 'top_widget',
		'before_widget'  => '<div id="%1$s" class="%2$s top-widgs">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );

    register_sidebar( array(
		'name' => 'Sidebar Widget',
		'id' => 'sidebar_widget',
		'before_widget'  => '<div id="%1$s" class="%2$s sidebar-widgs">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget_title_wrapper"><h5 class="widgets_titles_sidebar">',
		'after_title' => '</h5></div><div class="wca">',
	) );

    register_sidebar( array(
		'name' => 'Single Post Widget',
		'id' => 'single_post_widget',
		'before_widget'  => '<div id="%1$s" class="%2$s sidebar-widgs">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget_title_wrapper"><h5 class="widgets_titles_sidebar">',
		'after_title' => '</h5></div><div class="wca">',
	) );

    register_sidebar( array(
		'name' => 'First Footer Widget',
		'id' => 'first_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgets_titles">',
		'after_title' => '</h5>',
	) );

	register_sidebar( array(
		'name' => 'Second Footer Widget',
		'id' => 'second_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgets_titles">',
		'after_title' => '</h5>',
	) );

    register_sidebar( array(
		'name' => 'Third Footer Widget',
		'id' => 'third_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgets_titles">',
		'after_title' => '</h5>',
	) );

    register_sidebar( array(
		'name' => 'Fourth Footer Widget',
		'id' => 'fourth_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widgets_titles">',
		'after_title' => '</h5>',
	) );

    register_sidebar( array(
		'name' => 'Footer Right',
		'id' => 'footer_right',
		'before_widget'  => '<div id="%1$s" class="%2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	) );
}
add_action( 'widgets_init', 'pts_widget_init' );

