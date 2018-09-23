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
				fn.setBlankPhotographyStyleHeight();
				fn.setPhotographyStyleHeight();
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
				var fullHeight = jQuery( window ).height();
				var height = (fullHeight / 100) * 45;
				jQuery('.half-height-hero-image').css("height", height)
			},

			setPhotographyProjectsBlockImageCaptionWidths: function()
			{
				var imageContainers = jQuery('.js--image-container-caption-overlay');
				imageContainers.each(function(i, elem) {
					var selectedImgWidth = jQuery(elem).width();
					var selectedCaption = jQuery(elem).find('.image-caption');
					jQuery(selectedCaption).css("width", (selectedImgWidth - 29));
				});
			},

			setBlankPhotographyStyleHeight: function()
			{
				var photographyStyleImage = jQuery('.photography-styles-slider .slides li img').height();
				jQuery('.js--blank-photography-style').css("height", photographyStyleImage);
			},

			setPhotographyStyleHeight: function()
			{
				var largestHeight = 0;
				var photographyStyles = jQuery('.photography-styles-slide');
				jQuery(photographyStyles).each(function(i, elem) {
					if (jQuery(elem).height() > largestHeight)
					{
						largestHeight = jQuery(elem).height();
					}
				});

				jQuery('.photography-styles-slide').css("height", (largestHeight + 30));
			},

		}

		jQuery(document).ready(fn.init);

	}

	new AfzallMiah();
})();