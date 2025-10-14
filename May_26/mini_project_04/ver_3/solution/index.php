<?php //OPENS php

if (!isset($_GET["message"])){
    session_start();
    $message = false;
} else{
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
    echo "<h1>Primary Oaks Surgery</h1>";
    echo "<p>Hello, and a very warm welcome from the entire team at Primary Oaks Surgery!

Located right here in the heart of the community, we are dedicated to providing the highest quality of healthcare for you and your family. Your health is our priority, and we strive to offer personalized, compassionate, and accessible medical services for patients of all ages.

Whether you're a new patient looking to register, or a long-standing member of our surgery family, we're here to help you live a healthier life.";
    echo "</p>";
    echo "<br>";
    echo "<h1>Your Health, Our Priority</h1>";
    echo "<p>
At Primary Oaks, you'll find a dedicated team of GPs, Nurses, and support staff working together to meet your health needs. We offer a full range of primary care services, including:
General Consultations: Face-to-face and remote appointments for acute and chronic conditions.
Preventative Care: Health checks, immunisations (including flu), and travel health advice.
Maternity and Child Health: Pre and post-natal care, and baby clinics.";
    echo "</p>";

    if (!$message) {
        echo user_message();
    } else{
        echo $message;
    }

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