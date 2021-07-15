jQuery(document).ready(function(){
jQuery('#carousel-example-generic').carousel({
  pause:"hover",
  keyboard: true
  })

jQuery('#carousel-example-generic a').each(function(){
	  jQuery(this).on('focus', function(){
	  	jQuery('#carousel-example-generic').carousel('pause')
	  })
});
jQuery('a,input').each(function(){
	  jQuery(this).on('focus', function(){
	  	  if(!jQuery(this).closest(".item").length ) {
	  	jQuery('#carousel-example-generic').carousel('cycle')
	     }
	  })
});

});
	