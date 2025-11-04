<?php

//OPENS php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (change_staff_details(dbconnect_insert(), $_POST)) {
        auditor(dbconnect_insert(), getnewdocid(dbconnect_insert(), $_POST["doc_id"]), "update", "Doctor has updated details");
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
echo "<label for='name'>First Name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='name' id='name' placeholder= 'enter your name' required>"; //creates the name field
echo "<br>";
echo "<label for='lname'>Last name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='lname' id='lname' placeholder= 'enter your name' required>"; //creates the name field
echo "<br>";
echo "<label for='role'>Role</label>"; //creates the name text box and what it contains
echo "<input type='text' name='role' id='role' placeholder= 'enter your role' required>"; //creates the name field
echo "<br>";
echo "<label for='room_numb'>Room Number</label>"; //creates the name text box and what it contains
echo "<input type='text' name='room_numb' id='room_numb' placeholder= 'enter your room number'>"; //creates the name field
echo "<br>";
echo "<input type='submit' name='submit' value='submit'>";
echo "</form>";
echo "<br>";
echo "<br>";

echo user_message();

echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html