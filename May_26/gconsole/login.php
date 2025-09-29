<?php
//OPENS php
session_start();

require_once "assets/db_con.php";
require_once "assets/common.php";

if (isset($_SESSION['user'])) {//checks if user is already logged in if so it directs you to the index page
    $_SESSION['usermessage'] = "You are already logged in";
    header('Location: index.php'); //headers only work if no content has loaded on the page
    exit; //by forcing the exit it stops anything from being loaded before redirecting, allowing redirection
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usr = login(dbconnect_insert(), $_POST["username"]);

    if ($usr && password_verify($_POST['password'], $usr['password'])) {
        $_SESSION['user'] = true;
        $_SESSION['userid'] = $usr['user_id'];
        $_SESSION['usermessage'] = "You are logged in";
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['usermessage'] = "Incorrect password";
        header('Location: login.php');
        exit;
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
            require_once "assets/topbar.php";
            require_once "assets/nav.php";
        echo "<div id='main'>";
            echo "<h1>welcome to the gaming hub</h1><br>";
            echo "<h2>Login</h2>";
            if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
                echo "your name:" . $_POST["userrname"]; //posts name
                echo "<br>"; //breakline
            }
            echo "<form action='' method='post'>"; //creates the form and tells the form what to do
            echo "<label for='userrname'>Name:</label>"; //creates the name text box and what it contains
            echo "<input type='text' name='userrname' id='userrname' placeholder= 'enter your username' required>"; //creates the name field
            echo "<label for='passsword'>Name:</label>"; //creates the name text box and what it contains
            echo "<input type='text' name='passsword' id='passsword' placeholder= 'enter your password' required>"; //creates the name field
            echo "<br>";
            echo "<input type='submit' name='submit' value='submit'>";
        echo "</form>";


        echo "</div>";
        echo "</div>";
    echo "</body>";
echo "</html>"; //closes html