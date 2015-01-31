<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 1/12/15
 * Time: 1:51 PM
 */

//main style added to the top of each page

add_action('wp_head', 'pts_style_init');
if(!function_exists('pts_style_init')) {
    function pts_style_init()
    {
        ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("a[class^='prettyPhoto']").prettyPhoto();
            });
        </script>
        <style type="text/css">
            <?php
                $sitebackground = ot_get_option('pts_site_bg');

                echo 'body{';
                    if(!empty($sitebackground['background-color'])):  echo  'background-color:'. $sitebackground['background-color'].' !important;'; endif;
                    if(!empty($sitebackground['background-image'])):  echo 'background-image: url('.$sitebackground['background-image'].');'; endif;
                    if(!empty($sitebackground['background-attachment'])):  echo 'background-attachment:'. $sitebackground['background-attachment'].';'; endif;
                    if(!empty($sitebackground['background-repeat'])): echo 'background-repeat:'.$sitebackground['background-repeat'].';'; endif;
                    if(!empty($sitebackground['background-color'])): echo 'background-color:'. $sitebackground['background-color'].';'; endif;
                    if(!empty($sitebackground['background-position'])): echo 'background-position:' . $sitebackground['background-position'].';'; endif;
                    if(ot_get_option('background_cover') == 'enable'): echo 'background-size: cover;'; endif;
                    echo 'line-height:'.ot_get_option('pts_main_font')['line-height'].'; font-size:'.ot_get_option('pts_main_font')['font-size'].'; color:'.ot_get_option('pts_main_font')['font-color'].'; font-family:'.ot_get_option('pts_main_font')['font-family'].';';
                echo '}';

                echo 'p{ line-height:'.ot_get_option('pts_main_font')['line-height'].'; font-size:'.ot_get_option('pts_main_font')['font-size'].'; color:'.ot_get_option('pts_main_font')['font-color'].';}';
                echo 'a{ font-color:'.ot_get_option('pts_accent_color').';}';
                echo '.form-holder .search-slider-button{ background:'.ot_get_option('pts_accent_color').' !important;-webkit-border-radius: 0px; -moz-border-radius: 0px; border-radius: 0px;}';
        echo '.wpb_accordion_section .ui-state-default{border: 1px solid '.ot_get_option('pts_accent_color').';}';
                echo '.btn-accent-color, .footer-area .widget_recent_entries .post-date, ul.shortcode_recent_entries .post-date{background-color:'.ot_get_option('pts_accent_color').' !important;}';
                echo '.borderbottom h3, .wpb_tabs_nav{color:'.ot_get_option('pts_accent_color').' !important;}';
                if(ot_get_option('pts_top_menu_bg')) { echo '.section-top{background:'.ot_get_option('pts_top_menu_bg').';}'; };
                if(ot_get_option('pts_top_menu_color')) { echo '.section-top li a{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_main_font')['font-family']).'; color:'.ot_get_option('pts_top_menu_color').'; font-size:'.ot_get_option('pts_main_font')['font-size'].'; font-style:'.ot_get_option('pts_main_font')['font-style'].'; font-variant:'.ot_get_option('pts_main_font')['font-variant'].'; font-weight:'.ot_get_option('pts_main_font')['font-weight'].'; letter-spacing:'.ot_get_option('pts_main_font')['letter-spacing'].'; font-variant:'.ot_get_option('pts_main_font')['font-variant'].'; text-transform:'.ot_get_option('pts_main_font')['text-transform'].';}'; }
                if(ot_get_option('pts_menu_font')){ echo '.head-nav .navbar-nav li a, .shopping-cart-widget{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_menu_font')['font-family']).'; color:'.ot_get_option('pts_menu_font')['font-color'].'; font-size:'.ot_get_option('pts_menu_font')['font-size'].'; font-style:'.ot_get_option('pts_menu_font')['font-style'].'; font-variant:'.ot_get_option('pts_menu_font')['font-variant'].'; font-weight:'.ot_get_option('pts_menu_font')['font-weight'].'; letter-spacing:'.ot_get_option('pts_menu_font')['letter-spacing'].';  line-height:'.ot_get_option('pts_menu_font')['line-height'].'; text-decoration:'.ot_get_option('pts_menu_font')['text-decoration'].'; text-transform:'.ot_get_option('pts_menu_font')['text-transform'].'; }'; }
        echo '.dropdown-menu > li > a, .dropdown-menu > li > a{color:'.ot_get_option('pts_main_menu_color_hover').' !important;}';
                echo '.nav > li > a:hover, .nav > li > a:focus, .nav li.active a{color:'.ot_get_option('pts_main_menu_color_hover').';}';
                if(ot_get_option('pts_main_menuitem_bg_color_hover')){ echo '.navbar-nav > li > .dropdown-menu, .dropdown-menu, .nav > li > a:hover, .nav > li > a:focus, .nav li.active a{background:'.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;}'; }
                echo '.dropdown-menu:after{border-bottom:11px solid '.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;}';
                echo '#top-widget{ margin-top:'.ot_get_option('pts_menu_margin_top').' !important;}';
                echo '.homepage-column-1 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_1_color').';}';
                echo '.homepage-column-2 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_2_color').'}';
                echo '.homepage-column-3 .icon-area{background-color:'.ot_get_option('pts_homepage_column_sections_sec_3_color').'}';

        echo '.button-area-1 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_1_color').'; color:#fff !important;}';
        echo '.button-area-2 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_2_color').'; color:#fff !important;}';
        echo '.button-area-3 .btn{background-color:'.ot_get_option('pts_homepage_column_sections_sec_3_color').'; color:#fff !important;}';

        echo 'h1{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h1')['font-family']).'; font-size:'.ot_get_option('pts_h1')['font-size'].'; font-color:'.ot_get_option('pts_h1')['font-color'].'; font-style:'.ot_get_option('pts_h1')['font-style'].'; font-variant:'.ot_get_option('pts_h1')['font-variant'].'; font-weight:'.ot_get_option('pts_h1')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h1')['letter-spacing'].'; line-height:'.ot_get_option('pts_h1')['line-height'].'; text-decoration:'.ot_get_option('pts_h1')['text-decoration'].'; text-transform:'.ot_get_option('pts_h1')['text-transform'].';}';

        echo 'h2{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h2')['font-family']).'; font-size:'.ot_get_option('pts_h2')['font-size'].'; font-color:'.ot_get_option('pts_h2')['font-color'].'; font-style:'.ot_get_option('pts_h2')['font-style'].'; font-variant:'.ot_get_option('pts_h2')['font-variant'].'; font-weight:'.ot_get_option('pts_h2')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h2')['letter-spacing'].'; line-height:'.ot_get_option('pts_h2')['line-height'].'; text-decoration:'.ot_get_option('pts_h2')['text-decoration'].'; text-transform:'.ot_get_option('pts_h2')['text-transform'].';}';

        echo 'h3{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h3')['font-family']).'; font-size:'.ot_get_option('pts_h3')['font-size'].'; font-color:'.ot_get_option('pts_h3')['font-color'].'; font-style:'.ot_get_option('pts_h3')['font-style'].'; font-variant:'.ot_get_option('pts_h3')['font-variant'].'; font-weight:'.ot_get_option('pts_h3')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h3')['letter-spacing'].'; line-height:'.ot_get_option('pts_h3')['line-height'].'; text-decoration:'.ot_get_option('pts_h3')['text-decoration'].'; text-transform:'.ot_get_option('pts_h3')['text-transform'].';}';

        echo 'h4{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h4')['font-family']).'; font-size:'.ot_get_option('pts_h4')['font-size'].'; font-color:'.ot_get_option('pts_h4')['font-color'].'; font-style:'.ot_get_option('pts_h4')['font-style'].'; font-variant:'.ot_get_option('pts_h4')['font-variant'].'; font-weight:'.ot_get_option('pts_h4')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h4')['letter-spacing'].'; line-height:'.ot_get_option('pts_h4')['line-height'].'; text-decoration:'.ot_get_option('pts_h4')['text-decoration'].'; text-transform:'.ot_get_option('pts_h4')['text-transform'].';}';

        echo 'h5{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h5')['font-family']).'; font-size:'.ot_get_option('pts_h5')['font-size'].'; font-color:'.ot_get_option('pts_h5')['font-color'].'; font-style:'.ot_get_option('pts_h5')['font-style'].'; font-variant:'.ot_get_option('pts_h5')['font-variant'].'; font-weight:'.ot_get_option('pts_h5')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h5')['letter-spacing'].'; line-height:'.ot_get_option('pts_h5')['line-height'].'; text-decoration:'.ot_get_option('pts_h5')['text-decoration'].'; text-transform:'.ot_get_option('pts_h5')['text-transform'].';}';

        echo 'h6{font-family:'.pts_get_chosen_google_font(ot_get_option('pts_h6')['font-family']).'; font-size:'.ot_get_option('pts_h6')['font-size'].'; font-color:'.ot_get_option('pts_h6')['font-color'].'; font-style:'.ot_get_option('pts_h6')['font-style'].'; font-variant:'.ot_get_option('pts_h6')['font-variant'].'; font-weight:'.ot_get_option('pts_h6')['font-weight'].'; letter-spacing:'.ot_get_option('pts_h6')['letter-spacing'].'; line-height:'.ot_get_option('pts_h6')['line-height'].'; text-decoration:'.ot_get_option('pts_h6')['text-decoration'].'; text-transform:'.ot_get_option('pts_h6')['text-transform'].';}';



            ?>
        </style>
        <?php
    }
}

