<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Rocket Orientation Control</title>
<script type='text/javascript' src='./js/jquery-3.7.0.min.js'></script>
<script type='text/javascript' src='./js/jquery-ui.min.js'></script>
<link rel='stylesheet' type='text/css' href='./css/web.css' media='screen' />
<link rel='stylesheet' type='text/css' href='./css/03_icons.css' media='screen' />
<!-- <script type='text/javascript' src='./js/ajxDisplayCountdown.js'></script> -->
<script type='text/javascript' src='./js/ajxConfirmChanges.js'></script>

<style>
    input[name="flag"]{
        position:absolute;
        top:40vh;
        left:62vh;
    	width: 80vh;
        height:3vh;
        background-color: transparent;
        color:white;
        outline-color: #ff6200;
        border-color: #ff6200;
        border-radius: 4vh;
        padding: 4vh;
    }
    p{
        position:absolute;
        top:35vh;
        left:62vh; 
    }
    p.error{
        position:absolute;
        top:52vh;
        left:70vh; 
    }
</style>
</head>

<body>
    <header>
        <h1>Ariane Launch Monitor</h1>
        <span>Confirm Changes</span>
        <a href="./interface.php"><i class='icon'>&#xe5c4;</i></a>
    </header>
    <p>Que vous donne le quiz M. le Directeur ?</p>
    <input type='text' name='flag' placeholder='flag'/>
    <p class='error'></p>
    </div>
</body>
</html>
