<?php


//OPENS php
session_start();

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
if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
    echo "your name:" . $_POST["num"]; //posts name
    echo "<br>"; //breakline
}
echo "<form action='' method='post'>"; //creates the form and tells the form what to do
    echo "<label for='manufacturer'>manufacturer</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='manufacturer' id='manufacturer' placeholder= 'enter the manufacturer' required>"; //creates the name field
    echo "<br>";
    echo "<label for='console_name'>console name</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='console_name' id='console_name' placeholder= 'enter your consoles name' required>"; //creates the name field
    echo "<br>";
    echo "<label for='sign'>sign up date</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='sign' id='sign' placeholder= 'enter sign up date' required>"; //creates the name field
    echo "<br>";
    echo "<label for='dob'>dob</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='dob' id='dob' placeholder= 'enter your d.o.b' required>"; //creates the name field
    echo "<br>";
    echo "<label for='country'>country</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='country' id='country' placeholder= 'enter your country of origin' required>"; //creates the name field
    echo "<br>";
    echo "<label for='bits'>what bit is your console</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='bits' id='bits' placeholder= 'enter your country of origin' required>"; //creates the name field
    echo "<br>";
    echo "<input type='submit' name='submit' value='submit'>";
echo "</form>";


echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html