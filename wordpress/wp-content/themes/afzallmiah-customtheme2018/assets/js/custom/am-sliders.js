;(function(jQuery){
	"use strict"
	function AMSliders()
	{
		var fn = {

			init: function()
			{
				fn.startCarousels();
			},

			startCarousels: function()
			{
				jQuery(window).load(function()
				{
					jQuery('.Slow').flexslider({
						slideshowSpeed: 6000,
					});
					jQuery('.Medium').flexslider({
						slideshowSpeed: 3000,
					});
					jQuery('.Fast').flexslider({
						slideshowSpeed: 1000,
					});
					jQuery('.Slide').flexslider({
						animation: "slide",
						direction: "horizontal",
						controlNav: true,
					});
					jQuery('.Fade').flexslider({
						animation: "fade",
						direction: "horizontal",
						controlNav: true,
					});
					jQuery('.quote-banner').flexslider({
						animation: "fade",
						animationLoop: true,
						controlNav: false,
						directionNav: false,
						smoothHeight: false,
						slideshow: true,
						slideshowSpeed: 5000,
					});
					jQuery('.photography-styles-slider').flexslider({
						animation: "slide",
						animationLoop: true,
						itemWidth: 210,
						controlNav: false,
						itemMargin: 0,
						slideshow: false,
						move: 1,
					});
		    	});
			},
		}

		jQuery(document).ready(fn.init);

	}

	new AMSliders();
})(jQuery);