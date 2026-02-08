<?php
session_start();
if (!isset($_SESSION['id'])) header("Location: logout.php");
//Open DB
include_once("./dbConfig.php");
$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
$db->set_charset("utf8");
//Get Data from SESSION
$id = $_SESSION['id'];
$query = "SELECT teamName FROM `tblScores` WHERE id=$id;";
$result = $db->query($query);
//Get TeamName
while ($row = $result->fetch_assoc()) {
	$teamName = $row['teamName'];
}
// $result->close();

?>

<!DOCTYPE html>

<html>

	<!-- Head -->

	<head>

		<!-- CSS files -->
		<link rel='stylesheet' type='text/css' href='./css/webDesign4.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/02_fonts.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />
		<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />



		<!-- JS files -->
		<script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
		<script type='text/javascript' src='./js/jquery-ui.min.js'></script>
		<script type='text/javascript' src='./js/webDesign4.js'></script>
		<script type='text/javascript' src='./js/web.js'></script>
		<script type='text/javascript' src='./js/ajxDisplayCountdown.js'></script>
		<script type='text/javascript' src='./js/ajxSendFlag.js'></script>

		<meta charset='UTF-8'>

		<link rel='icon' type='image/png' href='./design/favicon.png' />



		<!-- Title -->

		<title>Compte à rebours</title>

	</head>

    <body>
    
    
    <div id="countdown"></div>
	<input type='text' name='flag' placeholder='flag'/>
	<p id=teamName><?php echo "Team : $teamName";?></p>
	<p><a href="index.php">Retour vers le scoreboard</a></p>
    
</body>



</html>
