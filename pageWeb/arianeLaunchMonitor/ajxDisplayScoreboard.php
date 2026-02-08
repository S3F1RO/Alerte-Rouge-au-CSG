<?php
    //OPEN DB
    include_once("./dbConfig.php");
	$db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
	$db->set_charset("utf8");
    $rank=1;
    $query= "SELECT teamName, TIMESTAMPDIFF(MINUTE, startTime, endTime) AS tempsTotal 
            FROM tblScores 
            WHERE win = 1
            ORDER BY tempsTotal;";
    $result =$db->query($query);
    //Table definition
    $html.= "<thead>";
    $html.= "<tr>";
    $html.= "<th>Rang</th>";
    $html.= "<th>Équipe</th>";
    $html.= "<th>Temps (en min)</th>";
    $html.= "</tr>";
    $html.= "</thead>";
    $html.= "<tbody>";

    while( $row = $result->fetch_assoc()){
        $teamName = $row['teamName'];
        $temps = $row['tempsTotal'];
        if ($temps == "") $temps="En cours";
        $html.="<tr>";
        $html.="<td>".$rank."</td>";
        $html.="<td>".$teamName."</td>";
        $html.="<td>".$temps."</td>";
        $rank+=1;
        
    }
    // Return JSON
    echo json_encode(["success" => true, "html" => $html]);
    exit();

?>