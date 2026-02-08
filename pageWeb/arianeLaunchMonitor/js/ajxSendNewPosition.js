$(document).ready(function(){
//==============================================================================





/*==============================================================================
	Send ajax to server
==============================================================================*/
	// Send ajax data every 60s
	// window.setInterval(sendAjax, 1000, "ajxDisplayCountdown.php", {});
	jQuery("body").on("click", "button", function() {
		var flag = jQuery("input").val();
		var position = jQuery(this).attr("id");
		sendAjax("ajxSendNewPosition.php", {'flagPosition': flag, 'position': position});
	});

/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		if (data['isPositionOrbit']) {
			//Removing the class for cayenne
			jQuery("#cayenne").removeClass("ok");
			jQuery("#cayenne").html("Choisir");
			//Giving the class to orbit
			jQuery("#orbite").addClass("ok");
			jQuery("#orbite").html("Choisi");
			jQuery(".error").html("Tu as fait le bon choix ! Bravo")
		}
		else jQuery(".error").html(data['html']);
	}





/*==============================================================================
	Ajax functions
==============================================================================*/

	// --- Send AJAX data to server
	function sendAjax(serverUrl, data) {
		serializedData = JSON.stringify(data);
		jQuery.ajax({type: 'POST', url: serverUrl, dataType: 'json', data: "data=" + serializedData,
			success: function(data) {
				getAjax(data);
			}
		});
	}

	function redirect(serverUrl) {
		window.location.href = serverUrl;
	}

	// --- Display standard json data with syntax :
	//     [
	//       {target:".htmlClass", html:"html"},
	//       {target:"htmlElement", html:"html", insert:"append"},
	//       {target:"htmlElement", removeClass:"cssRed", addClass:"cssGreen"},
	//       {target:"htmlElement", cssKey:"background-color", cssVal:"red"},
	//       {action:"reloadPage"}

//==============================================================================
});
