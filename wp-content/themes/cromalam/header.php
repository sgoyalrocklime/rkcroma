<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <title>
        <?php echo bloginfo('title'); ?>
    </title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <link rel='stylesheet' id='open-sans-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300italic%2C400italic%2C600italic%2C300%2C400%2C600&amp;subset=latin%2Clatin-ext&amp;ver=4.7.2' type='text/css' media='all' />
    <link rel='shortcut icon' href='
		<?php echo get_stylesheet_directory_uri(); ?>/images/favicon/croma-fev.png' type='image/x-icon' />
    <?php wp_head(); ?>
</head>
<body>
<div id="overlay-loader-red" class="overlay-loader" style="background-color:
<?php echo get_theme_mod('loader1_color'); ?> !important;">
    <div class="overlay-loader-inner">
				<span class="loader-logo logo" style="background-image: url('
                <?php echo get_theme_mod('pre_loader_image'); ?>') !important;">
				</span>
    </div>
</div>
<div id="overlay-loader-grey" class="overlay-loader" style="background-color:
<?php echo get_theme_mod('loader2_color'); ?> !important;">
    <div class="overlay-loader-inner">
				<span class="loader-logo logo" style="background-image: url('
                <?php echo get_theme_mod('pre_loader_image'); ?>') !important;">
				</span>
    </div>
</div>
<div class="site-wrap site-wrap--visible" id="site-wrap">
    <div class="home page-template-default page page-id-4">
        <!--menu-->
        <div id="site-menu" class="site-menu">
            <a href="#" id="close-menu" class="site-menu__close no-smoothState"></a>
            <div class="site-menu__half screen-height">
                <div class="site-menu__half__inner">
                    <nav id="nav" role="nav" class="site-menu__nav">
                        <?php wp_nav_menu( array(
                            'theme_location' => 'header',
                            'menu_class'        => '',
                            'container'        => false,
                        ) ); ?>
                    </nav>
                    <div id="services-sub" class="services-sub-menu">
                        <p class="services-sub-menu__wrap">
                            <a class="services-sub-menu__title" href="#" target="_parent">Laminates</a>
                            <a class="services-sub-menu__link first" href="#">Solid</a>
                            <a class="services-sub-menu__link" href="#">Ultra High Gloss</a>
                            <a class="services-sub-menu__link" href="#">Patterns</a>
                            <a class="services-sub-menu__link" href="#">Texture</a>
                        </p>
                        <p class="services-sub-menu__wrap">
                            <a class="services-sub-menu__title" href="#" target="_parent">Doorskin</a>
                            <a class="services-sub-menu__link first" href="#">Texture Door</a>
                            <a class="services-sub-menu__link " href="#">Digital Door</a>
                            <a class="services-sub-menu__link" href="#">Cut Paste Door</a>
                        </p>
                        <p class="services-sub-menu__wrap">
                            <a class="services-sub-menu__title" href="#" target="_parent">Cromaply</a>
                            <a class="services-sub-menu__link first" href="#">General Purpose Plywood</a>
                            <a class="services-sub-menu__link" href="#">Block Board</a>
                            <a class="services-sub-menu__link last" href="#">Flexi Plywood</a>
                        </p>
                    </div>
                    <div class="site-menu__half__contact">
                        <p>T:
                            <?php echo get_theme_mod('contact_number'); ?>
                        </p>
                        <p>
                            <a href="#" target="_parent">E:
                                <?php echo get_theme_mod('contact_email'); ?>
                            </a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="site-menu__half site-menu__half--project screen-height" style="background-size: cover; background-image: url('
            <?php echo get_field('menu_image', get_the_ID()); ?>');">
                <!-- <a href="projects/amex/index.html" class="btn site-menu__half__project-link" target="_parent"><span></span>View Project</a> -->
            </div>
        </div>
        <!--Search field-->
        <div id="site-search" class="site-search">
            <a href="#" id="close-search" class="site-search__close no-smoothState"></a>
            <div class="container clearfix">
                <div class="site-search__container">
                    <h4 class="small-title">What are you looking for?</h4>
                    <form role="search" method="get" class="search-form" action="#">
                        <input type="search" class="search-field" placeholder="Enter your search here" value="" name="s">
                        <button class="search-submit btn">Find</button>
                    </form>
                    <div class="site-search__key-info">
                        <h4>Key Information</h4>
                        <ul>
                            <li>
                                <a href="#" target="_parent">Services</a>
                            </li>
                            <li>
                                <a href="#" target="_parent">Parkrose</a>
                            </li>
                            <li>
                                <a href="#" target="_parent">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="site-projects" class="site-projects">
            <div class="site-projects__mouse-area">
                <div class="site-projects__mouse-area__project">
                    <a href="
									<?php echo site_url(); ?>/highlights/" class="site-projects__mouse-area__view-all">View All
                    </a>
                </div>
                <?php
                $args = array(
                    'orderby'                  => 'term_id',
                    'order'                    => 'ASC',
                    'parent'                   => '9',
                    'hide_empty'               => 0,
                    'hierarchical'             => 1,
                    'number'                   => 3,
                    'include'                  => '',
                    'taxonomy'                 => 'category',
                );
                $categories = get_categories( $args );

                $count = 1;
                foreach($categories as $category){
                    $catId = $category->cat_ID;
                    $catImage = get_field('category_image', 'category_'.$catId);
                    $catUrl = get_field('categoru_url', 'category_'.$catId);

                    echo '
							<div class="site-projects__mouse-area__project site-projects__mouse-area__project--'.$count.'">
								<h3 class="site-projects__mouse-area__project__title">'.$category->name.'</h3>
								<a href="'.$catUrl.'" target="_parent">
									<img width="204" height="204" src="'.$catImage.'" class="attachment-project_circle size-project_circle wp-post-image" alt="" sizes="(max-width: 204px) 100vw, 204px" />
								</a>
							</div>';

                    $count++;
                }
                ?>
            </div>
        </div>
        <header id="header" class="site-header" role="banner">
            <div class="container clearfix">
                <?php cromalam_custom_logo(); ?>
            </div>
        </header>
        <div class="fixed-wrap">
            <div class="container clearfix">
                <div class="site-header__controls clearfix">
                    <a href="javascript:void(0);" id="toggle-search" class="site-header__controls__search no-smoothState"></a>
                    <a href="javascript:void(0);" id="toggle" class="site-header__controls__menu no-smoothState"></a>
                </div>
            </div>
        </div>