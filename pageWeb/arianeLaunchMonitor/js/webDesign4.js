$(document).ready(function(){
//==============================================================================

/*==============================================================================
	PARAMS
==============================================================================*/
	var USE_FLOATING_PLACEHOLDERS = true;																					// Default 'true'
	var FLOATING_PLACEHOLDERS_INITIALLY_HIDDEN = false;														// Default 'true'
	var FLOATING_PLACEHOLDERS_INITIALLY_HIDDEN_EVEN_FOR_INVISIBLE_PLACEHOLDERS = false;	// Defaut 'false'










/*==============================================================================
	Initial events
==============================================================================*/

	//////////////////////
	// Checkbox & Radio //
	//////////////////////

	// Checkbox & radio : create empty span (checkmark container)
	jQuery("input[type='checkbox'], input[type='radio']").each(function() {
			// Create empty span
			jQuery(this).after(`<span></span>`);
	});





	//////////////////////////
	// Floating placeholder //
	//////////////////////////

	// Floating placeholder : create label using placeholder (initially hidden)
	jQuery("li > input:not([type='checkbox']):not([type='radio']):not([type='submit']), li > textarea, li > select").each(function() {
		if (USE_FLOATING_PLACEHOLDERS) {
			// Create label with placeholder
			var placeholder = jQuery(this).attr('placeholder');
			jQuery(this).after(`<label class='floatingPlaceholder'>${placeholder}</label>`);

			// Initially hidden (except for those having invisible placeholder : date, color, ...)
			if (FLOATING_PLACEHOLDERS_INITIALLY_HIDDEN && jQuery(this).val() == "") {
				if (FLOATING_PLACEHOLDERS_INITIALLY_HIDDEN_EVEN_FOR_INVISIBLE_PLACEHOLDERS) jQuery(this).next(".floatingPlaceholder").addClass("hidden");
				else jQuery(this).not("input[type='number'], input[type='range'], input[type='date'], input[type='time'], input[type='color'], input[type='file'], select").next(".floatingPlaceholder").addClass("hidden");
			}
		}
	});

	// Floating placeholder : create label using data-placeholder for li.optionBox
	jQuery("li.optionBox").each(function() {
		if (USE_FLOATING_PLACEHOLDERS) {
			// Create label with placeholder
			var placeholder = jQuery(this).attr('data-placeholder');
			jQuery(this).append(`<label class='floatingPlaceholder'>${placeholder}</label>`);
		}
	});

	// Show/hide floating placeholder if input full/empty
	jQuery("body").on("input", "li > input:not([type='checkbox']):not([type='radio']):not([type='submit']), li > textarea, li > select", function() {
		if (jQuery(this).val() == "") jQuery(this).next(".floatingPlaceholder").addClass("hidden");
		else jQuery(this).next(".floatingPlaceholder").removeClass("hidden");
	});











/*==============================================================================
	jQuery events
==============================================================================*/

	// // Change wrapper and <li> color on wrapper dblclick
	// jQuery("body").on("dblclick", ".wrapper", function() {
	// 	jQuery(this).css("background-color", "white");
	// 	jQuery("li").css("background-color", "yellow");
	// });

//==============================================================================
});
