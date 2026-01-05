<?php
//OPENS php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

if ($_SERVER["REQUEST_METHOD"] === "POST") {

        if (!only_user(dbconnect_insert(), $_POST["username"])) {

            if (reg_user(dbconnect_insert(), $_POST)) {
                getnewuserid(dbconnect_insert(),$_POST["username"]);
                $_SESSION["usermessage"] = "user created successfully.";
            } else {
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
echo "<h2>Register</h2>";

echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='fname'>name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='fname' id='fname' placeholder= 'enter your first name' required>"; //creates the name field
echo "<br>";
echo "<label for='lname'>last name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='lname' id='lname' placeholder= 'enter your last name' required>"; //creates the name field
echo "<br>";
echo "<label for='username'>username</label>";
echo "<input type='text' name='username' id='username' placeholder= 'enter your username' required>";
echo "<br>";
echo "<label for='password'>password</label>"; //creates the name text box and what it contains
echo "<input type='text' name='password' id='password' placeholder= 'enter your password' required>"; //creates the name field
echo "<br>";
echo "<input type='submit' name='submit' value='Register'>";
echo "</form>";
echo "<br>";
echo "<br>";

echo user_message();

echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html