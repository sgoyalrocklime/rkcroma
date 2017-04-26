var $ = jQuery;

jQuery('.site-projects__mouse-area').on('click', function(){
    jQuery('#site-projects').removeClass('site-projects--visible');
});

$( document ).ready(function() {
    jQuery('#about-section_number').find( "ul li:last-child " ).css('display', 'none');
});