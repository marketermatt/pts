<?php
add_filter('widget_text', 'do_shortcode');

add_shortcode('button', 'pts_button_shortcode');
function pts_button_shortcode($atts){
    $a = shortcode_atts( array(
       'title' => 'Button',
       'href' => '#',
       'size' => '',
       'style' => '',
       'el_class' => '',
       'type' => ''
   ), $atts );
    $icon = $class = '';
    if($a['style'] != '') {
	    $class .= ' '.$a['style'];
    }
    if($a['type'] != '') {
	    $class .= ' '.$a['type'];
    }
    if($a['size'] != '') {
	    $class .= ' '.$a['size'];
    }
    if($a['el_class'] != '') {
	    $class .= ' '.$a['el_class'];
    }
    return '<a class="btn'. $class .'" href="' . $a['href'] . '"><span>'. $icon . $a['title'] . '</span></a>';
}

add_shortcode('hr','pts_hr_shortcode');

function pts_hr_shortcode($atts) {
    $a = shortcode_atts(array(
        'class' => '',
        'height' => ''
    ),$atts);

    return '<hr class="divider '.$a['class'].'" style="height:'.$a['height'].'px;"/>';
}

// **********************************************************************//
// ! Call to action
// **********************************************************************//

add_shortcode('callto', 'pts_callto_shortcode');
function pts_callto_shortcode($atts, $content = null) {
    $a = shortcode_atts( array(
        'btn' => '',
        'style' => '',
        'btn_position' => 'right',
        'link' => '',
        'btn_color' => ''
    ), $atts);
    $btn = '';
    $class = '';
    $btnClass = '';

    if($a['btn'] != '') {
        $btn = '<a href="'.$a['link'].'" class="btn btn-block" style="color:#fff; background:'.$a['btn_color'].';"><h3>' . $a['btn'] . '</h3></a>';
    }

    if($a['style'] != '') {
        $class = 'style-'.$a['style'];
    }

    $output = '';
    $output .= '<div class="cta-block '.$class.'">';
    $output .= '<div class="row">';

            if($a['btn'] != '') {

                    if ($a['btn_position'] == 'left') {
                        $output .= '<div class="col-xs-12 col-md-2" style="text-align:left;">'.$btn.'</div>';
                    }
                    $output .= '<div class="col-xs-12 col-md-10">'. do_shortcode($content) .'</div>';

                    if ($a['btn_position'] == 'right') {
                        $output .= '<div class="col-xs-12 col-md-2" style="text-align:right;">'.$btn.'</div>';
                    }

            } else{
                $output .= '<div class="col-xs-12 col-md-12">'. do_shortcode($content) .'</div>';
            }
    $output .= '</div>';
    $output .= '</div>';

    return $output;
}

add_shortcode('getintouch', 'pts_getintouch');
function pts_getintouch($atts){
    $a = shortcode_atts( array(
        'email' => '',
        'phone' => '',
        'fax' => '',
        'address' => '',
        'button' => 'no'
    ), $atts);

    if($a['email']!='')
        $email = '<p class="no-margin-bottom"><i class="fa fa-envelope"></i> '.$a['email'].'</p>';

    if($a['phone']!='')
        $phone = '<p class="no-margin-bottom"><i class="fa fa-phone"></i> '.$a['phone'].'</p>';

    if($a['fax']!='')
        $fax = '<p class="no-margin-bottom"><i class="fa fa-fax"></i> '.$a['fax'].'</p>';

    if($a['address']!='')
        $address = '<p class="no-margin-bottom"><i class="fa fa-map-marker "></i> '.$a['address'].'</p>';

    if($a['button']!='no')
        $address = '<br/><a class="btn btn-accent-color">Get Map</a>';

    $output = $email.$phone.$fax.$address;

    return $output;
}

