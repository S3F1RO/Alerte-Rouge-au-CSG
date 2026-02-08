$(document).ready(function(){
/*------------------------------------------------------------------------------
	Effect typewriter :
------------------------------------------------------------------------------*/



/*==============================
	jQuery functions
==============================*/


	function sleep(ms) {
	  return new Promise(resolve => setTimeout(resolve, ms));
	}

	$.fn.typewriter = async function (text) {
		// Write each char of text
		for (var i=0 ; i<=text.length ; i++) {
			// Random interval between chars
			var interval = Math.floor((Math.random() * 100) + 50);

			// Special interval for spaces
			if (text.charAt(i) == " ") interval = Math.floor((Math.random() * 100) + 150);

			// Wait
			await sleep(interval);

			// Write char
			jQuery(this).append(text.charAt(i));
		}
		return this;
	}



/*==============================
	jQuery events
==============================*/

/* Typewriter */
	// Type text from typewriter class
	var typewriterText1 = jQuery(".typewriter").html();
	jQuery(".typewriter").html("").typewriter(typewriterText1);

	// Type text from section h1
	var typewriterText2 = jQuery("section h1").html();
	jQuery("section h1").html("").typewriter(typewriterText2);



/*==============================
	JS objects
==============================*/



/*==============================
	JS functions
==============================*/

});
