<?php

add_action( 'init', 'pts_VC_setup');
if(!function_exists('getCSSAnimation')) {
    function getCSSAnimation($css_animation) {
        $output = '';
        if ( $css_animation != '' ) {
            wp_enqueue_script( 'waypoints' );
            $output = ' wpb_animate_when_almost_visible wpb_'.$css_animation;
        }
        return $output;
    }
}

if(!function_exists('buildStyle')) {
    function buildStyle($bg_image = '', $bg_color = '', $bg_image_repeat = '', $font_color = '', $padding = '', $margin_bottom = '', $margin_top = '') {
        $has_image = false;
        $style = '';
        if((int)$bg_image > 0 && ($image_url = wp_get_attachment_url( $bg_image, 'large' )) !== false) {
            $has_image = true;
            $style .= "background-image: url(".$image_url.");";
        }
        if(!empty($bg_color)) {
            $style .= vc_get_css_color('background-color', $bg_color);
        }
        if(!empty($bg_image_repeat) && $has_image) {
            if($bg_image_repeat === 'cover') {
                $style .= "background-repeat:no-repeat;background-size: cover;";
            } elseif($bg_image_repeat === 'contain') {
                $style .= "background-repeat:no-repeat;background-size: contain;";
            } elseif($bg_image_repeat === 'no-repeat') {
                $style .= 'background-repeat: no-repeat;';
            }
        }
        if( !empty($font_color) ) {
            $style .= vc_get_css_color('color', $font_color); // 'color: '.$font_color.';';
        }
        if( $padding != '' ) {
            $style .= 'padding: '.(preg_match('/(px|em|\%|pt|cm)$/', $padding) ? $padding : $padding.'px').';';
        }
        if( $margin_bottom != '' ) {
            $style .= 'margin-bottom: '.(preg_match('/(px|em|\%|pt|cm)$/', $margin_bottom) ? $margin_bottom : $margin_bottom.'px').';';
        }
        if( $margin_top != '' ) {
            $style .= 'margin-top: '.(preg_match('/(px|em|\%|pt|cm)$/', $margin_top) ? $margin_top : $margin_top.'px').';';
        }
        return empty($style) ? $style : ' style="'.$style.'"';
    }
}

