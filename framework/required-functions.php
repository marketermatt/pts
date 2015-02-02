<?php

//options
require( trailingslashit( PTS_CODE_DIR ) . 'pts-get-options.php' );
require( trailingslashit( PTS_CODE_DIR ) . 'pts-bootstrap-menu-walker.php' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_image_size( 'project_thumb', 220, 80, true ); // (cropped)

// load the ot-google-fonts plugin if the loader class is available
if( class_exists( 'OT_Loader' ) ):

	global $ot_options;

	$ot_options = get_option( 'option_tree' );

	// default fonts used in this theme, even though there are no google fonts
	$default_theme_fonts = array(
		'arial' => 'Arial, Helvetica, sans-serif',
		'helvetica' => 'Helvetica, Arial, sans-serif',
		'georgia' => 'Georgia, "Times New Roman", Times, serif',
		'tahoma' => 'Tahoma, Geneva, sans-serif',
		'times' => '"Times New Roman", Times, serif',
		'trebuchet' => '"Trebuchet MS", Arial, Helvetica, sans-serif',
		'verdana' => 'Verdana, Geneva, sans-serif'
	);

	defined('OT_FONT_DEFAULTS') or define('OT_FONT_DEFAULTS', serialize($default_theme_fonts));
	defined('OT_FONT_API_KEY') or define('OT_FONT_API_KEY', 'AIzaSyDraDG0LVL6mYalnBfQRr1zUCZLJR5WoyE'); // enter your own Google Font API key here
	defined('OT_FONT_CACHE_INTERVAL') or define('OT_FONT_CACHE_INTERVAL', 0); // Checking once a week for new Fonts. The time interval for the remote XML cache in the database (21600 seconds = 6 hours)

	// get the OT-Google-Font plugin file
	include_once( trailingslashit(PTS_CODE_DIR).'option-tree/ot-google-fonts.php' );

	// get the google font array - build in ot-google-fonts.php
	$google_font_array = ot_get_google_font(OT_FONT_API_KEY, OT_FONT_CACHE_INTERVAL);

	// Now apply the fonts to the font dropdowns in theme options with the build in OptionTree hook
	function ot_filter_recognized_font_families( $array, $field_id ) {

		global $google_font_array;

		// loop through the cached google font array if available and append to default fonts
		$font_array = array();
		if($google_font_array){
			foreach($google_font_array as $index => $value){
				$font_array[$index] = $value['family'];
			}
		}

		// put both arrays together
		$array = array_merge(unserialize(OT_FONT_DEFAULTS), $font_array);

		return $array;

	}
	add_filter( 'ot_recognized_font_families', 'ot_filter_recognized_font_families', 1, 2 );

endif;

if ( ! function_exists( 'pts_has_shortcode' ) ) {
	function pts_has_shortcode( $shortcode = '', $post_id = null ) {

		if ( ! $post_id ) {
			if ( ! is_singular() ) {
				return false;
			}
			$post_id = get_the_ID();
		}

		if ( is_page() || is_single() ) {
			$current_post = get_post( $post_id );
			$post_content  = $current_post->post_content;
			$found         = false;

			if ( ! $shortcode ) {
				return $found;
			}

			if ( stripos( $post_content, '[' . $shortcode ) !== false ) {
				$found = true;
			}

			return $found;
		} else {
			return false;
		}
	}
}

if(!function_exists('pts_get_favicon')) {
    function pts_get_favicon() {
        $icon = ot_get_option('pts_favicon');
        if($icon == '') {
            $icon = trailingslashit(PARENT_DIR).'images/favicon.ico';
        }
        return $icon;
    }
}

/*function pts_count_widgets( $sidebar_id ) {
	global $_wp_sidebars_widgets;
	if ( empty( $_wp_sidebars_widgets ) ) :
		$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
	endif;

	$sidebars_widgets_count = $_wp_sidebars_widgets;

	if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :
		$widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
		$widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
		if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
			// Four widgets er row if there are exactly four or more than six
			$widget_classes .= ' col-xs-12 col-sm-3 col-md-3';
		elseif ( $widget_count >= 3 ) :
			// Three widgets per row if there's three or more widgets
			$widget_classes .= ' col-xs-12 col-sm-4 col-md-4';
		elseif ( 2 == $widget_count ) :
			// Otherwise show two widgets per row
			$widget_classes .= ' col-xs-12 col-sm-6 col-md-6';
		endif;

		return $widget_classes;
	endif;
}*/

function top_social_section(){
    $pts_social_facebook = ot_get_option('pts_social_facebook');
    $pts_social_twitter = ot_get_option('pts_social_twitter');
    $pts_social_googleplus = ot_get_option('pts_social_googleplus');
    $pts_social_linkedin = ot_get_option('pts_social_linkedin');
    $pts_social_flickr = ot_get_option('pts_social_flickr');
    $pts_social_youtube = ot_get_option('pts_social_youtube');
    if($pts_social_facebook){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_facebook.'"><i class="fa fa-facebook"></i></a></li>';
    }
    if($pts_social_twitter){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_twitter.'"><i class="fa fa-twitter"></i></a></li>';
    }
    if($pts_social_googleplus){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_googleplus.'"><i class="fa fa-google-plus"></i></a></li>';
    }
    if($pts_social_linkedin){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_linkedin.'"><i class="fa fa-linkedin"></i></a></li>';
    }
    if($pts_social_flickr){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_flickr.'"><i class="fa fa-flickr"></i></a></li>';
    }
    if($pts_social_youtube){
        $slinks .= '<li class="social-link"><a href="'.$pts_social_youtube.'"><i class="fa fa-youtube"></i></a></li>';
    }
    return $slinks;
}

/*****************Google Analytics code******************************/

add_action('wp_head', 'pts_google_analytics');
function pts_google_analytics() {
    $googleCode = ot_get_option('pts_ga');

    if(empty($googleCode)) return;

    if(strpos($googleCode,'UA-') === 0) {

        $googleCode = "

                        <script type='text/javascript'>

                        var _gaq = _gaq || [];
                        _gaq.push(['_setAccount', '".$googleCode."']);
                        _gaq.push(['_trackPageview']);

                        (function() {
                        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                        })();

                        </script>

        ";
        echo $googleCode;
    }
}


function get_page_temp($pid=''){
    if(empty($pid))
        $pid = get_the_ID();

    $return = get_post_meta( $pid, '_wp_page_template', TRUE );
    return $return;
}

function pts_change_search_widget( $html ) {
    ob_start(); ?>
    <form role="search" method="get" action="<?php echo esc_url( home_url() ); ?>" class="search-form form-inline">
        <div class="form-group">
            <input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e( 'Enter your keyword', 'pts' ); ?>" class="form-control" />
            <button class="btn btn-fill searchnow btn-accent-color" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </form>
    <?php return ob_get_clean();
}
add_filter( 'get_search_form', 'pts_change_search_widget' );

function pts_set_post_views($postID) {
    $count_key = 'pts_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
