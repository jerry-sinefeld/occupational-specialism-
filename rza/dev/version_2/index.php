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
echo "<h1>Where the Wild Meets the Wonderful!</h1>";
echo "<p>Experience an unforgettable safari, stay in luxury amongst the animals,
 and discover the secrets of the natural world—all at Ridget Zoo Adventures.
  </p>";
echo "<br>";
echo "<h1> Three Worlds, One Adventure! </h1>";
echo "<h1> The Safari Trek</h1>";
echo "<p> Get closer than ever to the world's most majestic creatures. Our safari-style wildlife park allows you to roam through expansive habitats where lions,
 giraffes, and rhinos live in harmony.</p>";
echo "<br>";
echo"<p> Self-Drive or Guided Tours: Choose your own pace or learn from our expert rangers.</p>";
echo "<br>";
echo "<p> Up-Close Encounters: Feed the giants and learn about our conservation efforts.</p>";
echo "<br>";
echo "<h1>The Overlook Hotel </h1>";
echo "<p>Why leave when the sun goes down? Wake up to the sound of the savanna in our premium on-site accommodations.</p>";
echo "<br>";
echo "<p>Balcony Views: Watch the zebras graze while you enjoy your morning coffee. </p>";
echo "<br>";
echo "<p>Family Suites: Spacious, themed rooms designed for explorers of all ages. </p>";
echo "<br>";
echo "<p>Fine Dining: Enjoy world-class cuisine at the 'Horizon Grill' overlooking the reserve. </p>";

echo "<h1>Wild Learning </h1>";
echo "<p>Education is at the heart of everything we do. We offer immersive programs designed to inspire the next generation of conservationists.</p>";
echo "<br>";
echo "<p>School Field Trips: Curriculum-aligned tours that bring biology to life. </p>";
echo "<br>";
echo "<p>Junior Ranger Programs: Hands-on weekend workshops for kids. </p>";
echo "<br>";
echo "<p>Conservation Talks: Daily presentations from our resident wildlife experts. </p>";

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