<?php //OPENS php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

}


echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Session work</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
    echo "<div class='container'>";
    require_once "assets/nav.php";
    require_once "assets/topbar.php";
    echo "<div id='main'>";
    echo "<h2>session work</h2>";
    echo "<form method='post' action=''>";
        echo "<input type='text' name='message' placeholder='message'>";
        echo "<input type='submit' name='submit' value='submit'>"; //takes user input and store it in session to be outputted somewhere else
    echo "</div>";
    echo "</div>";
    echo "</body>";
echo "</html>"; //closes html