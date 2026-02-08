<?php
    session_start();
    //OPEN DB
    include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");
    // Data ajax from client
    if (isset($_POST['data'])) $data = json_decode($_POST['data'], true);
    if (isset($data['flag']))  $flag = $db->real_escape_string($data['flag']);
    $now=time();
    $victory = false;
    // Initialize session start
    if (!isset($_SESSION['start'])) {
        $_SESSION['start'] = time();
        }
    $start = $_SESSION['start'];
    $id = $_SESSION['id'];
    // Calculate remaining time
    $end = strtotime("+30 minutes", $start);
    
    //If flag is entered then remaining is 0
    if ($flag === FLAG) {
        $remaining = 0;
        $victory = true;
    }
    else if ($flag == "EXIT") $remaining = 0;
    else $remaining = $end - $now;
    
    //If flag equals 0 then update their time in DB & go to logout.php
    if ($remaining <= 0) {
        $remaining = 0;
        if ($victory){
            $timeQuery = "UPDATE `tblScores` SET `endTime` = NOW() WHERE `tblScores`.`id` = $id;";
            $success = $db->query($timeQuery);
            $winQuery = "UPDATE `tblScores` SET `win` = '1' WHERE `tblScores`.`id` = $id;";
            $success = $db->query($winQuery);
            if ($success){
                echo json_encode(["success" => true, "countdown" =>"ended", "victory"=>$victory,"query"=>$winQuery]);
                exit();
            }

        }
        $timeQuery = "UPDATE `tblScores` SET `endTime` = NOW() WHERE `tblScores`.`id` = $id;";
        $success = $db->query($timeQuery);
        $winQuery = "UPDATE `tblScores` SET `win` = '0' WHERE `tblScores`.`id` = $id;";
        $success = $db->query($winQuery);
        echo json_encode(["success" => true, "countdown" =>"ended", "victory"=>$victory]);
        exit();
            
    }
    //Calculates time
    $minutes = floor($remaining / 60);
    $seconds = $remaining % 60;
    
    //Format Hours and seconds 
    if ( $seconds < 10 ) $secondsFormatted = "0"."$seconds";
    else $secondsFormatted = $seconds;    
    
    if ( $minutes < 10 ) $minutesFormatted = "0"."$minutes";
    else $minutesFormatted = $minutes;
    
    $countdown = "T-00:$minutesFormatted:$secondsFormatted";
    // Return JSON
    echo json_encode(["success" => true, "countdown" => $countdown]);
    exit();

?>