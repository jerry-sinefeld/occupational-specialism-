<?php


session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure
echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title// TODO: POTENTIAL CHANGE NEEDED
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head
echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";
echo "<h1></h1>";// TODO: POTENTIAL CHANGE NEEDED
echo "<p> </p>";// TODO: POTENTIAL CHANGE NEEDED
echo "<p> </p>";// TODO: POTENTIAL CHANGE NEEDED
echo "<p></p>";// TODO: POTENTIAL CHANGE NEEDED
echo "<a href=''// TODO: POTENTIAL CHANGE NEEDED
>Learn More</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html