if(!function_exists('pts_VC_setup')) {
    function pts_VC_setup(){
        if (!class_exists('WPBakeryVisualComposerAbstract')) return;
		global $vc_params_list;
		$vc_params_list[] = 'icon';

        //remove the default carousels and tours for VC
		vc_remove_element("vc_carousel");
		vc_remove_element("vc_images_carousel");
		vc_remove_element("vc_tour");

        $target_arr = array(__("Same window", PTS_DOMAIN) => "_self", __("New window", PTS_DOMAIN) => "_blank");
		$add_css_animation = array(
		  "type" => "dropdown",
		  "heading" => __("CSS Animation", PTS_DOMAIN),
		  "param_name" => "css_animation",
		  "admin_label" => true,
		  "value" => array(__("No", PTS_DOMAIN) => '', __("Top to bottom", PTS_DOMAIN) => "top-to-bottom", __("Bottom to top", PTS_DOMAIN) => "bottom-to-top", __("Left to right", PTS_DOMAIN) => "left-to-right", __("Right to left", PTS_DOMAIN) => "right-to-left", __("Appear from center", PTS_DOMAIN) => "appear"),
		  "description" => __("Select animation type if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.", PTS_DOMAIN)
		);

        // **********************************************************************//
	    // ! Row
	    // **********************************************************************//

        function vc_theme_vc_row($atts, $content = null) {
			$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
			extract(shortcode_atts(array(
			    'anchor'          => '',
			    'el_class'        => '',
			    'bg_image'        => '',
			    'bg_color'        => '',
			    'bg_image_repeat' => '',
			    'font_color'      => '',
			    'padding'         => '10',
			    'margin_bottom'   => '20',
                'margin_top'      => '20',
			    'css' => ''
			), $atts));

			// wp_enqueue_style( 'js_composer_front' );
			wp_enqueue_script( 'wpb_composer_front_js' );
			// wp_enqueue_style('js_composer_custom_css');

			$el_class = ' '.$el_class.' ';

			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. get_row_css_class() .' '.set_container(). $el_class . vc_shortcode_custom_css_class( $css, ' ' ),  $atts );

            if(get_page_temp() == 'default'){
                $inner_class = 'row padd-right';
            }
            else
            {
                $inner_class = 'container no-15';
            }

			$style = buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom, $margin_top);
			$output .= '<div class="'.$css_class.'"'.$style.'>';
            $output .= '<div class="'.$inner_class.'">';
			$output .= wpb_js_remove_wpautop($content);
			$output .= '</div>';
			$output .= '</div>';
            //$output .= '</div>';

            return $output;
	    }

        // **********************************************************************//
	    // ! Separator
	    // **********************************************************************//
	    $setting_vc_separator = array (
	    "show_settings_on_create" => true,
	      'params' => array(
	          array(
	            "type" => "dropdown",
	            "heading" => __("Type", PTS_DOMAIN),
	            "param_name" => "type",
	            "value" => array(
	                "",
	                __("Default", PTS_DOMAIN) => "",
	                __("Double", PTS_DOMAIN) => "double",
	                __("Dashed", PTS_DOMAIN) => "dashed",
	                __("Dotted", PTS_DOMAIN) => "dotted",
	                __("Double Dotted", PTS_DOMAIN) => "double dotted",
	                __("Double Dashed", PTS_DOMAIN) => "double dashed",
	                __("Horizontal break", PTS_DOMAIN) => "horizontal-break",
	                __("Space", PTS_DOMAIN) => "space"
	              )
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("Height", PTS_DOMAIN),
	            "param_name" => "height",
	            "dependency" => Array('element' => "type", 'value' => array('space'))
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("Extra class", PTS_DOMAIN),
	            "param_name" => "class"
	          )
	        )
	    );
	    vc_map_update('vc_separator', $setting_vc_separator);

        function vc_theme_vc_separator($atts, $content = null) {
	      $output = $color = $el_class = $css_animation = '';
	      extract(shortcode_atts(array(
	          'type' => '',
	          'class' => '',
	          'height' => ''
	      ), $atts));

	      $output .= do_shortcode('[hr class="'.$type.' '.$class.'" height="'.$height.'"]');
	      return $output;
	    }

        // **********************************************************************//
	    // ! Alert boxes
	    // **********************************************************************//

	    function vc_theme_vc_message($atts, $content = null) {
	      $output = $color = $el_class = $css_animation = '';
	      extract(shortcode_atts(array(
              'style' => 'rounded',
	          'color' => 'alert-info',
	          'el_class' => '',
	      ), $atts));

            if($color == 'alert-info'){
                $color_style = 'bg-info ';
            }
            elseif($color == 'alert-warning'){
                $color_style = 'bg-warning ';
            }
            elseif($color == 'alert-success'){
                $color_style = 'bg-success';
            }
            elseif($color == 'alert-danger'){
                $color_style = 'bg-danger ';
            }
            else{
                $color_style = 'bg-info ';
            }


	      $color = ( $color != '' ) ? ' '.$color : '';
	      $css_class = $color_style.$el_class.' '.$style;
	      $output .= '<div class="'.$css_class.' messagebox">'.wpb_js_remove_wpautop($content).'</div>';
	      return $output;
	    }

        // **********************************************************************//
	    // ! Single Image
	    // **********************************************************************//
	   $setting_vc_single_image = array(
		  "params" => array(
		    array(
		      "type" => "attach_image",
		      "heading" => __("Image", PTS_DOMAIN),
		      "param_name" => "image",
		      "value" => "",
		      "description" => __("Select image from media library.", PTS_DOMAIN)
		    ),
		    //$add_css_animation,
		    array(
		      "type" => "textfield",
		      "heading" => __("Image size", PTS_DOMAIN),
		      "param_name" => "img_size",
		      "description" => __("Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use 'thumbnail' size.", PTS_DOMAIN)
		    ),
            array(
	            "type" => "dropdown",
	            "heading" => __("Align", PTS_DOMAIN),
	            "param_name" => "align",
	            "value" => array(
	                "",
	                __("Left", PTS_DOMAIN) => "left",
	                __("Center", PTS_DOMAIN) => "center",
	                __("Right", PTS_DOMAIN) => "right"
	              )
	          ),
		    array(
		      "type" => 'checkbox',
		      "heading" => __("Link to large image?", PTS_DOMAIN),
		      "param_name" => "img_link_large",
		      "description" => __("If selected, image will be linked to the bigger image.", PTS_DOMAIN),
		      "value" => Array(__("Yes, please", PTS_DOMAIN) => 'yes')
		    ),
			array(
				'type' => 'href',
				'heading' => __( 'Image link', 'js_composer' ),
				'param_name' => 'link',
				'description' => __( 'Enter URL if you want this image to have a link.', 'js_composer' ),
				'dependency' => array(
					'element' => 'img_link_large',
					'is_empty' => true,
					'callback' => 'wpb_single_image_img_link_dependency_callback'
				)
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Link Target', 'js_composer' ),
				'param_name' => 'img_link_target',
				'value' => $target_arr,
				'dependency' => array(
					'element' => 'link',
					'not_empty' => true
				)
			),
		    array(
		      "type" => "textfield",
		      "heading" => __("Extra class name", PTS_DOMAIN),
		      "param_name" => "el_class",
		      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", PTS_DOMAIN)
		    )
		  )
		);
	    vc_map_update('vc_single_image', $setting_vc_single_image);

        function vc_theme_vc_single_image($atts, $content = null) {
			$output = $a_class = $el_class = $image = $img_size = $img_link = $img_link_target = $img_link_large = $title = $css_animation = '';

			extract(shortcode_atts(array(
			    'title' => '',
			    'image' => '',
			    'img_src' => '',
                'align' => 'left',
			    'img_size'  => 'thumbnail',
			    'img_link_large' => false,
			    'link' => '',
			    'img_link_target' => '_self',
			    'el_class' => '',
			    'css_animation' => ''
			), $atts));

			$img_id = preg_replace('/[^\d]/', '', $image);
			$img = wpb_getImageBySize(array( 'attach_id' => $img_id, 'thumb_size' => $img_size ));

			$link_to = '';
			if ($img_link_large==true) {
			    $link_to = wp_get_attachment_image_src( $img_id, 'large');
			    $link_to = $link_to[0];
			}
			else if (!empty($link)) {
			    $link_to = $link;
			}

			if ( $img == NULL ) {

				if ($img_link_large==true) {
			    	$link_to = $img_src;
				}

				$img = array(
					'thumbnail' => '<img src="'.$img_src.'">'
				);
			}

			$el_class = ' '.$el_class. ' ';

			if($img_link_large==true) {
				$a_class = ' rel="lightbox"';
			}

            $extraclass = 'wpb_singleimage_heading';

            $alignclass = '';
            if($align == 'left')
                $alignclass .= ' single_image_align_left';
            if($align == 'right')
                $alignclass .= ' single_image_align_right';
            if($align == 'center')
                $alignclass .= ' single_image_align_center';

			$image_string = !empty($link_to) ? '<a'.$a_class.' href="'.$link_to.'"'.($img_link_target!='_self' ? ' target="'.$img_link_target.'"' : '').'>'.$img['thumbnail'].'</a>' : $img['thumbnail'];

			$css_class =  apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_single_image wpb_content_element'.$el_class);
			$css_class .= getCSSAnimation($css_animation);

			$output .= "\n\t".'<div class="'.$css_class.'">';
			$output .= "\n\t\t".'<div class="wpb_wrapper'.$alignclass.'">';
			$output .= "\n\t\t\t".wpb_widget_title(array('title' => $title, 'extraclass' => $extraclass));
			$output .= "\n\t\t\t".$image_string;
			$output .= "\n\t\t".'</div> ';
			$output .= "\n\t".'</div> ';

			return $output;
	    }

        // **********************************************************************//
	    // ! Button
	    // **********************************************************************//
	    $setting_vc_button = array (
	      "params" => array(
	          array(
	            "type" => "textfield",
	            "heading" => __("Text on the button", PTS_DOMAIN),
	            "holder" => "button",
	            "class" => "wpb_button",
	            "param_name" => "title",
	            "value" => __("Text on the button", PTS_DOMAIN),
	            "description" => __("Text on the button.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("URL (Link)", PTS_DOMAIN),
	            "param_name" => "href",
	            "description" => __("Button link.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "dropdown",
	            "heading" => __("Target", PTS_DOMAIN),
	            "param_name" => "target",
	            "value" => $target_arr,
	            "dependency" => Array('element' => "href", 'not_empty' => true)
	          ),
	          array(
	            "type" => "dropdown",
	            "heading" => __("Type", PTS_DOMAIN),
	            "param_name" => "type",
	            "value" => array('bordered', 'filled'),
	            "description" => __("Button type.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "dropdown",
	            "heading" => __("Size", PTS_DOMAIN),
	            "param_name" => "size",
	            "value" => array('small','medium','big'),
	            "description" => __("Button size.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("Extra class name", PTS_DOMAIN),
	            "param_name" => "el_class",
	            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", PTS_DOMAIN)
	          )
	        )
	    );
	    vc_map_update('vc_button', $setting_vc_button);

	    function vc_theme_vc_button($atts, $content = null) {
	    	return pts_button_shortcode($atts, $content);
	    }


        // **********************************************************************//
	    // ! Call To Action
	    // **********************************************************************//
	    $setting_cta_button = array (
	      "params" => array(
	          array(
	            "type" => "textarea_html",
	            "heading" => __("Text", PTS_DOMAIN),
	            "param_name" => "content",
	            "value" => __("Click edit button to change this text.", PTS_DOMAIN),
	            "description" => __("Enter your content.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "dropdown",
	            "heading" => __("Block Style", PTS_DOMAIN),
	            "param_name" => "style",
	            "value" => array(
	              "" => "",
	              __("Default", PTS_DOMAIN) => "default",
	              __("Filled", PTS_DOMAIN) => "filled"
	            )
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("Text on the button", PTS_DOMAIN),
	            "param_name" => "title",
	            "description" => __("Text on the button.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "textfield",
	            "heading" => __("URL (Link)", PTS_DOMAIN),
	            "param_name" => "href",
	            "description" => __("Button link.", PTS_DOMAIN)
	          ),
	          array(
	            "type" => "dropdown",
	            "heading" => __("Button position", PTS_DOMAIN),
	            "param_name" => "position",
	            "value" => array(__("Align right", PTS_DOMAIN) => "right", __("Align left", PTS_DOMAIN) => "left"),
	            "description" => __("Select button alignment.", PTS_DOMAIN)
	          ),
              array(
	          'type' => 'colorpicker',
	          "heading" => __("Button Color", PTS_DOMAIN),
	          "param_name" => "button_color"
	        ),
	        )
	    );
	    vc_map_update('vc_cta_button', $setting_cta_button);

	    function vc_theme_vc_cta_button($atts, $content = null) {
	      $output = $call_title = $href = $title = $call_text = $el_class = $button_color = '';
	      extract(shortcode_atts(array(
	          'href' => '',
	          'style' => '',
	          'title' => '',
	          'position' => 'right',
              'button_color' => ''
	      ), $atts));

	      return do_shortcode('[callto btn_position="'.$position.'" btn="'.$title.'" style="'.$style.'" link="'.$href.'" btn_color="'.$button_color.'"]'.wpb_js_remove_wpautop($content).'[/callto]');
	    }


        // **********************************************************************//
	    // ! Register New Element: Popular Deals
	    // **********************************************************************//

	    $popular_deals_params = array(
	      'name' => 'Deals',
	      'base' => 'local_joe_deals',
	      'icon' => 'icon-wpb-etheme',
	      'category' => 'Local Joe\'s',
	      'params' => array(
	        array(
	          'type' => 'textfield',
	          "heading" => __("Widget title", PTS_DOMAIN),
	          "param_name" => "title",
	          "description" => __("What text use as a widget title. Leave blank if no title is needed.", PTS_DOMAIN)
	        ),
	        array(
	          "type" => "dropdown",
	          "heading" => __("Align Title", PTS_DOMAIN),
	          "param_name" => "align_title",
	          "value" => array(
	              "",
	              __("Float Left", PTS_DOMAIN) => 'left',
	              __("Float Center", PTS_DOMAIN) => 'center',
	              __("Float Right", PTS_DOMAIN) => 'right'
	            )
	        ),
            array(
	          "type" => "dropdown",
	          "heading" => __("Deals Per Row", PTS_DOMAIN),
	          "param_name" => "deals_per_row",
	          "value" => array(
	              "",
	              __("3", PTS_DOMAIN) => '3',
	              __("4", PTS_DOMAIN) => '4',
	            )
	        ),
            array(
	          "type" => "dropdown",
	          "heading" => __("Deal Type", PTS_DOMAIN),
	          "param_name" => "deal_type",
	          "value" => array(
	              "",
	              __("Popular", PTS_DOMAIN) => '1',
	              __("New Deals", PTS_DOMAIN) => '2'
	            )
	        ),
            array(
	          'type' => 'textfield',
	          "heading" => __("Count", PTS_DOMAIN),
	          "param_name" => "deal_count",
	          "description" => __("How many deals to show? Please enter number only.", PTS_DOMAIN)
	        ),
	      )

	    );
	    vc_map($popular_deals_params);




















    }
}
