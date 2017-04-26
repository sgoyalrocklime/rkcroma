<footer id="footer" class="site-footer" role="contentinfo">
    <div class="container clearfix">
        <a href="<?php echo bloginfo('url'); ?>" class="site-footer__logo wow fadeInDownFixed" style="background-image: url('<?php echo get_theme_mod('footer_logo'); ?>')" data-wow-delay="0.1s">
            <span class="text-replace">Croma Decorative Laminates</span>
        </a>

        <div class="site-footer__columns">
            <div class="site-footer__columns__column wow fadeInDownFixed footer-width" data-wow-delay="0.3s">
                <div class="site-footer__columns__column__inner text">
                    <?php echo get_theme_mod('contact_address'); ?>
                </div>
            </div>
            <div class="site-footer__columns__column wow fadeInDownFixed footer-about" data-wow-delay="0.6s">
                <div class="site-footer__columns__column__inner">
                    <?php wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'menu_class'        => '',
                        'container'        => false,
                    ) ); ?>
                </div>
            </div>
        </div>

        <address class="site-footer__address wow fadeInDownFixed" data-wow-delay="0.3s">
            <p><?php echo get_theme_mod('footer_text'); ?></p>
        </address>
    </div>
</footer>

</div>
</div>


<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/ajax-jquery.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/lightslider.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/scripts.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/main.min.js'></script>
<script type='text/javascript' src='<?php echo get_stylesheet_directory_uri(); ?>/js/common.js'></script>

<script>jQuery(document).ready(function() {window.afterPreloader();});</script>

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-97853004-3', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>