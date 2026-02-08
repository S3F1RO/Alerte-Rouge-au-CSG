<?php
    session_start();
    //OPEN DB
    include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");
    
    // Data ajax from client
    if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
    if (isset($data['flagChanges']))  $flagChanges = $db->real_escape_string($data['flagChanges']);
    if (isset($data['position']))  $position = $db->real_escape_string($data['position']);
    
    //Checking if the flag is null
    if ($flagChanges == "") {
        echo json_encode(["success"=>false,"html"=>"Flag manquant"]);
        exit();
    }

    //If flag is entered then remaining is 0
    if ($flagChanges != FLAGCHANGES) {
        echo json_encode(["success"=>false,"html"=>"Trouvez le bon mot de passe"]);
        exit();
    }

    $_SESSION['isChanged'] = true;
    echo json_encode([
            "success"=>true,
            "html"=>"Bravo vous pouvez donc entrer ce mot de passe pour valider 
            le démarrage de la fusée :<br>  <pre style='font-weight:bold;color:#ff6200'>RIP_ALRT25500OCSG</pre>"
        ]);    
    exit();    


?>