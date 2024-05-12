<?php

class MyTheme {
    public function __construct() {
        add_action('after_setup_theme', [$this, 'theme_support']);
        add_action('init', [$this, 'register_menus']);
        add_action('wp_enqueue_scripts', [$this, 'register_styles']);
        add_action('wp_enqueue_scripts', [$this, 'register_scripts']);
        add_action('customize_register', [$this, 'customize_register']);
        add_action('wp_head', [$this, 'header_styles']);
        add_action('wp_head', [$this, 'footer_styles']);
        add_action('wp_head', [$this, 'sidebar_styles']);
        add_action('wp_head', [$this, 'search_styles']);
        add_action('widgets_init', [$this, 'register_widgets']);
        add_action('init', [$this, 'register_carousel_post_type']);
    }

    public function register_carousel_post_type() {
        $args = array(
            'labels' => array(
                'name' => 'Carousel Images',
                'singular_name' => 'Carousel Image',
            ),
            'public' => true,
            'has_archive' => false,
            'menu_icon' => 'dashicons-images-alt2',
            'supports' => array('title', 'thumbnail'),
            'exclude_from_search' => true,
            'publicly_queryable' => false,
            'rewrite' => false,
            'capability_type' => 'post',
        );

        register_post_type('carousel_images', $args);
    }

    public function theme_support() {
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');
    }

    public function register_menus() {
        $locations = [
            'primary' => 'Desktop Primary Left Sidebar',
            'footer' => 'Footer Menu Items'
        ];

        register_nav_menus($locations);
    }

    public function register_styles() {
        wp_enqueue_style('customtheme-style', get_template_directory_uri() . "/assets/css/styles.css", [], '1.0', 'all');
    }

    public function register_scripts() {
        wp_enqueue_script('customtheme-jquery', "https://code.jquery.com/jquery-3.7.1.slim.min.js", [], '3.7.1', true);
        wp_enqueue_script('customtheme-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", [], '3.4.1', true);
        wp_enqueue_script('customtheme-script', get_template_directory_uri() . "/assets/js/main.js", [], '1.0', true);
    }

    public function customize_register($wp_customize) {
        $wp_customize->add_section('theme_options', [
            'title' => __('Color Options', 'custom-theme'),
            'priority' => 200,
        ]);

        $wp_customize->add_setting('footer_color', [
            'default' => '#333333',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color', [
            'label' => __('Footer Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('footer_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', [
            'label' => __('Footer Text Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        // Add a setting for the link color
        $wp_customize->add_setting('footer_link_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        // Add a control for the link color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_link_color', [
            'label' => __('Footer Link Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('header_color', [
            'default' => '#e1d5e7',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        // Add a control for the header color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', [
            'label' => __('Header Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('header_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', [
            'label' => __('Header Text Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        // Add a setting for the link color
        $wp_customize->add_setting('header_title_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        // Add a control for the title color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_title_color', [
            'label' => __('Header Title Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('sidebar_color', [
            'default' => '#e1d5e7',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        // Add a control for the sidebar color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_color', [
            'label' => __('Sidebar Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('sidebar_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'sidebar_text_color', [
            'label' => __('Sidebar Text Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('search_color', [
            'default' => '#e1d5e7',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        // Add a control for the search color setting
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'search_color', [
            'label' => __('Search Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        $wp_customize->add_setting('search_text_color', [
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'search_text_color', [
            'label' => __('Search Text Color', 'custom-theme'),
            'section' => 'theme_options',
        ]));

        // Add setting for custom text
        $wp_customize->add_setting('custom_text', [
            'default' => __('Default Text', 'custom-theme'),
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        // Add control for custom text
        $wp_customize->add_control('custom_text_control', [
            'label' => __('Custom Text', 'custom-theme'),
            'section' => 'theme_options',
            'settings' => 'custom_text',
            'type' => 'text',
        ]);

        $wp_customize->add_setting('custom_link', [
            'default' => __('Default Link', 'custom-theme'),
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        // Add control for custom text
        $wp_customize->add_control('custom_link_control', [
            'label' => __('Custom Link', 'custom-theme'),
            'section' => 'theme_options',
            'settings' => 'custom_link',
            'type' => 'text',
        ]);
    }

    public function header_styles() {
        $header_color = get_theme_mod('header_color', '#000000');
        $header_text_color = get_theme_mod('header_text_color', '#000000');
        $header_title_color = get_theme_mod('header_title_color', '#000000');
        echo "<style>.gradient { background-color: " . esc_attr($header_color) . " !important; color: " . esc_attr($header_text_color) . "; }.page-title .heading { color: " . esc_attr($header_title_color) . "; }</style>";
    }

    public function footer_styles() {
        $footer_color = get_theme_mod('footer_color', '#333333');
        $footer_text_color = get_theme_mod('footer_text_color', '#ffffff');
        echo "<style>.footer { background-color: " . esc_attr($footer_color) . " !important; }.footer a { color: " . esc_attr($footer_text_color) . "; }</style>";
    }

    public function sidebar_styles() {
        $sidebar_color = get_theme_mod('sidebar_color', '#333333');
        $sidebar_text_color = get_theme_mod('sidebar_text_color', '#ffffff');
        echo "<style>.sidebar { background-color: " . esc_attr($sidebar_color) . " !important; }.sidebar .nav-item a { color: " . esc_attr($sidebar_text_color) . "; }</style>";
    }

    public function search_styles() {
        $search_color = get_theme_mod('search_color', '#333333');
        $search_text_color = get_theme_mod('search_text_color', '#ffffff');
        echo "<style>.search { background-color: " . esc_attr($search_color) . " !important; }.search-text { color: " . esc_attr($search_text_color) . "; }</style>";
    }

    public function register_widgets() {
        register_sidebar([
            'name'          => __('Footer Widgets Left', 'custom-theme'),
            'id'            => 'sidebar-widgets-left',
            'description'   => __('Widgets in this area will be shown in the sidebar.', 'custom-theme'),
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);

        register_sidebar([
            'name'          => __('Footer Widgets Right', 'custom-theme'),
            'id'            => 'sidebar-widgets-right',
            'description'   => __('Widgets in this area will be shown in the sidebar.', 'custom-theme'),
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);

        register_sidebar([
            'name'          => __('Footer Widgets Center', 'custom-theme'),
            'id'            => 'sidebar-widgets-center',
            'description'   => __('Widgets in this area will be shown in the sidebar.', 'custom-theme'),
            'before_widget' => '<div class="widget">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ]);
        // Register other widget areas as needed
    }
}

new MyTheme();
?>