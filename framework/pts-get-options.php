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
        //get all the options with arrays into a variable
        $sitebackground = ot_get_option('pts_site_bg');
        $pts_main_font = ot_get_option('pts_main_font');
        $pts_menu_font = ot_get_option('pts_menu_font');
        $pts_h1 = ot_get_option('pts_h1');
        $pts_h2 = ot_get_option('pts_h2');
        $pts_h3 = ot_get_option('pts_h3');
        $pts_h4 = ot_get_option('pts_h4');
        $pts_h5 = ot_get_option('pts_h5');
        $pts_h6 = ot_get_option('pts_h6');

        ?>
        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("a[class^='prettyPhoto']").prettyPhoto();
            });
        </script>
        <style type="text/css">
            <?php

                 echo 'body{';
                     if(!empty($sitebackground['background-color'])):  echo  'background-color:'. $sitebackground['background-color'].' !important;'; endif;
                     if(!empty($sitebackground['background-image'])):  echo 'background-image: url('.$sitebackground['background-image'].');'; endif;
                     if(!empty($sitebackground['background-attachment'])):  echo 'background-attachment:'. $sitebackground['background-attachment'].';'; endif;
                     if(!empty($sitebackground['background-repeat'])): echo 'background-repeat:'.$sitebackground['background-repeat'].';'; endif;
                     if(!empty($sitebackground['background-color'])): echo 'background-color:'. $sitebackground['background-color'].';'; endif;
                     if(!empty($sitebackground['background-position'])): echo 'background-position:' . $sitebackground['background-position'].';'; endif;
                     if(ot_get_option('background_cover') == 'enable'): echo 'background-size: cover;'; endif;
                     echo 'line-height:'.$pts_main_font['line-height'].'; font-size:'.$pts_main_font['font-size'].'; color:'.$pts_main_font['font-color'].'; font-family:'.pts_get_chosen_google_font($pts_main_font['font-family']).';';
                 echo '}';
        //end of body area

        //begin p tag
         echo 'p{ line-height:'.$pts_main_font['line-height'].'; font-size:'.$pts_main_font['font-size'].'; color:'.$pts_main_font['font-color'].'; font-family:'.pts_get_chosen_google_font($pts_main_font['font-family']).';}';
        //end of p tag

        //begin a tag
        echo 'a{ color:'.ot_get_option('pts_accent_color').';}';
        //end of a tags

         //all accent color items
        echo '#header-area #header-bottom,
        .ul-vert li.social-link a,
        .wps-deals-mc-subscribe-wrapper{
            background:'.ot_get_option('pts_accent_color').' !important;
        }';

        echo '#footer-area{
            border-top: 5px solid '.ot_get_option('pts_accent_color').' !important;
        }';

        echo '.wpb_accordion_section .ui-state-default{border: 1px solid '.ot_get_option('pts_accent_color').';}';

        echo '.btn-accent-color{background-color:'.ot_get_option('pts_accent_color').' !important;}';

        echo '.borderbottom h3, .wpb_tabs_nav{color:'.ot_get_option('pts_accent_color').' !important;}';
        //end all accent color items

        //begin menu area
         echo '.head-nav .navbar-nav li a,
         .shopping-cart{
             font-family:'.pts_get_chosen_google_font($pts_menu_font['font-family']).';
             color:'.$pts_menu_font['font-color'].';
             font-size:'.$pts_menu_font['font-size'].';
             font-style:'.$pts_menu_font['font-style'].';
             font-variant:'.$pts_menu_font['font-variant'].';
             font-weight:'.$pts_menu_font['font-weight'].';
             letter-spacing:'.$pts_menu_font['letter-spacing'].';
             line-height:'.$pts_menu_font['line-height'].';
             text-decoration:'.$pts_menu_font['text-decoration'].';
             text-transform:'.$pts_menu_font['text-transform'].';
         }';

        echo '.dropdown-menu > li > a, .dropdown-menu > li > a{color:'.ot_get_option('pts_main_menu_color_hover').' !important;}';
        echo '.nav > li > a:hover, .nav > li > a:focus, .nav li.active a{color:'.ot_get_option('pts_main_menu_color_hover').';}';
        echo '.nav > li > a{color:'.ot_get_option('pts_main_menu_color').';}';
        echo '.navbar-nav > li > .dropdown-menu,
        .dropdown-menu,
        .nav > li > a:hover,
        .nav > li > a:focus,
        .nav li.active a{
            background:'.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;
        }';

        echo '.dropdown-menu:after{border-bottom:11px solid '.ot_get_option('pts_main_menuitem_bg_color_hover').' !important;}';
        //end of menu

        //begin top widget area
        echo '#top-widget{ margin-top:'.ot_get_option('pts_menu_margin_top').' !important;}';
        //end top widget area

        //begin H1, h2, H3, H4, H5 and H6 tags
         echo 'h1{
             font-family:'.pts_get_chosen_google_font($pts_h1['font-family']).';
             font-size:'.$pts_h1['font-size'].';
             font-color:'.$pts_h1['font-color'].';
             font-style:'.$pts_h1['font-style'].';
             font-variant:'.$pts_h1['font-variant'].';
             font-weight:'.$pts_h1['font-weight'].';
             letter-spacing:'.$pts_h1['letter-spacing'].';
             line-height:'.$pts_h1['line-height'].';
             text-decoration:'.$pts_h1['text-decoration'].';
             text-transform:'.$pts_h1['text-transform'].';
         }';

         echo 'h2{
             font-family:'.pts_get_chosen_google_font($pts_h2['font-family']).';
             font-size:'.$pts_h2['font-size'].';
             font-color:'.$pts_h2['font-color'].';
             font-style:'.$pts_h2['font-style'].';
             font-variant:'.$pts_h2['font-variant'].';
             font-weight:'.$pts_h2['font-weight'].';
             letter-spacing:'.$pts_h2['letter-spacing'].';
             line-height:'.$pts_h2['line-height'].';
             text-decoration:'.$pts_h2['text-decoration'].';
             text-transform:'.$pts_h2['text-transform'].';
         }';

         echo 'h3{
             font-family:'.pts_get_chosen_google_font($pts_h3['font-family']).';
             font-size:'.$pts_h3['font-size'].';
             font-color:'.$pts_h3['font-color'].';
             font-style:'.$pts_h3['font-style'].';
             font-variant:'.$pts_h3['font-variant'].';
             font-weight:'.$pts_h3['font-weight'].';
             letter-spacing:'.$pts_h3['letter-spacing'].';
             line-height:'.$pts_h3['line-height'].';
             text-decoration:'.$pts_h3['text-decoration'].';
             text-transform:'.$pts_h3['text-transform'].';
         }';

         echo 'h4{
             font-family:'.pts_get_chosen_google_font($pts_h4['font-family']).';
             font-size:'.$pts_h4['font-size'].';
             font-color:'.$pts_h4['font-color'].';
             font-style:'.$pts_h4['font-style'].';
             font-variant:'.$pts_h4['font-variant'].';
             font-weight:'.$pts_h4['font-weight'].';
             letter-spacing:'.$pts_h4['letter-spacing'].';
             line-height:'.$pts_h4['line-height'].';
             text-decoration:'.$pts_h4['text-decoration'].';
             text-transform:'.$pts_h4['text-transform'].';
         }';

         echo 'h5{
             font-family:'.pts_get_chosen_google_font($pts_h5['font-family']).';
             font-size:'.$pts_h5['font-size'].';
             font-color:'.$pts_h5['font-color'].';
             font-style:'.$pts_h5['font-style'].';
             font-variant:'.$pts_h5['font-variant'].';
             font-weight:'.$pts_h5['font-weight'].';
             letter-spacing:'.$pts_h5['letter-spacing'].';
             line-height:'.$pts_h5['line-height'].';
             text-decoration:'.$pts_h5['text-decoration'].';
             text-transform:'.$pts_h5['text-transform'].';
         }';

         echo 'h6{
             font-family:'.pts_get_chosen_google_font($pts_h6['font-family']).';
             font-size:'.$pts_h6['font-size'].';
             font-color:'.$pts_h6['font-color'].';
             font-style:'.$pts_h6['font-style'].';
             font-variant:'.$pts_h6['font-variant'].';
             font-weight:'.$pts_h6['font-weight'].';
             letter-spacing:'.$pts_h6['letter-spacing'].';
             line-height:'.$pts_h6['line-height'].';
             text-decoration:'.$pts_h6['text-decoration'].';
             text-transform:'.$pts_h6['text-transform'].';
         }';
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
