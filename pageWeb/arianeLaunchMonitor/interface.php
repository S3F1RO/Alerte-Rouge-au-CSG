<?php
    session_start();
    if (!isset($_SESSION['id'])) header("Location: logout.php");
    
    //Open DB
    include_once("./dbConfig.php");
    $db = new mysqli(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME);
    $db->set_charset("utf8");
    
    //Get Data from SESSION
    $id = $_SESSION['id'];
    if (isset($_SESSION['isRocketTrajectoryGood'])) $isRocketTrajectoryGood = $_SESSION['isRocketTrajectoryGood'];
    if (isset($_SESSION['isPositionOrbit'])) $isPositionOrbit = $_SESSION['isPositionOrbit'];
    if (isset($_SESSION['isChanged'])) $isChanged = $_SESSION['isChanged'];
    
    // $query = "SELECT teamName FROM `tblScores` WHERE id=$id;";
    // $result = $db->query($query);
    
    // //Get TeamName
    // while ($row = $result->fetch_assoc()) {
    //     $teamName = $row['teamName'];
    // }

    //Checking Values
    /// Trajectory
    if ($isRocketTrajectoryGood) $msgTrajectory = "<span class='ok'>ALIGNED</span>";
    else $msgTrajectory = "<span class='fail'>DISALIGNED</span>";
    $isPositionOrbit = true;
    /// Position
    if ($isPositionOrbit) $msgPosition = "<span class='ok'>Orbite</span>";
    else $msgPosition = "<span class='fail'>Cayenne</span>";
    /// Changes confirmed
    // $isChanged = true;
    if (!$isChanged) $changes = " <a href='./confirmChanges.php'>Confirmez les changements</a><br>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ALM — Ariane Launch Monitor</title>
    <link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
    <script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
    <script type='text/javascript' src='./js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='./js/ajxDisplayCountdown.js'></script>
    <script type='text/javascript' src='./js/ajxSendFlag.js'></script>
</head>

<body>

<header>
    <h1>Ariane Launch Monitor</h1>
    <span>Launch Monitoring & Telemetry Interface</span>
</header>

<div class="grid">

    <div class="panel">
        <h2>COUNTDOWN</h2>
        <div id="countdown"></div>
        <input type='text' name='flag' placeholder='flag'/>
    	<p><a href="index.php">Retour vers le scoreboard</a></p>
        <!-- T-00:30:00 -->
    </div>

    <div class="panel">
        <h2>LAUNCH STATUS</h2>
        <div class="telemetry">
            <a href="./trajectory.html">Trajectory</a>: <?php echo $msgTrajectory ?></a><br>
            <a href="./position.php">Position</a>: <?php echo $msgPosition ?></a><br>
            Telemetry Link: <span class="ok">STABLE</span><br>
            Range Safety: <span class="ok">ARMED</span><br>
            Weather: <span class="warn">MARGINAL</span><br>
            <?php echo $changes; ?>
        </div>
    </div>

    <div class="panel">
        <h2>PROPULSION</h2>
        <div class="telemetry">
            Main Engine Pressure: <span id="pressure">102%</span><br>
            Fuel Temperature: <span id="temp">-183°C</span><br>
            Oxidizer Flow: <span class="ok">NOMINAL</span>
        </div>
    </div>

    <div class="panel">
        <h2>SECURITY LOG</h2>
        <pre id="log" style="height:140px; overflow:auto;">
[INFO] Ground systems synchronized
[INFO] Telemetry handshake completed
[WARN] Unauthorized login attempt detected
        </pre>
    </div>

</div>

<footer>
    ORBITWATCH © Launch Control Division — INTERNAL USE ONLY
</footer>

</body>
</html>

