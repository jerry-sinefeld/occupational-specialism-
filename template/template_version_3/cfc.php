<?php
session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: login.php");
    exit;
}
echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure
echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>Carbon footprint calculator</title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head
echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";
echo "<h1>Header</h1>";
echo "<p>placeholder</p>";
echo "<h1>Header</h1>";
echo "<a href='https://footprint.wwf.org.uk/questionnaire'>Calculate Your Carbon Footprint</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html