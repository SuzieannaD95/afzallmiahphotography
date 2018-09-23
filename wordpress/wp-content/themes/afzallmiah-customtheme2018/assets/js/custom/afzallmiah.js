;(function(){
	"use strict"
	function AfzallMiah()
	{
		var fn = {

			init: function()
			{
				fn.setFullCarouselOverlayDivHeight();
				fn.setFullHeightHeroImageHeight();
				fn.setHalfHeightHeroImageHeight();
				fn.setPhotographyProjectsBlockImageCaptionWidths();
			},

			setFullCarouselOverlayDivHeight: function()
			{
				var height = jQuery('.full-screen-image-carousel .slides').height();
				jQuery('.full-screen-image-carousel-overlay-div').css("height", height)
			},

			setFullHeightHeroImageHeight: function()
			{
				var height = jQuery( window ).height();
				jQuery('.full-height-hero-image').css("height", height)
			},

			setHalfHeightHeroImageHeight: function()
			{
				var full_height = jQuery( window ).height();
				var height = (full_height / 100) * 45;
				jQuery('.half-height-hero-image').css("height", height)
			},

			setPhotographyProjectsBlockImageCaptionWidths: function()
			{
				var image_containers = jQuery('.js--image-container-caption-overlay');
				image_containers.each(function(i, elem) {
					var selected_img_width = jQuery(elem).width();
					var selected_caption = jQuery(elem).find('.image-caption');
					jQuery(selected_caption).css("width", (selected_img_width - 30));
				});
			},

		}

		jQuery(document).ready(fn.init);

	}

	new AfzallMiah();
})();