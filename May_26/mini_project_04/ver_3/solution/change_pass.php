<?php
//OPENS php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $password_check = check_pass_strength($_POST["password"]);

    if ($password_check['success']) {
            if (change_pass(dbconnect_insert(), $_POST)) {
                auditor(dbconnect_insert(), "Update", "User has updated their password.");
                $_SESSION["usermessage"] = "password updated successfully." . $password_check['message'];
            } else {
                $_SESSION["usermessage"] = "user creation failed";
                $_SESSION["usermessage"] = $password_check['message'];
    }
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
echo "</body>";
echo "</html>"; //closes html