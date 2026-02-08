$(document).ready(function(){
//==============================================================================





/*==============================================================================
	Send ajax to server
==============================================================================*/
	// Send ajax data every 60s
	// window.setInterval(sendAjax, 1000, "ajxDisplayScoreboard.php", {});
	jQuery("body").on("click", "button", function(key) {
		let angle = 0;
		side = jQuery(this).attr("id");
		if ( side == "right") angle = Math.min(angle + 45, 45);
		if ( side == "left" ) angle = Math.max(angle - 45, -90);
		var flagTrajectory = jQuery("input").val();
		sendAjax("ajxGuideRocket.php", {'angle': angle, 'flagTrajectory': flagTrajectory});
	}); 

/*==============================================================================
	Get ajax from server
==============================================================================*/

	// Get ajax data
	function getAjax(data) {
		//Setting up the rocket
		const rocket = document.getElementById("rocket");
		
		function updateRocket() {
			rocket.style.transform = `rotate(${angle}deg)`;
		}
		if (data['html'] == "Ne peut pas aller plus loin" || data['html'] == "Trouvez le bon mot de passe"){
			jQuery(".status").html(data['html']);
		}else{
			jQuery(".status").html(data['html']);
			angle = data['angle'];
			updateRocket();
			
		}
		
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
