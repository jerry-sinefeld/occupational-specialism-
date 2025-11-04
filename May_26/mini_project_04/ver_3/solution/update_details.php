<?php
//OPENS php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (change_details(dbconnect_insert(), $_POST)) {
        doc_auditor(dbconnect_insert(), getnewuserid(dbconnect_insert(), $_POST["username"]), "update", "User has updated details");
        $_SESSION["usermessage"] = "Updated details.";
    } else {
        $_SESSION["usermessage"] = "Update failed";
    }
}
echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";//requires these files to run, if they are not present it will not run
require_once "assets/nav.php"; //requires these files to run, if they are not present it will not run
echo "<div id='main'>";
echo "<h2>Update details</h2>";

echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='f_name'>name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='f_name' id='f_name' placeholder= 'enter your name' >"; //creates the name field
echo "<br>";
echo "<label for='last_name'>last name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='last_name' id='last_name' placeholder= 'enter your last name' >"; //creates the name field
echo "<br>";
echo "<label for='username'>username</label>";
echo "<input type='text' name='username' id='username' placeholder= 'enter your username' >";
echo "<br>";
echo "<label for='dob'>dob</label>"; //creates the name text box and what it contains
echo "<input type='text' name='dob' id='dob' placeholder= 'enter your d.o.b'>"; //creates the name field
echo "<br>";
echo "<label for='postcode'>postcode</label>"; //creates the name text box and what it contains
echo "<input type='text' name='postcode' id='postcode' placeholder= 'enter your postcode' >"; //creates the name field
echo "<br>";
echo "<label for='nhs_numb'>NHS number</label>"; //creates the name text box and what it contains
echo "<input type='text' name='nhs_numb' id='nhs_numb' placeholder= 'enter your NHS number' >"; //creates the name field
echo "<br>";
echo "<p>Optional:</p>";
echo "<label for='allergies'>allergies</label>"; //creates the name text box and what it contains
echo "<input type='text' name='allergies' id='allergies' placeholder= 'enter your allergies'>"; //creates the name field
echo "<br>";
echo "<input type='submit' name='submit' value='Update details'>";
echo "</form>";
echo "<br>";
echo "<br>";

echo user_message();

echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html