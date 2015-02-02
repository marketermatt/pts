<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1/6/15
 * Time: 12:20 PM
 */

add_filter('show_admin_bar', '__return_false');
add_theme_support( 'post-thumbnails' );
add_action( 'init', 'pts_post_type' );
function pts_post_type() {
    register_post_type( 'slider',
        array(
            'labels' => array(
                'name' => __( 'Slider' ),
                'singular_name' => __( 'Slider' )
            ),
            'public' => true,
            'has_archive' => false,
            'supports' => array( 'title', 'thumbnail' ),
        )
    );

   /* $labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', PTS_DOMAIN ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', PTS_DOMAIN ),
		'menu_name'           => __( 'Projects', PTS_DOMAIN ),
		'parent_item_colon'   => __( 'Parent Item:', PTS_DOMAIN ),
		'all_items'           => __( 'All Projects', PTS_DOMAIN ),
		'view_item'           => __( 'View Project', PTS_DOMAIN ),
		'add_new_item'        => __( 'Add New Project', PTS_DOMAIN ),
		'add_new'             => __( 'Add New', PTS_DOMAIN ),
		'edit_item'           => __( 'Edit Item', PTS_DOMAIN ),
		'update_item'         => __( 'Update Item', PTS_DOMAIN ),
		'search_items'        => __( 'Search Project', PTS_DOMAIN ),
		'not_found'           => __( 'Not found', PTS_DOMAIN ),
		'not_found_in_trash'  => __( 'Not found in Trash', PTS_DOMAIN ),
	);
	$args = array(
		'label'               => __( 'project', PTS_DOMAIN ),
		'description'         => __( 'Your Projects', PTS_DOMAIN ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'           => 'dashicons-images-alt',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
        'query_var'           => 'project',
		'capability_type'     => 'page',
	);
	register_post_type( 'pts_project', $args );*/
}

add_action( 'after_setup_theme', 'pts_theme_features' );
function pts_theme_features() {
    //register_nav_menu( 'top', 'Top Menu' );
    register_nav_menu( 'main', 'Main Menu' );
    register_nav_menu( 'mobile', 'Mobile Menu' );

	add_theme_support( 'title-tag' );
}

if ( ! isset( $content_width ) )
	$content_width = 800;

/*function homepage_colums(){
    $elstart = '<div class="row home-colums"><div class="container">';
    $elend = '</div></div>';
        $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-1">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_1_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_1').'
                </div>
                <div class="button-area-1">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_1_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_1_link').'"]').'
                </div>
        </div>';

    $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-2">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_2_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_2').'
                </div>
                <div class="button-area-2">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_2_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_2_link').'"]').'
                </div>
        </div>';
    $returns .= '<div class="col-xs-12 col-sm-4 col-md-4 homepage-column-3">
                <div class="icon-area">
                      <i class="fa '.ot_get_option('pts_homepage_column_sections_sec_3_icon').' fa-3x" style="color:#fff;"></i>
                </div>
                <div class="colum-text">
                    '.ot_get_option('pts_homepage_column_sections_sec_3').'
                </div>
                <div class="button-area-3">
                    '.do_shortcode('[button title="'.ot_get_option('pts_homepage_column_sections_sec_3_btn').'" href="'.ot_get_option('pts_homepage_column_sections_sec_3_link').'"]').'
                </div>
        </div>';

    return $elstart.$returns.$elend;
}*/

function pts_main_wrap() {
   return 'container-fluid';
}

function set_container() {
    if (is_singular() && pts_has_shortcode('vc_row') && get_page_template_slug()!='') {
		$set_container = pts_main_wrap();
    }
    /*elseif(is_product()){
        $set_container = pts_main_wrap();
    }*/
    elseif(get_page_temp() == 'default' && pts_has_shortcode('vc_row')){
        $set_container = 'row';
    }
    else
    {
        $set_container = 'container no-15';
    }
    return $set_container;
}

function theme_excerpts(){
    /*if(!is_cart() || !is_checkout() || !is_account_page() || !is_page('cart')){
        return the_excerpt();
    }
    else{
        return;
    }*/
    return the_excerpt();
}


