<?php

session_start();

if (!isset($_SESSION["usersId"])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <header>
        <div class="logo" href="index.html"><img src="img/Random GEN Logo.png" alt="logo"></div>
        <nav>
            <ul class="navlink">
                <li><a href="#">Services</a></li>
                <li><a href="#">Projects</a></li>
                <li><a href="#">About</a></li>
            </ul>
        </nav>
        <a class="cta" href="logout.php">LOG-OUT</a> 
    </header>   
    <div class="forms">
        <label>MIN</label>
        <label>MAX</label>
    </div>
        
    <div class="tbox">
        <input type="number" id="min">
        <input type="number" id="max">
    </div>  
    <br>
    <div class = btn>
    <button type="submit" class="gnrtbtn">Generate</button>
    </div>
    <h1 class="generated"></h1>
<script src="app.js"></script>
</body>
</html>