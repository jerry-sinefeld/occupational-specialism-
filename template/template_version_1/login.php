<?php
//OPENS php
session_start();//starts the session

require_once "assets/db_con.php";// requires these files to run if they are not present the code will not run
require_once "assets/common.php";// requires these files to run if they are not present the code will not run

if (isset($_SESSION['user'])) {//checks if user is already logged in if so it directs you to the index page
    $_SESSION['usermessage'] = "You are already logged in";// if the session variable is active then the user is logged in
    header('Location: index.php'); //send to index headers only work if no content has loaded on the page
    exit; //by forcing the exit it stops anything from being loaded before redirecting, allowing redirection
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {// post
    $usr = login(dbconnect_insert(), $_POST["username"]); //runs the login function and returns username

    if ($usr) {// if the usr function matches the stored username
        $_SESSION['userid'] = $usr['userid'];//sets the session id as the id stored in usr
        $_SESSION['usermessage'] = "You are logged in"; //if they are it displays that you are logged in
        header('Location: index.php'); // sends user to index
        exit;// when doing a header you need an exit so the code in the rest of the page does not a run and cause issues
    } else {// if the details don't match
        $_SESSION['usermessage'] = "Incorrect password"; //output incorrect password
        header('Location: login.php');// reopen login
        exit;// when doing a header you need an exit so the code in the rest of the page does not a run and cause issues
    }
}
echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>Home</title>"; //opens and writes title// TODO: POTENTIAL CHANGE NEEDED
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";//opens the div container
require_once "assets/topbar.php";// requires these files to run if they are not present the code will not run
require_once "assets/nav.php";// requires these files to run if they are not present the code will not run
echo "<div id='main'>";//opens main div
echo "<h1></h1><br>";// TODO: POTENTIAL CHANGE NEEDED
echo "<h2>Login</h2>";//header
echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='username'>Username:</label>"; //creates the name text box and what it contains
echo "<input type='text' name='username' id='username' placeholder= 'enter your username' required>"; //creates the name field
echo "<br>";//break
echo "<label for='password'>Password:</label>"; //creates the name text box and what it contains
echo "<input type='text' name='password' id='password' placeholder= 'enter your password' required>"; //creates the name field
echo "<br>";//break
echo "<input type='submit' name='submit' value='submit'>";//submit button
echo "</form>";//close form


echo "</div>";//close main div
echo "</div>";//close container div
require_once "assets/bottombar.php";// requires these files to run if they are not present the code will not run
echo "</body>";//close body
echo "</html>"; //closes html