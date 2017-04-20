<?php

/*
Template Name: Gallery Template
Template Post Type: events
*/


get_header();

$getImages = get_field('gallery_images', get_the_ID());
?>

    <main id="main" class="main" role="main">
        <section class="gallery">
            <div class="large-image-slider wow fadeInDownFixed" data-wow-delay="0.3s">
                <div class="large-image-slider__line large-image-slider__line--top"></div>
                <div class="large-image-slider__line large-image-slider__line--bottom"></div>
                <div class="large-image-slider__wrap">
                    <div class="large-image-slider__carousel slick">
                        <?php
                            foreach($getImages as $image){
                                echo '<div class="large-image-slider__carousel__slide slick-slide">
                            <div class="large-image-slider__carousel__slide__inner">
                                <img src="'.$image['image'].'" class="attachment-large_gallery size-large_gallery" alt="" sizes="(max-width: 800px) 100vw, 800px" />
                            </div>
                        </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

<?php

get_footer();
