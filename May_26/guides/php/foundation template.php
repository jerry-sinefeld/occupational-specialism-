<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='/css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

echo "<body>"; //opens body
    echo "<div class='container'>"; //creates a div with the class of container
    echo "<div id='main'>"; //creates a div with the id of main
require_once "assets/nav.php"; //opens the nav php file that adds a navbar
    echo "</div>"; //closes div
    echo "</div>"; //closes div
echo "</body>"; //closes body
echo "</html>"; //closes html














?>