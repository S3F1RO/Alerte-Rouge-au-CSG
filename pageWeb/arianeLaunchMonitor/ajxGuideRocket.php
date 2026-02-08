<?php
    session_start();
    //OPEN DB
    include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");
    
    // Data ajax from client
    if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
    if (isset($data['flagTrajectory']))  $flagTrajectory = $db->real_escape_string($data['flagTrajectory']);
    if (isset($data['angle']))  $angle = $db->real_escape_string($data['angle']);
        
    if (!isset($_SESSION['startAngle'])) $_SESSION['startAngle'] = 0;
        
    //If flagTrajectory is entered then remaining is 0
    if ($flagTrajectory != FLAGTRAJECTORY) {
        echo json_encode(["success"=>false,"html"=>"Trouvez le bon mot de passe"]);
        exit();
    }

    //Compute the angle
    $newAngle = $_SESSION['startAngle'] + $angle;
    $_SESSION['startAngle'] = $newAngle;
    
    if ($newAngle > 45){
        $_SESSION['startAngle']=0;
        echo json_encode(["success"=>false,"html"=>"Ne peut pas aller plus loin","angle"=>"$newAngle"]);
        exit();
    }

    if ($newAngle < -90){
        $_SESSION['startAngle']=0;
        echo json_encode(["success"=>false,"html"=>"Ne peut pas aller plus loin","angle"=>"$newAngle"]);
        exit();
    }

    if ($newAngle != -90) {
        echo json_encode(["success"=>false,"html"=>"DISALIGNED","angle"=>"$newAngle"]);
        exit();
    }
    // Return JSON
    $_SESSION['isRocketTrajectoryGood'] = true;
    echo json_encode(["success"=>true,"html"=>"<pre style='color:green'>ALIGNED</pre>","side"=>"$side","angle"=>"$newAngle"]);    
    exit();

?>