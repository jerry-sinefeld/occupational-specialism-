<?php

//OPENS php
session_start();

require_once "assets/staff_common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run



if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if(!only_user(dbconnect_insert(), $_POST["name"])){

        if (reg_doc(dbconnect_insert(),$_POST)){
            doc_auditor(dbconnect_insert(), getnewdocid(dbconnect_insert(),$_POST["username"]),"reg", "User has registered");
            $_SESSION["usermessage"] = "user created successfully";
        } else{
            $_SESSION["usermessage"] = "user creation failed";
        }
    } else {
        $_SESSION["usermessage"] = "user already exists";
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
echo "<h1>Staff registration</h1><br>";
echo "<h2>Register</h2>";

echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='name'>First Name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='name' id='name' placeholder= 'enter your name' required>"; //creates the name field
echo "<br>";
echo "<label for='lname'>Last name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='name' id='name' placeholder= 'enter your name' required>"; //creates the name field
echo "<br>";
echo "<label for='doc_password'>Password</label>"; //creates the name text box and what it contains
echo "<input type='text' name='doc_password' id='doc_password' placeholder= 'enter your password' required>"; //creates the name field
echo "<br>";
echo "<label for='available'>Are you available</label>"; //creates the name text box and what it contains
echo "<input type='text' name='available' id='available' placeholder= 'Are you available' required>"; //creates the name field
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