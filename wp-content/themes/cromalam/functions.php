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

    cromalam_post_type_for_home_page_slider();
    cromalam_post_type_for_events();
    cromalam_post_type_for_partners();
    cromalam_post_type_for_highlights();
    cromalam_post_type_for_ecatalouge();

    add_shortcode('cromalam-all-events', 'cromalam_get_all_events');
    add_shortcode('cromalam-highlight-posts', 'cromalam_get_all_highlight_posts');
    add_shortcode('cromalam-ecatalouge-posts', 'cromalam_get_all_ecatalouge_posts');

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
    wp_enqueue_style('lightslider', get_stylesheet_directory_uri() . '/css/lightslider.css');
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

// cromalam post type for home page slider
function cromalam_post_type_for_home_page_slider(){
    $args = array(
        'labels' => array('name'=> 'Home Slider'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'page-attributes')
    );
    register_post_type( 'home-page-slider' , $args );
}

// cromalam post type for home page slider
function cromalam_post_type_for_events(){
    $args = array(
        'labels' => array('name'=> 'Events'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'page-attributes')
    );
    register_post_type( 'events' , $args );
}

// cromalam post type for partners
function cromalam_post_type_for_partners(){
    $args = array(
        'labels' => array('name'=> 'Partners'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'page-attributes')
    );
    register_post_type( 'partners' , $args );
}

// cromalam post type for highlights
function cromalam_post_type_for_highlights(){
    $args = array(
        'labels' => array('name'=> 'Highlights'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'page-attributes')
    );
    register_post_type( 'highlights' , $args );
}

// cromalam post type for ecatalouge
function cromalam_post_type_for_ecatalouge(){
    $args = array(
        'labels' => array('name'=> 'Ecatalouge'),
        'public' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'excerpt', 'page-attributes')
    );
    register_post_type( 'ecatalouge' , $args );
}

// cromalam_get_all_events
function cromalam_get_all_events(){
    ob_start();

    $html = '';

    $args = array(
        "posts_per_page" => -1,
        "order"          => "ASC",
        "post_type"    => "events",
    );

    $events = new WP_Query($args);

    $events = $events->get_posts();

    if(count($events)):

        foreach ($events as $event){
            $eventTitle = $event->post_title;
            $eventDescription = $event->post_content;
            $eventID = $event->ID;
            $eventUrl= get_the_permalink($eventID);
            $eventImage = get_the_post_thumbnail_url($eventID);
            $eventDate = get_field('event_date', $eventID);

            $html .= '<div class="news-grid__items__item news-grid__items__item--double wow fadeInDownFixed" data-wow-delay="0.4s">
							  <div class="news-grid__items__item__inner">
								  <div class="post-item post-item--tall">
									  <div class="post-item__double">
										  <figure class="post-item__double__image">
											  <img width="983" height="790" src="'.$eventImage.'" class="attachment-grid_double size-grid_double wp-post-image" alt="" />
											  <div class="meta">
												  <a href="'.$eventUrl.'">'.$eventTitle.'</a>
												  <span>'.$eventDate.'</span>
											  </div>
											  <h2>'.$eventDescription.'</h2>
											  <a href="'.$eventUrl.'" class="full-link"></a>
										  </figure>
									  </div>
								  </div>
							  </div>
						  </div>';
        }

    endif;

    return $html;

    ob_clean();
}

