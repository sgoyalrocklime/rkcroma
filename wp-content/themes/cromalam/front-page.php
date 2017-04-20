<?php
get_header();
?>

    <main id="main" class="main" role="main">
        <section class="page-layouts">

            <?php if(get_theme_mod('section1_visibility')){ ?>
                <div class="layout layout--hero-slider hero-slider">
                    <div class="hero-slider__projects-popup-controls">
                        <span class="title">Highlights</span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </div>
                    <div class="slick hero-slider__carousel">
                        <?php
                        $args = array(
                            "posts_per_page" => -1,
                            "order"          => "ASC",
                            "post_type"    => "home-page-slider",
                        );

                        $slides = new WP_Query($args);

                        $slides = $slides->get_posts();

                        if(count($slides)):

                            foreach ($slides as $slide){
                                $slideDescription = $slide->post_content;
                                $slideID = $slide->ID;
                                $slideExcerpt= $slide->post_excerpt;
                                $slideImage = get_the_post_thumbnail_url($slideID);

                                echo '<div class="hero-slider__slide slick-slide"><div class="hero-slider__slide__bg" style="background-image: url('.$slideImage.');"></div>
                            <a href="#" class="hero-slider__arrow"></a>
                            <div class="container clearfix">
                                <article class="hero-slider__slide__content hentry clearfix">
                                    '.$slideDescription.$slideExcerpt.'
                                </article>
                            </div>
                        </div>';
                            }
                        endif;
                        ?>
                    </div>
                </div>
            <?php } ?>

            <div class="controls-switch"></div>

            <div style="background-color: <?php echo get_theme_mod('section2_color'); ?> !important;" class="layout layout--content-animating-box content-animating-box clearfix wow fadeInDownFixed" data-wow-delay="0.3s">
                <?php if(get_theme_mod('section2_visibility')){ ?>
                    <div class="content-animating-box__row row-1 clearfix">

                        <div class="content-animating-box__split--smaller content-animating-box__split--image mh-r above-line" style="background-image: url('<?php echo get_theme_mod('about_us_image'); ?>');"></div>

                        <div class="content-animating-box__split mh-r content-animating-line-wrap wow" data-wow-offset="500">
                            <div class="content-animating-line"></div>
                            <article class="content-animating-box__content hentry clearfix above-line wow fadeInDownFixed" data-wow-offset="200">
                                <h4 class="small-title"><?php echo get_theme_mod('about_us_heading'); ?></h4>
                                <h2><?php echo get_theme_mod('about_us_title'); ?></h2>
                                <p><?php echo get_theme_mod('about_us_content'); ?></p>
                                <p><a href="<?php bloginfo('url'); ?>/about" target="_blank" class="btn block dark">More About Us</a></p>
                            </article>
                        </div>
                    </div>
                <?php }
                if(get_theme_mod('part3_visibility')){ ?>
                    <div class="content-animating-box__row row-2 clearfix">
                        <div class="content-animating-box__split--smaller">
                            <div class="content-animating-box__box">
                                <div class="absolute-lines wow" data-wow-offset="200">
                                    <div class="absolute-lines__l-t"></div>
                                    <div class="absolute-lines__l-b"></div>
                                    <div class="absolute-lines__l-l"></div>
                                    <div class="absolute-lines__l-r"></div>
                                </div>
                                <div class="content-animating-box__box__inner above-absolute-lines">
                                    <div class="animating-box-slick slick">
                                        <?php echo get_theme_mod('choose_us_content'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="content-animating-box__split content-animating-box__split--image content-animating-box__split--image-2" style="background-image: url('<?php echo get_theme_mod('choose_us_image'); ?>');"></div>
                    </div>
                <?php } ?>
            </div>

            <?php if(get_theme_mod('part4_visibility')){ ?>
                <div class="layout layout--services-grid services-grid clearfix" style="background-color: <?php echo get_theme_mod('part4_color'); ?> !important;">
                    <div class="container clearfix">
                        <article class="services-grid__intro wow fadeInDownFixed" data-wow-delay="0.3s">
                            <h4 class="small-title">Our Products</h4>
                            <h2>Life <br />Inspired Styles</h2>
                        </article>

                        <div class="services-grid__blocks clearfix">
                            <?php
                            $args = array(
                                'orderby'                  => 'term_id',
                                'order'                    => 'ASC',
                                'hide_empty'               => 0,
                                'parent'                   => 12,
                                'hierarchical'             => 1,
                                'number'                   => 3,
                                'taxonomy'                 => 'category',
                            );
                            $categories = get_categories( $args );

                            foreach($categories as $category){
                                $catId = $category->cat_ID;
                                $catImage = get_field('category_image', 'category_'.$catId);
                                $catUrl = get_field('categoru_url', 'category_'.$catId);
                                $catName = $category->name;

                                echo '<div class="services-grid__blocks__block wow fadeInDownFixed" data-wow-delay="0.7s" style="background-image: url('.$catImage.');">
                                <div class="services-grid__blocks__block__overlay"></div>
                                <a href="'.$catUrl.'" class="full-link"></a>
                                <div class="table-center">
                                    <div class="table-center__cell">
                                        <div class="services-grid__blocks__block__content">
                                            <h2><a href="'.$catUrl.'">'.$catName.'</a></h2>
                                        </div>
                                    </div>
                                </div><div class="services-grid__blocks__block__links">';

                                $args1 = array(
                                    'orderby'                  => 'term_id',
                                    'order'                    => 'ASC',
                                    'hide_empty'               => 0,
                                    'parent'                   => $catId,
                                    'hierarchical'             => 1,
                                    'taxonomy'                 => 'category',
                                );
                                $subCategories = get_categories( $args1 );

                                foreach ($subCategories as $subCategory){
                                    $subCategoryUrl = get_field('categoru_url', 'category_'.$subCategory->cat_ID);
                                    echo '<a href="'.$subCategoryUrl.'" class="services-grid__blocks__block__links__btn">'.$subCategory->name.'</a>';
                                }

                                echo '</div></div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php if(get_theme_mod('part5_visibility')){ ?>
                <div class="layout--projects-grid projects-grid" style="background-color: <?php echo get_theme_mod('part5_color'); ?> !important;">
                    <div class="projects-grid__filter clearfix wow fadeInDownFixed" data-wow-delay="0.3s">
                        <div class="container clearfix">
                            <h1 class="projects-grid__title">Highlights</h1>
                        </div>
                        <a href="<?php echo site_url(); ?>/highlights" class="projects-grid__filter__view-all">View All Highlights <span><span></span></span></a>
                    </div>
                    <div class="container clearfix">
                        <div class="projects-grid__items" id="ajnp-container">
                            <?php echo do_shortcode('[cromalam-highlight-posts]'); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <style type="text/css">
                .news-grid.layout--news-grid {
                    background: #fff none repeat scroll 0 0;
                    padding-bottom: 40px;
                    position: relative;
                }
                .news-grid {
                    background: #292a2e none repeat scroll 0 0;
                    padding: 80px 0 150px;
                }
            </style>

            <!--icons iamge-->
                <?php if(get_theme_mod('part6_visibility')){ ?>
                <div class="layout--news-grid news-grid">
                    <div class="news-grid__filter clearfix wow fadeInDownFixed" data-wow-delay="0.2s">
                        <div class="demo">
                            <div class="item">
                                <ul id="content-slider" class="content-slider">
                                    <?php
                                    $args = array(
                                        "posts_per_page" => -1,
                                        "order"          => "ASC",
                                        "post_type"    => "partners",
                                    );

                                    $partners = new WP_Query($args);

                                    $partners = $partners->get_posts();

                                    if(count($partners)):
                                        foreach ($partners as $partner){
                                            $partnerID = $partner->ID;
                                            $partnerImage = get_the_post_thumbnail_url($partnerID, 'large');

                                            echo '<li><img src="'.$partnerImage.'"></li>';
                                        }
                                    endif;
                                    ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

                    <style>     ul{
                            list-style: none outside none;
                            padding-left: 0;
                            margin: 0;
                        }
/*                        .demo .item{
                            margin-bottom: 60px;
                        }*/
                        .content-slider li{
                            /*background-color: #ed3020;*/
                            text-align: center;
                            color: #FFF;
                        }
                        .content-slider h3 {
                            margin: 0;
                            padding: 70px 0;
                        }
                        .lSPager.lSpg {
                            display: none;
                        }
                        .item {
                            margin: 0 auto;
                            width: 90%;
                        }
                        .demo{
                            width: 100%;
                        }</style>
                <?php } ?>
    <script>
            jQuery.noConflict();
            jQuery(document).ready(function() {
            jQuery("#content-slider").lightSlider({
                loop:true,
                keyPress:true
            });
        });</script>
        </section>
    </main>

<?php
get_footer();