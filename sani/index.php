<?php //OPENS php
session_start();

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
    echo "<div class='container'>";
    require_once "assets/nav.php";
    require_once "assets/topbar.php";
    echo "<div id='main'>";
    echo "<form action='' method='post'>"; //creates the form and tells the form what to do
    echo "<label for='str'>Name:</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='str' id='str' placeholder= 'enter your name' required>"; //creates the name field
    echo "<label for='email'>Email:</label>";
    echo "<input type='email' name='email' placeholder='Email'/>"; //creates the email field
    echo "<label for='url'>URL:</label>";
    echo "<input type='url' name='url' placeholder='URL'/>";
    echo "<label for='int'>enter a number:</label>";
    echo "<input type='number' name='int' placeholder='enter a number'/>";





    echo "</div>";
    echo "</div>";
    echo "</body>";
echo "</html>"; //closes html