// cromalam_get_all_highlight_posts
function cromalam_get_all_highlight_posts(){
    ob_start();

    $html = '';

    $args = array(
        "posts_per_page" => -1,
        "order"          => "ASC",
        "post_type"    => "highlights",
    );

    $highlights = new WP_Query($args);

    $highlights = $highlights->get_posts();

    $highlightPostsExist = count($highlights);

    if($highlightPostsExist):

        $count = 4;
        foreach ($highlights as $highlight){
            $highlightTitle = $highlight->post_title;
            $highlightDescription = '';
            $highlightID = $highlight->ID;
            $highlightUrl= get_the_permalink($highlightID);
            $highlightShape = get_field('shape_and_position', $highlightID);
            $getImages = get_field('highlight_gallery', $highlightID);
            $highlightSectionId = strtolower($highlightTitle);

            $blockClass = ($highlightShape == 3) ? 'circle projects-grid__items__item--left' : ($highlightShape == 2 ? 'rectangle projects-grid__items__item--right' : 'rectangle projects-grid__items__item--left');
            $blockShape = ($highlightShape == 3) ? 'circle' : 'rectangle';

                $html .= '<div id="'.$highlightSectionId.'" class="projects-grid__items__item clearfix '.$blockClass.' wow fadeInDownFixed" data-wow-delay="0.'.$count.'s">
                              <div class="projects-grid__items__item__wrap projects-grid__items__item__wrap--'.$blockShape.' anim-container" data-base="10" data-multiplier="-2">
                                  <div class="projects-grid__items__item__wrap__overlay">
                                      <div class="table-center">
                                          <div class="table-center__cell">
                                              <div class="link-wrap">
                                                  <a href="'.$highlightUrl.'">View</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <h2 class="projects-grid__items__item__title anim-container" data-base="20" data-multiplier="4.5">'.$highlightTitle.'

                                      <div class="projects-grid__items__item__title__excerpt">
                                          <p class="intro">'.$highlightDescription.'
                                      </div>
                                  </h2>
                                  <div class="projects-grid__items__item__carousel slick">';
                ?>
                <?php
                foreach($getImages as $image){
                    $html .= '<div class="projects-grid__items__item__carousel__slide slick-slide">
                                          <img src="'.$image['highlight_images'].'" class="attachment-gallery_rectangle size-gallery_rectangle" alt="" />
                                      </div>';
                }
                ?>
                <?php
                                  $html .= '</div>
                              </div>
                          </div>';

            $count++;

            if(is_front_page() && $count >= 7){
                break;
            }
        }

    endif;

    return $html;

    ob_clean();
}

// cromalam_get_all_ecatalouge_posts
function cromalam_get_all_ecatalouge_posts(){
    ob_start();

    $html = '';

    $args = array(
        "posts_per_page" => -1,
        "order"          => "ASC",
        "post_type"    => "ecatalouge",
    );

    $ecatalouges = new WP_Query($args);

    $ecatalouges = $ecatalouges->get_posts();

    if(count($ecatalouges)):

        $count = 5;
        foreach ($ecatalouges as $ecatalouge){
            $ecatalougeTitle = $ecatalouge->post_title;
            $ecatalougeID = $ecatalouge->ID;
            $ecatalougeImage = get_the_post_thumbnail_url($ecatalougeID);
            $ecatalougeUrl = get_field('ecatalouge_url', $ecatalougeID);
            $position = ($count % 2 == 0) ? 'right' : 'left';

            $html .= '<div class="projects-grid__items__item clearfix rectangle projects-grid__items__item--'.$position.' wow fadeInDownFixed" data-wow-delay="0.'.$count.'s">
                              <div class="projects-grid__items__item__wrap projects-grid__items__item__wrap--rectangle anim-container" data-base="10" data-multiplier="-2">
                                  <a href="battersea-dogs-cats-home/index.html" class="full-link"></a>
                                  <div class="projects-grid__items__item__wrap__overlay">
                                      <div class="table-center">
                                          <div class="table-center__cell">
                                              <div class="link-wrap">
                                                  <a href="'.$ecatalougeUrl.'">View</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <h2 class="projects-grid__items__item__title anim-container" data-base="20" data-multiplier="4.5">'.$ecatalougeTitle.'</h2>
                                  <div class="projects-grid__items__item__carousel slick">
                                      <div class="projects-grid__items__item__carousel__slide slick-slide">
                                          <img width="300" style="margin: 0px auto;" src="'.$ecatalougeImage.'" class="attachment-gallery_circle size-gallery_circle" />
                                      </div>
                                  </div>
                              </div>
                          </div>';
            $count++;
        }

    endif;

    return $html;

    ob_clean();
}

function pr($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    die;
}