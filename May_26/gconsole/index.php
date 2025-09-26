<?php //OPENS php
session_start();


require_once "assets/db_con.php";


echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
    echo "<div class='container'>";
    require_once "assets/topbar.php";
    require_once "assets/nav.php";
    echo "<div id='main'>";
    echo "<h1>welcome to the gaming hub</h1><br>";
    echo "<h2>Register</h2>";
    echo "<img src = 'images/cinema.jpg'> <br>";
    try {
        $conn = dbconnect_insert();
        echo "success";
    }
        catch (PDOException $e) {
        echo $e->getMessage();
    }


    echo "</div>";
    echo "</div>";
    echo "</body>";
echo "</html>"; //closes html