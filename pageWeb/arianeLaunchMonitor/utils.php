<?php
////////////////////////////////////////////////////////////////////////////////
// Utils
////////////////////////////////////////////////////////////////////////////////

// Generate random string
function generateRandomString($length=100) {
	$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
	$randomString = '';
	for ($i = 0 ; $i < $length ; $i++) {
		$randomString .= $characters[rand(0, strlen($characters) - 1)];
	}
	return $randomString;
}



// Success / fail
function success($db=NULL) {
	// DB close
	if ($db != NULL) $db->close();

	// Data ajax to client
	echo json_encode(array("success"=>true));
	exit();
}
function fail($db=NULL) {
	// DB close
	if ($db != NULL) $db->close();

	// Data ajax to client
	echo json_encode(array("success"=>false));
	exit();
}

?>
