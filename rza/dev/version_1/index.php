<?php
//OPENS php
if (!isset($_GET["message"])) {
    session_start();
    $message = false;
} else {
    // decodes the message for display
    $message = htmlspecialchars(urldecode($_GET["message"]));
}

require_once "assets/common.php";
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
echo "<h1>Rolsa Technologies – Powering a Cleaner Tomorrow</h1>";
echo "<p> At Rolsa Technologies, we believe a sustainable future starts at home. As specialists in eco-friendly engineering,
 we help homeowners reduce their carbon footprint through smart, clean, and efficient energy solutions.
  From high-performance solar panel installations to reliable EV charging systems,
  our mission is to make renewable energy simple, accessible, and cost-effective for everyone. 
  </p>";
echo "<br>";
echo "<h1> Clean Energy Made Easy </h1>";
echo "<p> Our expert engineers design and install systems tailored to your home’s needs—ensuring maximum efficiency, long-term savings, and minimal environmental impact.
Whether you're looking to transition to solar power, charge your electric vehicle at home, or better understand your energy usage,
we provide step-by-step guidance throughout the entire process. 
</p>";
echo "<br>";
echo "<h1> Committed to a Greener Future </h1>";
echo "<p> We don’t just install technology—we empower you with knowledge.
Our team helps you understand your energy consumption, the effects of global warming, and the positive impact your choices can have on the planet.
Every installation moves us all one step closer to a cleaner, brighter future.</p>";

if (!$message) {
    echo user_message();
} else {
    echo $message;
}

try {
    $conn = dbconnect_insert();
    echo "success";
} catch (PDOException $e) {
    echo $e->getMessage();
}


echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html