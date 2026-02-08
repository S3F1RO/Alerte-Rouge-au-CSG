<?php

	// DB open
	include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");

	// Data from client
	$login = NULL;
	if (preg_match("/^[a-z0-9]{2,20}$/", $_POST['login'])) $login = $db->real_escape_string($_POST['login']);
	$pwd = NULL;
	if (preg_match("/^.{6,20}$/", $_POST['pwd'])) $pwd = $db->real_escape_string($_POST['pwd']);

	// Check
	if ($login == NULL || $pwd == NULL) {
		header("Location: logout.php");
		exit();
	}

	// Hash pwd
	// TODO

	// DB select
	$query = "SELECT id AS idUser FROM tblUsers WHERE login = '$login' AND pwd = '$pwd';";
	$result = $db->query($query);

	// Check
	$numRows = $result->num_rows;
	if ($numRows != 1) {
		header("Location: logout.php");
		exit();
	}

	// Data from DB
	while ($row = $result->fetch_assoc()) {
		$idUser = $row['idUser'];
	}
	$result->close();

	// Data to session
	session_start();
	$_SESSION['idUser'] = $idUser;

	// Redirect
	header("Location: main.php");

	// DB close
	$db->close();

?>
