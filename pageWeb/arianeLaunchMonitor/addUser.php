<?php

	// DB open
	include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");

	// Data from client
	$teamName = NULL;
	if (preg_match("/^.{2,20}$/", $_POST['teamName'])) $teamName = $db->real_escape_string($_POST['teamName']);
	if (preg_match("/^.{2,20}$/", $_POST['member1'])){
		$member1 = $db->real_escape_string($_POST['member1']);
		$teamMembers[]=$member1;
	} 
	if (preg_match("/^.{2,20}$/", $_POST['member2'])){
		$member2 = $db->real_escape_string($_POST['member2']);
		$teamMembers[]=$member2;
	} 
	if (preg_match("/^.{2,20}$/", $_POST['member3'])){
		$member3 = $db->real_escape_string($_POST['member3']);
		$teamMembers[]=$member3;
	} 
	if (preg_match("/^.{2,20}$/", $_POST['member4'])){
		$member4 = $db->real_escape_string($_POST['member4']);
		$teamMembers[]=$member4;
	} 
	

	// Check
	if ($teamName == NULL) {
		header("Location: logout.php");
		exit();
	}

	// Hash pwd
	// TODO

	// DB insert
	$query = "INSERT INTO `tblScores` (`id`, `teamName`, `startTime`, `endTime`, `win`) VALUES (NULL, '$teamName', NOW(), NULL, NULL);";
	$success = $db->query($query);
	$lastInsertedId = $db->insert_id;
	// Check
	if (!$success) {
		header("Location: addUser.html");
		exit();
	}

	// Redirect
	session_start();
	$_SESSION['id']=$lastInsertedId;
	
	//Check if user exist
	foreach ($teamMembers as $member){
		$query="INSERT INTO `tblUsers` (`id`, `surname`, `idTeam`) VALUES (NULL, '$member', '$lastInsertedId');";
		$success=$db->query($query);
	}
	$db->close();
	if ( $success ) header("Location: interface.php");

	// DB close

?>