if(!function_exists('pts_js_init')) {
    function pts_js_init()
    {
        ?>
        <script type="text/javascript">
            jQuery('.dropdown-toggle').dropdownHover();
            jQuery('.btn-tooltip').tooltip();
            jQuery('.label-tooltip').tooltip();
            jQuery('.pick-class-label').click(function(){
                var new_class = jQuery(this).attr('new-class');
                var old_class = jQuery('#display-buttons').attr('data-class');
                var display_div = jQuery('#display-buttons');
                if(display_div.length) {
                    var display_buttons = display_div.find('.btn');
                    display_buttons.removeClass(old_class);
                    display_buttons.addClass(new_class);
                    display_div.attr('data-class', new_class);
                }
            });
            jQuery( "#slider-range" ).slider({
                range: true,
                min: 0,
                max: 500,
                values: [ 75, 300 ]
            });
            jQuery( "#slider-default" ).slider({
                value: 70,
                orientation: "horizontal",
                range: "min",
                animate: true
            });
            jQuery('.carousel').carousel({
                interval: <?php echo ot_get_option('pts_slider_speed'); ?>
            });
        </script>
    <?php
    }
}
add_action('wp_footer', 'pts_js_init',30);

function pts_get_logo(){
    if(ot_get_option('pts_logo')):
        echo '<div id="logo-area"><img src="'.ot_get_option('pts_logo').'" id="main-logo"></div>';
    else:
        echo 'No Standard Logo Set. Please setup a logo';
    endif;
}

function pts_get_chosen_google_font($savedslug){
    //replace the _ with a space
    $savedslug = str_replace('_',' ',$savedslug);
    $savedslug = ucwords($savedslug);
    return $savedslug;
}
