var $ = jQuery;

jQuery('.site-projects__mouse-area').on('click', function(){
    jQuery('#site-projects').removeClass('site-projects--visible');
});

 jQuery(".form-slider__input-wrap #contact-city").on("focus blur keypress keydown keyup change", function(){
 	"" !== jQuery(this).val() && jQuery(this).val().length > 0 ? jQuery(this).parents(".form-slider__input-wrap").addClass("text-entered") : jQuery(this).parents(".form-slider__input-wrap").removeClass("text-entered")
 });