function pts_posted_on($author='1', $cat='1')
    {
    $aid = get_post_field( 'post_author', get_queried_object_id() );
    $ann = get_userdata( $aid );

        if(ot_get_option('pts_posts_meta_date_time'))
            $output .= '<span class="fa fa-calendar" style="margin-right:15px;"> '.get_the_date().'</span>';
        if(ot_get_option('pts_posts_meta_author_name') && $author == 1)
            $output .= '<span class="fa fa-user" style="margin-right:15px;"> '.$ann->user_nicename.'</span>';
        if(ot_get_option('pts_posts_meta_category') && $cat == 1)
            $output .= '<span class="fa fa-edit" style="margin-right:15px;"> '.get_the_category_list( ', ' ).'</span>';

    return $output;
    }


if(!function_exists('pts_comments')) {
    function pts_comments($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        if(get_comment_type() == 'pingback' || get_comment_type() == 'trackback') :
            ?>

            <li id="comment-<?php comment_ID(); ?>" class="pingback">
                <div class="comment-block row">
                    <div class="col-md-12">
                        <div class="author-link"><?php _e('Pingback:', PTS_DOMAIN) ?></div>
                        <div class="comment-reply"> <?php edit_comment_link(); ?></div>
                        <?php comment_author_link(); ?>

                    </div>
                </div>
				<div class="media">
					<h4 class="media-heading"><?php _e('Pingback:', PTS_DOMAIN) ?></h4>

	                <?php comment_author_link(); ?>
					<?php edit_comment_link(); ?>
				</div>
            <?php

        elseif(get_comment_type() == 'comment') :
    	$rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) ); ?>



			<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
				<div class="media">
					<div class="pull-left">
			            <?php
			                $avatar_size = 80;
			                echo get_avatar($comment, $avatar_size);
			             ?>
					</div>
					<div class="media-body">
						<h4 class="media-heading"><?php comment_author_link(); ?></h4>
						<div class="meta-comm">
							<?php comment_date(); ?> - <?php comment_time(); ?>
						</div>

					</div>

	                <?php if ($comment->comment_approved == '0'): ?>
	                    <p class="awaiting-moderation"><?php __('Your comment is awaiting moderation.', PTS_DOMAIN) ?></p>
	                <?php endif ?>

					<?php comment_text(); ?>
					<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply to comment'),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>

					<?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) == 'yes' ) : ?>

						<div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating" class="star-rating" title="<?php echo sprintf( __( 'Rated %d out of 5', 'woocommerce' ), $rating ) ?>">
							<span style="width:<?php echo ( $rating / 5 ) * 100; ?>%"><strong itemprop="ratingValue"><?php echo $rating; ?></strong> <?php _e( 'out of 5', 'woocommerce' ); ?></span>
						</div>

					<?php endif; ?>


				</div>

        <?php endif;
    }
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

/* Rearranging Deal Page */

// Swap left and right sides of the deal page
remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 30 );
remove_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 35 );

add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_left', 35 );
add_action( 'wps_deals_single_header_content', 'wps_deals_single_header_right', 30 );

// Move sharing link from left to right (right to left)
remove_action( 'wps_deals_single_header_right', 'wps_deals_social_buttons', 20 );
add_action( 'wps_deals_single_header_left', 'wps_deals_social_buttons', 40 );

// Remove price since it is now added to button
remove_action( 'wps_deals_single_header_left', 'wps_deals_single_deal_price', 5 );


// Add slements to social deal archives
add_action( 'wps_deals_home_more_deals_content', 'pts_deal_ratings', 17 );
add_action( 'wps_deals_home_more_deals_content', 'pts_deal_description', 22 );

function pts_deal_ratings() {
	if( empty( $rating ) ) return; ?>
	<div class="deals-rating-label">
		<?php apply_filters( 'wps_deals_rating_text', __( 'Customer Rating', 'wpsdeals' ) ); ?>
	</div>
	<?php
}

function pts_deal_description() {
	the_excerpt();
}

?>
