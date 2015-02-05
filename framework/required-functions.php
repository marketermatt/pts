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

function pts_get_page_id(){
    $page_object = get_queried_object();
    $page_id     = get_queried_object_id();
}


if(!function_exists('pts_breadcrumbs')) {
    function pts_breadcrumbs() {

      $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
      $delimiter = '<span class="delimeter">></span>'; // delimiter between crumbs
      $home = __('Home', PTS_DOMAIN); // text for the 'Home' link
      $blogPage = __('Blog', PTS_DOMAIN);
      $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
      $before = '<span class="current">'; // tag before the current crumb
      $after = '</span>'; // tag after the current crumb

      global $post;
      $homeLink = home_url();
      if (is_front_page()) {

            if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></div>';

    } else {

        echo '<div class="breadcrumbs">';
        echo '<div id="breadcrumb">';
        echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';

        if ( is_category() ) {
          $thisCat = get_category(get_query_var('cat'), false);
          if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
          echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;

        } elseif ( is_search() ) {
          echo $before . 'Search results for "' . get_search_query() . '"' . $after;

        } elseif ( is_day() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
          echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
          echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
          echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() ) {
            if ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
            if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
          } else {
            $cat = get_the_category();
            if(isset($cat[0])) {
	            $cat = $cat[0];
	            $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
	            if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
	            echo $cats;
            }
	        if ($showCurrent == 1) echo $before . get_the_title() . $after;
          }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
          $post_type = get_post_type_object(get_post_type());
          echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
          $parent = get_post($post->post_parent);
          //$cat = get_the_category($parent->ID); $cat = $cat[0];
          //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          //echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
          if ($showCurrent == 1) echo ' '  . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
          if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          for ($i = 0; $i < count($breadcrumbs); $i++) {
            echo $breadcrumbs[$i];
            if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
          }
          if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
          echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;

        } elseif ( is_author() ) {
           global $author;
          $userdata = get_userdata($author);
          echo $before . 'Articles posted by ' . $userdata->display_name . $after;

        } elseif ( is_404() ) {
          echo $before . 'Error 404' . $after;
        }else{

            echo $blogPage;
        }

        if ( get_query_var('paged') ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
          echo ' ('.__('Page') . ' ' . get_query_var('paged').')';
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div>';
        echo '</div>';

      }
    }
}
