<?php
//OPENS php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

if ($_SERVER["REQUEST_METHOD"] === "POST") {// posts data

    $password_check = check_pass_strength($_POST["password"]);//check the strength of password

    if ($password_check['success']) { // if password check outputs success

        if (!only_user(dbconnect_insert(), $_POST["username"])) {// if their username is unique

            if (reg_user(dbconnect_insert(), $_POST)) {// if reg user is successful
                getnewuserid(dbconnect_insert(), $_POST["username"]);//get the userid
                $_SESSION["usermessage"] = "user created successfully." . $password_check['message']; //output the success of the password message and user created successfully
            } else {
                $_SESSION["usermessage"] = "user creation failed"; // if anything occurs say this
            }
        } else {
            $_SESSION["usermessage"] = "user already exists"; // if username already exists
        }
    } else {
        $_SESSION["usermessage"] = $password_check['message']; //if password doesn't meet password check requirements
    }
}


echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title// TODO: POTENTIAL CHANGE NEEDED
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";//opens the div container
require_once "assets/topbar.php";//requires these files to run, if they are not present it will not run
require_once "assets/nav.php"; //requires these files to run, if they are not present it will not run
echo "<div id='main'>";//opens main div
echo "<h2>Register</h2>";//header

echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='fname'>name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='fname' id='fname' placeholder= 'enter your first name' required>"; //creates the name field
echo "<br>";//break
echo "<label for='lname'>last name</label>"; //creates the name text box and what it contains
echo "<input type='text' name='lname' id='lname' placeholder= 'enter your last name' required>"; //creates the name field
echo "<br>";//break
echo "<label for='username'>username</label>";
echo "<input type='text' name='username' id='username' placeholder= 'enter your username' required>";
echo "<br>";//break
echo "<label for='password'>password</label>"; //creates the name text box and what it contains
echo "<input type='text' name='password' id='password' placeholder= 'enter your password' required>"; //creates the name field
echo "<br>";//break
echo "<p>Optional:</p>";
echo "<label for='address'>address</label>"; //creates the name text box and what it contains
echo "<input type='text' name='address' id='address' placeholder= 'enter your address'>"; //creates the name field
echo "<br>";//break
echo "<input type='submit' name='submit' value='Register'>";
echo "</form>";//close form
echo "<br>";//break
echo "<br>";//break

echo user_message();

echo "</div>";//close main div
echo "</div>";//closes the div container
require_once "assets/bottombar.php";
echo "</body>";//closes body
echo "</html>"; //closes html