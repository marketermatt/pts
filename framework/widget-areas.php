<?php

/**
 * Register our sidebars and widgetized areas.
 **/

function pts_widget_init() {

    register_sidebar( array(
		'name' => 'Sidebar Widget',
		'id' => 'sidebar_widget',
		'before_widget'  => '<div id="%1$s" class="%2$s sidebar-widgs">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget_title_wrapper"><h4 class="widgets_titles_sidebar">',
		'after_title' => '</h4></div><div class="wca">',
	) );

    register_sidebar( array(
		'name' => 'Single Post Widget',
		'id' => 'single_post_widget',
		'before_widget'  => '<div id="%1$s" class="%2$s sidebar-widgs">',
		'after_widget' => '</div></div>',
		'before_title' => '<div class="widget_title_wrapper"><h4 class="widgets_titles_sidebar">',
		'after_title' => '</h4></div><div class="wca">',
	) );

    register_sidebar( array(
		'name' => 'First Footer Widget',
		'id' => 'first_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgets_titles">',
		'after_title' => '</h4>',
	) );

	register_sidebar( array(
		'name' => 'Second Footer Widget',
		'id' => 'second_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgets_titles">',
		'after_title' => '</h4>',
	) );

    register_sidebar( array(
		'name' => 'Third Footer Widget',
		'id' => 'third_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgets_titles">',
		'after_title' => '</h4>',
	) );

    register_sidebar( array(
		'name' => 'Fourth Footer Widget',
		'id' => 'fourth_footer_widget',
		'before_widget'  => '<div id="%1$s" class="footer-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgets_titles">',
		'after_title' => '</h4>',
	) );
}
add_action( 'widgets_init', 'pts_widget_init' );

