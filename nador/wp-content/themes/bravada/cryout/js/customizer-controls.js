/**
 * JS for Custom Customizer Controls
 *
 * @package Cryout Framework
 */

jQuery(document).ready(function(){

	setTimeout(function() {
	// wait for page load

		// Slider Control
		jQuery('input[type="number"].slider').each(function() {
			settings = [
				jQuery(this).attr('name'),
				jQuery(this).val(),
				jQuery(this).attr('min'),
				jQuery(this).attr('max'),
				jQuery(this).attr('step')
			]
			jQuery(this).hide();
			var the_input = this;

			jQuery(this).next('div.slider').slider({
				value: parseInt( settings[1] ),
				min: parseInt( settings[2] ),
				max: parseInt( settings[3] ),
				step: parseInt( settings[4] ),
				slide: function( event, ui){
					jQuery(the_input).val( ui.value ).trigger('change');
					jQuery(this).parent().find('.value').text( ui.value );
				}
			});

		}); // each

		// NumberSlider Control
		jQuery('input[type="number"].numberslider').each(function() {
			settings = [
				jQuery(this).attr('name'),
				parseFloat( jQuery(this).val() ),
				parseFloat( jQuery(this).attr('min') ),
				parseFloat( jQuery(this).attr('max') ),
				parseFloat( jQuery(this).attr('step') )
			]
			var the_input = this;

			jQuery(this).closest('.customize-control').find('div.slider').slider({
				value: settings[1],
				min: settings[2],
				max: settings[3],
				step: settings[4],
				slide: function( event, ui){
					jQuery(the_input).val( ui.value ).trigger('change');
				}
			});

			// update slider on input change
			jQuery(this).on('change', function(){
				jQuery(this).closest('.customize-control').find('div.slider').slider( 'option', 'value', jQuery(this).val() );
			} );

		}); // each

		// SliderTwo Control
		jQuery('input[type="number"].slidertwo').each(function() {
			settings = [
				jQuery(this).attr('name'),
				jQuery(this).val(),
				jQuery(this).attr('min'),
				jQuery(this).attr('max'),
				jQuery(this).attr('step'),
				jQuery(this).attr('size')
			]
			jQuery(this).hide();
			var the_input = this;

			jQuery(this).next('div.slidertwo').slider({
				value: parseInt( settings[1] ),
				min: parseInt( settings[2] ),
				max: parseInt( settings[3] ),
				step: parseInt( settings[4] ),
				slide: function( event, ui){
					jQuery(the_input).val( ui.value ).trigger('change');
					jQuery(this).parent().find('.value').text( ui.value );
					jQuery(this).parent().find('.value2').text( settings[5] - parseInt(ui.value) );
				}
			});

		}); // each

		// Sortable control
		jQuery('.customize-control-sortable .sortable-row').sortable({
			update: function( event, ui ) {
				var order = new Array();
				jQuery(this).children('li').each(function() {
					order.push(jQuery(this).attr("id"));
				});
				jQuery(this).parent().children('.the_sorted').val(order.join()).trigger('change');
			}
		}); // sortable

		// RadioImage Control
		jQuery( '.customize-control-radio-image .buttonset' ).buttonset();
		
		// Icon Select2 Control
		var cryoutSelect2Texts = {
			errorLoading: function(){ return "The results could not be loaded" },
			inputTooLong: function(){ return "Please delete some characters" },
			inputTooShort:function(){ return "Please enter more characters" },
			loadingMore:  function(){ return "Loading more results..." },
			noResults:    function(){ return "No results found" },
			searching:	  function(){ return "Searching…" },
			maximumSelected:function(){ return "You have selected too many items"}
		}

		// init select2 control on font selectors
		if ( jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd ) jQuery('select.fontselect.select2').select2({
			width: "element",
			theme: 'default cryout-select2',
			language: cryoutSelect2Texts
		}).addClass( 'cryout-select2' );
		// init select2 control for icon selectors (needs extra class for custom font)
 		if ( jQuery && jQuery.fn && jQuery.fn.select2 && jQuery.fn.select2.amd ) jQuery('select.iconselect.select2').select2({
			width: "element",
			theme: 'default cryout-select2 cryout-iconselect',
			language: cryoutSelect2Texts
		}).addClass( 'cryout-select2 cryout-iconselect' );

	}); // setTimeout		

}); // load
