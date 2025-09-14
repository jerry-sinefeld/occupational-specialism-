<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
        echo "<div class='container'>"; //creates a div with the class of container
            echo "<h1>Login</h1><br>";
            echo "<div id='main'>"; //creates a div with the id of main
                if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
                    echo "your email:" . $_POST["email"]; //posts email entered
                    echo "<br>"; //breakline
                    echo "your password:" . $_POST["password"]; //posts password
                }
                echo "<div class='links'>";
                    require_once "Assets/nav.php"; //opens the nav php file that adds a navbar
                echo "</div>";
                echo "<form method='post' action=''>";
                    echo "<label for='num'>Email:</label>"; //creates the email box and what it contains
                    echo "<br>";
                    echo "<input type='email' name='email'  placeholder= 'enter your E-mail' required>"; //creates the email field
                    echo "<br>";
                    echo "<label for='pass'>please enter your password:</label>"; //creates the password box
                    echo "<br>"; //breakline
                    echo "<input type='password' name='password' id='pass' placeholder= 'password' required>"; //creates the password field
                    echo "<br>";
                    echo "<label for='pass2'>please enter your password again:</label>"; //creates the password box
                    echo "<br>"; //breakline
                    echo "<input type='password' name='password' id='pass2' placeholder= 'password' required>"; //creates the password field
                    echo "<br>";
                    echo "<br>";
                    echo "<input type='submit' name='Login' value='Login'>"; //creates the Login box
                echo "</form>";
            echo "</div>"; //closes div
        echo "</div>"; //closes div
    echo "</body>"; //closes body
echo "</html>"; //closes html














?>
