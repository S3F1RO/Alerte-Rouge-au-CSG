<?php
    session_start();
    //OPEN DB
    include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");
    
    // Data ajax from client
    if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
    if (isset($data['flagPosition']))  $flagPosition = $db->real_escape_string($data['flagPosition']);
    if (isset($data['position']))  $position = $db->real_escape_string($data['position']);
    
    //Checking if the flag is null
    if ($flagPosition == "") {
        echo json_encode(["success"=>false,"html"=>"Flag manquant"]);
        exit();
    }

    //If flag is entered then remaining is 0
    if ($flagPosition != FLAGPOSITION) {
        echo json_encode(["success"=>false,"html"=>"Trouvez le bon mot de passe"]);
        exit();
    }

    if ($position == "cayenne"){
        echo json_encode(["troll"=>true,"html"=>"Tu veux vraiment la faire s'écraser sur la Guyane ??!!"]);
        exit();
    }

    $_SESSION['isPositionOrbit'] = true;
    echo json_encode(["isPositionOrbit"=>true]);    
    exit();    


?>