add_shortcode('recent_posts_cust', 'recent_posts_cust');
function recent_posts_cust($atts)
{
    $a = shortcode_atts( array(
        'number' => '5',
        'type' => '',
        'date' => 'yes',
        'image' => 'no',
        'excerpt' => 'yes',
        'title' => 'yes'
    ), $atts);

    $args = '';
    $args = array(
        'ignore_sticky_posts'    => false,
	    'order'                  => 'DESC'
    );

    $args['posts_per_page'] = $a['number'];

    if($a['type'] != '')
        $args['post_type'] = $a['type'];

    query_posts($args);

    $content = "";
    $content .= "<ul class='shortcode_recent_entries'>";
    if( have_posts() ) :

        while( have_posts() ) :
            the_post();
            $link = get_permalink();
            $title = get_the_title();
            $thumb_id = get_post_thumbnail_id();
            $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
            $thumb_url = $thumb_url_array[0];

            $content .= "<li>";

            if($a['image']!='no')
                $content .= "<a href='$link'><img src='".$thumb_url."'/></a>";

            if($a['date']=='yes'){
                $date = get_the_date();
                $content .= "<div class='post-date'>".$date."</div>";
            }

            if($a['title']=='yes')
                $content .= "<a href='$link'><h6>$title</h6></a>";

            if($a['excerpt']=='yes'){
                $content .= "<p class='excerpt'>" . get_the_excerpt() . "</p>";
                $content .= "</li>";
            }

        endwhile;
        wp_reset_query();
    endif;
    $content .= "</ul>";

    return $content;   // For use as widget
}

add_shortcode('social_area', 'pts_social_shortcode');
function pts_social_shortcode($atts){
    return '<ul class="ul-vert">'.top_social_section().'</ul>';
}

add_shortcode('cur_year','cur_year_func');
function cur_year_func(){
    return date('Y');
}

/***********************************Deals shortcodes***********************************/
add_shortcode('local_joe_deals','pts_local_joes_shortcode_function');
function pts_local_joes_shortcode_function($atts, $content = null) {
    $a = shortcode_atts(array(
        'title' => 'Deals',
        'align_title' => 'left',
        'deals_per_row' => 6,
        'deal_type' => 2,
        'deal_count' => 5
    ),$atts);

    if($a['deals_per_row'] == 6)
        $deal_class = 'col-xs-12 col-sm-3 col-md-2';
    if($a['deals_per_row'] == 4)
        $deal_class = 'col-xs-12 col-sm-4 col-md-3';
    if($a['deals_per_row'] == 3)
        $deal_class = 'col-xs-12 col-sm-6 col-md-4';
    if($a['deals_per_row'] == 1)
        $deal_class = 'col-xs-12 col-sm-12 col-md-12';

    $title_area = '<h3 style="text-align:'.$a['align_title'].'; margin-top:0; margin-bottom:15px; text-transform:uppercase;" class="deals-shortcode-title">'.$a['title'].'</h3>';
    $title_area .= '<h6 style="text-align:'.$a['align_title'].'; margin-top:0; margin-bottom:15px; text-transform:uppercase;"><a href="#">VIEW ALL DEALS</a></h6>';

    $args = array(
        'post_type' => 'wpsdeals'
    );

    if($a['deal_type'] == 1):
        $args['meta_key'] = 'pts_post_views_count';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
    endif;

    if($a['deal_type'] == 2):
        $args['order'] = 'DESC';
    endif;

    if($a['deal_type'] != 1 && $a['deal_type'] != 2):
        $args['order'] = 'DESC';
    endif;

    if($a['deal_count'] == '')
        $a['deal_count'] = 5;
    $args['posts_per_page'] = $a['deal_count'];

    print_r($args);

    $deals = '<div class="row">';

    $the_query = new WP_Query( $args );
    while ( $the_query->have_posts() ) : $the_query->the_post();
        $deals .= '<div class="'.$deal_class.' deals-shortcode">';
        $deals .= 'I am a deal';
        $deals .= '</div>';
    endwhile;

    $deals .= '</div>';
    $output = $title_area;
    return $output;
}



