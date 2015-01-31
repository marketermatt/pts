<?php
/**
 * Initialize the custom theme options.
 */
add_action('admin_init', 'custom_theme_options');

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options()
{

    /* OptionTree is not loaded yet */
    if (!function_exists('ot_settings_id'))
        return false;

    /**
     * Get a copy of the saved settings array.
     */
    $saved_settings = get_option(ot_settings_id(), array());

    /**
     * Custom settings array that will eventually be
     * passes to the OptionTree Settings API Class.
     */
    $custom_settings = array(
        'contextual_help' => array(
            'sidebar' => ''
        ),
        'sections' => array(
            array(
                'id' => 'general',
                'title' => __('General', PTS_DOMAIN)
            ),
            array(
                'id' => 'color',
                'title' => __('Color', PTS_DOMAIN)
            ),
            array(
                'id' => 'shop',
                'title' => __('Shop', PTS_DOMAIN)
            ),
            array(
                'id' => 'typo',
                'title' => __('Typography', PTS_DOMAIN)
            ),
            array(
                'id' => 'posts',
                'title' => __('Single Posts', PTS_DOMAIN)
            ),
            array(
                'id' => 'categories',
                'title' => __('Categories and Archives', PTS_DOMAIN)
            ),
            array(
                'id' => 'header',
                'title' => __('Header', PTS_DOMAIN)
            ),
            array(
                'id' => 'homepage',
                'title' => __('Homepage', PTS_DOMAIN)
            ),
            array(
                'id' => 'footer',
                'title' => __('Footer', PTS_DOMAIN)
            ),
            array(
                'id' => 'misc',
                'title' => __('Misc', PTS_DOMAIN)
            )
        ),
        'settings' => array(
            /*array(
                'label' => __('Fixed navigation', PTS_DOMAIN),
                'id' => 'pts_fixed_navigation',
                'type' => 'on-off',
                'desc' => 'Activate/Deactivated.',
                'std' => 'on',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'section' => 'general'
            ),*/
            array(
                'label' => __('Enable Top Bar', PTS_DOMAIN),
                'id' => 'pts_enable_top_bar',
                'type' => 'on-off',
                'desc' => 'Activate/Deactivated.',
                'std' => 'on',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'section' => 'general'
            ),
            array(
                'id' => 'pts_ga',
                'label' => __('Google Analytics', PTS_DOMAIN),
                'desc' => __('e.g.: UA-xxxxxxxxxxxxx', PTS_DOMAIN),
                'std' => '',
                'type' => 'text',
                'section' => 'general',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_accent_color',
                'label' => __('Accent Color', PTS_DOMAIN),
                'desc' => '',
                'std' => '#5da4e2',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_top_menu_bg',
                'label' => __('Top Menu Background Color', PTS_DOMAIN),
                'desc' => '',
                'std' => '#272727',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_top_menu_color',
                'label' => __('Top Menu Color', PTS_DOMAIN),
                'desc' => '',
                'std' => '#9b9d98',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            /*array(
                'id' => 'pts_main_menu_color',
                'label' => __('Main Menu Color', PTS_DOMAIN),
                'desc' => '',
                'std' => '#141414',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),*/
            array(
                'id' => 'pts_main_menu_color_hover',
                'label' => __('Main Menu Color (:hover)', PTS_DOMAIN),
                'desc' => '',
                'std' => '#f4f4f4',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            /*array(
                'id' => 'pts_main_menuitem_bg_color',
                'label' => __('Main Menu Item BG Color', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),*/
            array(
                'id' => 'pts_main_menuitem_bg_color_hover',
                'label' => __('Main Menu Item BG Color (:hover)', PTS_DOMAIN),
                'desc' => '',
                'std' => '#141414',
                'type' => 'colorpicker',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_site_bg',
                'label' => __('Site Background', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'background',
                'section' => 'color',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_main_font',
                'label' => __('Main Font', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '13px',
                    'font-weight' => '300',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '21px',
                    'text-transform' => 'none'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_menu_font',
                'label' => __('Menu Font', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '16px',
                    'font-weight' => '700',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '20px',
                    'text-transform' => 'uppercase'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h1',
                'label' => __('H1', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '52px',
                    'font-weight' => '400',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'none'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h2',
                'label' => __('H2', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '36px',
                    'font-weight' => '400',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'none'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h3',
                'label' => __('H3', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '28px',
                    'font-weight' => '400',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'none'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h4',
                'label' => __('H4', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '22px',
                    'font-weight' => '400',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'none'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h5',
                'label' => __('H5', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '16px',
                    'font-weight' => '400',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'uppercase'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_h6',
                'label' => __('H6', PTS_DOMAIN),
                'desc' => '',
                'std' => array(
                    'font-color' => '#141414',
                    'font-family' => 'open_sans',
                    'font-size' => '14px',
                    'font-weight' => '700',
                    'font-style' => 'normal',
                    'letter-spacing' => 'normal',
                    'line-height' => '30',
                    'text-transform' => 'uppercase'
                ),
                'type' => 'typography',
                'section' => 'typo',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'pts_logo',
                'label' => __('Logo', PTS_DOMAIN),
                'desc' => '',
                'std' => trailingslashit(PARENT_URL) . 'images/logo.png',
                'type' => 'upload',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_favicon',
                'label' => __('Favicon', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_slider_top_menu_left',
                'label' => __('Top Left Part', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'textarea-simple',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(2)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_menu_margin_top',
                'label' => __('Top margin for top widget area', PTS_DOMAIN),
                'desc' => 'Enter margin in px',
                'std' => '20',
                'type' => 'text',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),

            array(
                'id' => 'pts_slider_area',
                'label' => __('Slider Area', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'select',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => __('Main Slider', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => '2',
                        'label' => __('Shortcodes (Layer Slider or any other slider with shortcodes)', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => '3',
                        'label' => __('Static Image', PTS_DOMAIN),
                        'src' => ''
                    )
                )
            ),
            array(
                'id' => 'pts_slider_shortcode',
                'label' => __('Slider Shortcode', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'textarea-simple',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(2)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_slider_count',
                'label' => __('Slider Count', PTS_DOMAIN),
                'desc' => 'Number of slides (only if Main Slider is selected)',
                'std' => '3',
                'type' => 'text',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(1)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_slider_speed',
                'label' => __('Slider Speed', PTS_DOMAIN),
                'desc' => 'How fast does the slider go? (only if Main Slider is selected)',
                'std' => '4000',
                'type' => 'text',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(1)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_static_home_image',
                'label' => __('Static Image for homepage', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'upload',
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(3)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_static_home_image_style',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Image Style', PTS_DOMAIN),
                'std' => '',
                'type' => 'select',
                'choices' => array(
                    array(
                        'value' => 'static-image-narrow container',
                        'label' => __('Centered and narow', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => 'static-image-full',
                        'label' => __('Full Width', PTS_DOMAIN),
                        'src' => ''
                    )
                ),
                'section' => 'header',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_slider_area:is(3)',
                'operator' => 'and'
            ),
            array(
                'label' => __('Enable Homepage Sections', PTS_DOMAIN),
                'id' => 'pts_enable_homepage_sections',
                'type' => 'on-off',
                'desc' => 'Activate/Deactivated.',
                'std' => 'off',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'section' => 'homepage'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_1',
                'label' => __('Homepage First Column Section', PTS_DOMAIN),
                'desc' => 'The first of the three sections on the homepage',
                'std' => '',
                'type' => 'textarea',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_1_icon',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Icon for the first section', PTS_DOMAIN),
                'std' => '',
                'type' => 'select',
                'choices' => select_fa(),
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_1_link',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Link for the first section\'s button',PTS_DOMAIN),
                'std' => '',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_1_color',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Accent Color for the first section',PTS_DOMAIN),
                'std' => '#e74c3c',
                'type' => 'colorpicker',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_1_btn',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Button Text for the first section',PTS_DOMAIN),
                'std' => 'Something Here',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_2',
                'label' => __('Homepage Second Column Section', PTS_DOMAIN),
                'desc' => 'The Second of the three sections on the homepage',
                'std' => '',
                'type' => 'textarea',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_2_icon',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Icon for the second section', PTS_DOMAIN),
                'std' => '',
                'type' => 'select',
                'choices' => select_fa(),
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_2_link',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Link for the second section\'s button',PTS_DOMAIN),
                'std' => '',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_2_color',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Accent Color for the second section',PTS_DOMAIN),
                'std' => '#57a2d5',
                'type' => 'colorpicker',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_2_btn',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Button Text for the second section',PTS_DOMAIN),
                'std' => 'Something Here',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_3',
                'label' => __('Homepage Thrid Column Section', PTS_DOMAIN),
                'desc' => 'The third of the three sections on the homepage',
                'std' => '',
                'type' => 'textarea',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_3_icon',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Icon for the third section', PTS_DOMAIN),
                'std' => '',
                'type' => 'select',
                'choices' => select_fa(),
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_3_link',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Link for the third section\'s button',PTS_DOMAIN),
                'std' => '',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_3_color',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Accent Color for the third section',PTS_DOMAIN),
                'std' => '#f1c40f',
                'type' => 'colorpicker',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_homepage_column_sections_sec_3_btn',
                'label' => __('', PTS_DOMAIN),
                'desc' => __('Button Text for the third section',PTS_DOMAIN),
                'std' => 'Something Here',
                'type' => 'text',
                'section' => 'homepage',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => 'pts_enable_homepage_sections:is(on)',
                'operator' => 'and'
            ),
            /*array(
                'id' => 'pts_footer_color_theme',
                'label' => __('Footer Color theme', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'select',
                'section' => 'footer',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => 'dark',
                        'label' => __('Dark', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => 'light',
                        'label' => __('Light', PTS_DOMAIN),
                        'src' => ''
                    )
                )
            ),*/
            array(
                'id' => 'pts_copyright_info',
                'label' => __('Copyright Info', PTS_DOMAIN),
                'desc' => '',
                'std' => 'Copyright Information Here. Use shortcode "cur_year" to display current year',
                'type' => 'textarea',
                'section' => 'footer',
                'rows' => '4',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            /*array(
                'id' => 'pts_footer_widget_on_off',
                'label' => __('Footer Widget On/Off', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'select',
                'section' => 'footer',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and',
                'choices' => array(
                    array(
                        'value' => '0',
                        'label' => __('No', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => '1',
                        'label' => __('Yes', PTS_DOMAIN),
                        'src' => ''
                    )
                )
            ),*/
            array(
                'label' => __('Disable / Enable Footer Widgets', PTS_DOMAIN),
                'id' => 'pts_footer_widget_on_off',
                'type' => 'on-off',
                'desc' => 'Activate/Deactivate.',
                'std' => 'off',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'class' => '',
                'section' => 'footer'
            ),
            array(
                'id' => 'pts_footer_widgets',
                'label' => __('Footer Widgets', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'numeric-slider',
                'section' => 'footer',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '2,4,1',
                'class' => '',
                'condition' => 'pts_footer_widget_on_off:is(on)',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_custom_css',
                'label' => __('Custom CSS', PTS_DOMAIN),
                'desc' => '',
                'std' => '',
                'type' => 'css',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_facebook',
                'label' => __('Facebook Link', PTS_DOMAIN),
                'desc' => 'Enter your facebook link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_twitter',
                'label' => __('Twitter Link', PTS_DOMAIN),
                'desc' => 'Enter your twitter link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_googleplus',
                'label' => __('Google Plus Link', PTS_DOMAIN),
                'desc' => 'Enter your google plus link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_linkedin',
                'label' => __('Linkedin Link', PTS_DOMAIN),
                'desc' => 'Enter your linkedin link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_flickr',
                'label' => __('Flickr Link', PTS_DOMAIN),
                'desc' => 'Enter your flickr link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_social_youtube',
                'label' => __('Youtube Link', PTS_DOMAIN),
                'desc' => 'Enter your youtube link in here',
                'std' => '',
                'type' => 'text',
                'section' => 'misc',
                'rows' => '',
                'post_type' => '',
                'taxonomy' => '',
                'min_max_step' => '',
                'class' => '',
                'condition' => '',
                'operator' => 'and'
            ),
            array(
                'id' => 'pts_shop_achive_count',
                'label' => __('Product count on shop page', PTS_DOMAIN),
                'desc' => '',
                'std'         => '',
                'type'        => 'text',
                'section'     => 'shop',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id' => 'pts_posts_meta_date_time',
                'label' => __('Show date in single post page', PTS_DOMAIN),
                'desc' => '',
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'posts',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id' => 'pts_posts_meta_author_name',
                'label' => __('Show author in single post page', PTS_DOMAIN),
                'desc' => '',
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'posts',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id' => 'pts_posts_meta_category',
                'label' => __('Show category in single post page', PTS_DOMAIN),
                'desc' => '',
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'posts',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
            ),
            array(
                'id' => 'pts_posts_meta_tags',
                'label' => __('Show tags in single post page', PTS_DOMAIN),
                'desc' => '',
                'std'         => 'on',
                'type'        => 'on-off',
                'section'     => 'posts',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and'
        ),
        array(
                'id' => 'pts_archive_list_type',
                'label' => __('Archive List type', PTS_DOMAIN),
                'desc' => '',
                'std'         => '1',
                'type'        => 'select',
                'section'     => 'categories',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => __('masonry', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => '2',
                        'label' => __('list', PTS_DOMAIN),
                        'src' => ''
                    )
                )
            ),
            array(
                'id' => 'pts_archive_page_width',
                'label' => __('Archive Page Width', PTS_DOMAIN),
                'desc' => '',
                'std'         => '1',
                'type'        => 'select',
                'section'     => 'categories',
                'rows'        => '',
                'post_type'   => '',
                'taxonomy'    => '',
                'min_max_step'=> '',
                'class'       => '',
                'condition'   => '',
                'operator'    => 'and',
                'choices' => array(
                    array(
                        'value' => '1',
                        'label' => __('Wide', PTS_DOMAIN),
                        'src' => ''
                    ),
                    array(
                        'value' => '2',
                        'label' => __('With Sidebar', PTS_DOMAIN),
                        'src' => ''
                    )
                )
            )
        )
    );

    /* allow settings to be filtered before saving */
    $custom_settings = apply_filters(ot_settings_id() . '_args', $custom_settings);

    /* settings are not the same update the DB */
    if ($saved_settings !== $custom_settings) {
        update_option(ot_settings_id(), $custom_settings);
    }

    /* Lets OptionTree know the UI Builder is being overridden */
    global $ot_has_custom_theme_options;
    $ot_has_custom_theme_options = true;

}
