/*
 * jQuery FlexSlider v2.2.0
 * Copyright 2012 WooThemes
 * Created by ----Shahid
 */
 
jQuery(window).load(function(){
		  jQuery('.flexslider').flexslider({	
			animation: "slide",
			animationSpeed: 1500,
			direction: "horizontal",
			directionNav: true,
			easing: "swing",  
			
			keyboard:true,
			controlNav: true,			
			slideshowSpeed: 3000,
			pauseOnHover: true, 
			slideshow: true,
			start: function(slider){
			  jQuery('body').removeClass('loading');
			}			
		  });
		  
		  jQuery('.flexslider a').each(function(){
	  jQuery(this).on('focus', function(){
	  	jQuery('.flexslider').flexslider('pause')
	  })
});
jQuery('a,input').each(function(){
	  jQuery(this).on('focus', function(){
	  	  if(!jQuery(this).closest(".flexslider").length ) {
	  	jQuery('.flexslider').flexslider('play')
	  	}
	  })
});
		  
		});