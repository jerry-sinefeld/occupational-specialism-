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
echo "<h1>Why should I know my carbon footprint?</h1>";
echo "<p>Knowing your carbon footprint gives you a clear picture of how your lifestyle affects the environment.
From transportation and food to home energy use, every action adds up.
By identifying your biggest sources of emissions, you can take practical steps—like reducing energy consumption, choosing sustainable products,
or improving recycling habits—to lower your impact. It’s not just good for the planet; it often saves money and inspires others to live more sustainably.</p>";
echo "<h1>Carbon Footprint Calculator</h1>";
echo "<a href='https://footprint.wwf.org.uk/questionnaire'>Calculate Your Carbon Footprint</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html