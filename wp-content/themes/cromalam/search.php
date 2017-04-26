<?php
get_header(); ?>

    <main id="main" class="main controls-switch" role="main">
        <section class="news-grid">
            <div class="container clearfix">
                <h1 class="news-grid__title">Result</h1>
                <div class="news-grid__filter clearfix">
                    <a href="#" class="news-grid__filter__control"></a>
                </div>
                <div class="news-grid__filter clearfix"></div>
                <div class="news-grid__items" id="ajnp-container" data-packery-mode="true">
                    <?php
                    if ( have_posts() ) :

                        while ( have_posts() ) : the_post();

                            $postID = get_the_ID();
                            $postUrl= get_the_permalink($postID);
                            $postImage = get_the_post_thumbnail_url($postID);

                        echo '<div class="news-grid__items__item news-grid__items__item--double wow fadeInDownFixed" data-wow-delay="1.2s">
							  <div class="news-grid__items__item__inner">
								  <div class="post-item post-item--tall">
									  <div class="post-item__double">
										  <figure class="post-item__double__image">
											  <img width="983" height="790" src="'.$postImage.'" class="attachment-grid_double size-grid_double wp-post-image" alt="" />
											  <div class="meta">
												  <a href="javascript:void(0);">'.get_the_title().'</a>
											  </div>
											  <h2>'.get_the_content().'</h2>
											  <a href="javascript:void(0);" class="full-link"></a>
										  </figure>
									  </div>
								  </div>
							  </div>
						  </div>';

                        endwhile;

                    else : ?>
                        <div class="news-grid__items__item news-grid__items__item--double wow fadeInDownFixed" data-wow-delay="0.4s">
                            <div class="news-grid__items__item__inner">
                                <div class="post-item post-item--tall">
                                    <div class="post-item__double">
                                        <figure class="post-item__double__image">
                                            <img width="983" height="790" src="https://murrowstratcomm.files.wordpress.com/2014/01/blank-gray5.jpg" class="attachment-grid_double size-grid_double wp-post-image" alt="" />
                                            <div class="meta"></div>
                                            <h2>Sorry, but nothing matched your search terms. Please try again with some different keywords.</h2>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                    ?>
                </div>
            </div>
        </section>
    </main>

<?php get_footer();