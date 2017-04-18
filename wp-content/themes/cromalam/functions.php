<?php

add_action('init', 'cromalam_init');

function cromalam_init()
{
    add_action('wp_enqueue_scripts', 'cromalam_enqueue_styles');

    cromalam_register_menu();

    add_action('customize_register', 'cromalam_add_pre_loader_settings');
    add_action('customize_register', 'cromalam_add_home_page_settings');
    add_action('customize_register', 'cromalam_add_contact_detail');
    add_action('customize_register', 'cromalam_add_footer_settings');
    add_action('customize_register', 'cromalam_add_about_us_settings');
    add_action('customize_register', 'cromalam_add_choose_us_settings');

    add_theme_support('custom-logo');
    add_post_type_support('page', 'excerpt');
    add_theme_support( 'post-thumbnails' );
}

// Add css
function cromalam_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('main-min', get_stylesheet_directory_uri() . '/css/main.min8a54.css');
    wp_enqueue_style('style-min', get_stylesheet_directory_uri() . '/css/styles.min8a54.css');
}

// Register menus
function cromalam_register_menu()
{
    register_nav_menus(array(
        'header' => __('Header Menu', 'cromalam'),
        'footer' => __('Footer Menu', 'cromalam'),
    ));
}

// Add pre loader functionality
function cromalam_add_pre_loader_settings($wp_customize)
{
    $wp_customize->add_section('pre_loader', array('title' => __('Pre loader', 'text-domain')));

    $wp_customize->add_setting("loader1_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'loader1_color',
            array(
                'label'      => __( 'Loader color', 'cromalam' ),
                'section'    => 'pre_loader',
            ) )
    );

    $wp_customize->add_setting("loader2_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'loader2_color',
            array(
                'label'      => __( 'Inner loader color', 'cromalam' ),
                'section'    => 'pre_loader',
            ) )
    );

    $wp_customize->add_setting("pre_loader_image");
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pre_loader_image', array(
        'label'    => __( 'Pre loader image', 'Upload Logo' ),
        'section'  => 'pre_loader',
        'settings' => 'pre_loader_image',
    ) ) );
}

// Add home page functionality
function cromalam_add_home_page_settings($wp_customize)
{
    $wp_customize->add_section('home_page', array('title' => __('Home page', 'text-domain')));

    // section 1
    $wp_customize->add_setting("section1_visibility");
    $wp_customize->add_control("section1_visibility", array(
        'label'    => __("Section 1", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    // section 2
    $wp_customize->add_setting("section2_visibility");
    $wp_customize->add_control("section2_visibility", array(
        'label'    => __("Section 2", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    // section 3
    $wp_customize->add_setting("part3_visibility");
    $wp_customize->add_control("part3_visibility", array(
        'label'    => __("Section 3", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting("section2_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'section2_color',
            array(
                'label'      => __( 'Background color for 2&3 section', 'cromalam' ),
                'section'    => 'home_page',
            ) )
    );

    // section 4
    $wp_customize->add_setting("part4_visibility");
    $wp_customize->add_control("part4_visibility", array(
        'label'    => __("Section 4", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting("part4_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'part4_color',
            array(
                'label'      => __( 'Background color', 'cromalam' ),
                'section'    => 'home_page',
            ) )
    );

    // section 5
    $wp_customize->add_setting("part5_visibility");
    $wp_customize->add_control("part5_visibility", array(
        'label'    => __("Section 5", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    $wp_customize->add_setting("part5_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'part5_color',
            array(
                'label'      => __( 'Background color', 'cromalam' ),
                'section'    => 'home_page',
            ) )
    );

    // section 6
    $wp_customize->add_setting("part6_visibility");
    $wp_customize->add_control("part6_visibility", array(
        'label'    => __("Section 6", 'text-domain'),
        'section'  => 'home_page',
        'type'     => 'checkbox',
    ));

    /*$wp_customize->add_setting("part6_color");
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'part6_color',
            array(
                'label'      => __( 'Background color', 'cromalam' ),
                'section'    => 'home_page',
            ) )
    );*/
}

// Add contact detail
function cromalam_add_contact_detail($wp_customize){

    $wp_customize->add_section('contact_details', array('title' => __('Contact details', 'text-domain')));

    // Address
    $wp_customize->add_setting("contact_address");
    $wp_customize->add_control("contact_address", array(
        'label'    => __("Address", 'text-domain'),
        'section'  => 'contact_details',
        'type'     => 'textarea',
    ));

    // Phone
    $wp_customize->add_setting("contact_number");
    $wp_customize->add_control("contact_number", array(
        'label'    => __("Phone", 'text-domain'),
        'section'  => 'contact_details',
        'type'     => 'text',
    ));

    // Email
    $wp_customize->add_setting("contact_email");
    $wp_customize->add_control("contact_email", array(
        'label'    => __("Email", 'text-domain'),
        'section'  => 'contact_details',
        'type'     => 'email',
    ));
}

// Add footer settings
function cromalam_add_footer_settings($wp_customize){

    $wp_customize->add_section('footer_section', array('title' => __('Footer', 'text-domain')));

    // footer text
    $wp_customize->add_setting("footer_text");
    $wp_customize->add_control("footer_text", array(
        'label'    => __("Footer text", 'text-domain'),
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ));

    // footer logo
    $wp_customize->add_setting("footer_logo");
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo', array(
        'label'    => __( 'Footer logo', 'Upload Logo' ),
        'section'  => 'footer_section',
        'settings' => 'footer_logo',
    ) ) );
}

// Add about us settings
function cromalam_add_about_us_settings($wp_customize){

    $wp_customize->add_section('about_us', array('title' => __('About us section', 'text-domain')));

    $wp_customize->add_setting("about_us_heading");
    $wp_customize->add_control("about_us_heading", array(
        'label'    => __("Heading", 'text-domain'),
        'section'  => 'about_us',
        'type'     => 'text',
    ));

    $wp_customize->add_setting("about_us_title");
    $wp_customize->add_control("about_us_title", array(
        'label'    => __("Title", 'text-domain'),
        'section'  => 'about_us',
        'type'     => 'text',
    ));

    $wp_customize->add_setting("about_us_content");
    $wp_customize->add_control("about_us_content", array(
        'label'    => __("Content", 'text-domain'),
        'section'  => 'about_us',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting("about_us_image");
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'about_us_image', array(
        'label'    => __( 'Image', 'Upload Image' ),
        'section'  => 'about_us',
        'settings' => 'about_us_image',
    ) ) );
}

// Add choose us settings
function cromalam_add_choose_us_settings($wp_customize){

    $wp_customize->add_section('choose_us', array('title' => __('Why choose us section', 'text-domain')));

    $wp_customize->add_setting("choose_us_content");
    $wp_customize->add_control("choose_us_content", array(
        'label'    => __("Content", 'text-domain'),
        'section'  => 'choose_us',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting("choose_us_image");
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'choose_us_image', array(
        'label'    => __( 'Image', 'Upload Image' ),
        'section'  => 'choose_us',
        'settings' => 'choose_us_image',
    ) ) );
}

// Get theme logo
function cromalam_custom_logo()
{
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) {
        ?>
        <a href="<?php echo get_site_url(); ?>" style="background-image: url('<?php echo wp_get_attachment_url($custom_logo_id); ?>');" class="site-header__logo site-header__logo--front" target="_parent"><span class="text-replace">Croma Decorative Laminates</span></a>
        <?php
    }
}

function pr($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    die;
}