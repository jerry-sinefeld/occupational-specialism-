<?php
//OPENS php
session_start();

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
                echo "<form method='post' action=''>";
                    echo "<label for='pass'>Password:</label>"; //creates the Password text box and what it contains before anything is typed
                    echo "<input type='password' name='pass' id='pass' placeholder='enter your password' required>";
                echo "<form/>";
                if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
                    echo "your password:" . $_POST["password"] ; //posts password
                }
            echo "</div>";
        echo "</div>";
    echo "</body>";
echo "</html>"; //closes html

?>