<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ALM — Ariane Launch Monitor</title>
    <link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
    <link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />
    <script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
    <script type='text/javascript' src='./js/jquery-ui.min.js'></script>
    <script type='text/javascript' src='./js/ajxSendNewPosition.js'></script>
<style>

.panel button {
    position: relative;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 60px;

    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 5vh;
    background: transparent;
    border-style: solid;
    border-color: black;
    border-width: 2vh;
    
    font-size: 18px;
    font-weight: bold;
    border: none;
    cursor: pointer;
}
*{
    color:white;
}
.container{
    padding-left:66vh;
}
.container input{
    border-color: #ff6200;
    outline-color: #ff6200;
    border-radius:5vh;
    padding-left:3vh;

}

</style>
</head>

<body>

<header>
    <h1>Ariane Launch Monitor</h1>
    <span>Trajectory</span>
    <a href="./interface.php"><i class='icon'>&#xe5c4;</i></a>
</header>

<div class="grid">

    <div class="panel">
        <h2>1° Destination</h2>
        Location : Orbite<br><br>
        Durée estimée : 1h<br><br>
        Dépôt du Satellite en orbite<br><br>
        Objectif : Satellite Envoyé, Communication vers l'internet
        <button id='orbite' style='position : relative' class=''>Choisir</button>
    </div>
    
    <div class="panel">
        <h2>2° Destination</h2>
        Location : Cayenne<br><br>
        Durée estimée : 20min<br><br>
        Destruction de Cayenne<br><br>  
        Objectif : Explosion de Cayenne, Destruction massive, des milliers de mort....(R.I.P)
        <button id='cayenne' style='position : relative' class='ok'>Choisi</button>
    </div>
    
</div>
<div class='container'><input type='text' name='flag' placeholder='flag'/></div>
<p>Géré par le PC de positionnement : Charlie</p>
<p class='error'></p>
<footer>
    ORBITWATCH © Launch Control Division — INTERNAL USE ONLY
</footer>

</body>
</html>

