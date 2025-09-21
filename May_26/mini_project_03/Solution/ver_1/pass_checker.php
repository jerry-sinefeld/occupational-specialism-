<?php
//OPENS php
session_start(); //starts session

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
        echo "<div class='container'>";
            require_once "assets/topbar.php";// opens and runs the topbar file in assets
            require_once "assets/nav.php"; //opens and runs the nav file in assets
            echo "<div id='main'>"; //opens a div with the id of main
                echo "<form method='post' action=''>"; //opens a form with what should be done with the inputted data
                    echo "<label for='pass'>Password:</label>"; //creates the Password text box and what it contains before anything is typed
                    echo "<input type='password' name='pass' id='pass' placeholder='enter your password' required>"; //creates the password box
                    echo "<input type='submit' name='submit' value='Submit'>"; //creates the submit box
                echo "</form>"; //closes form

                if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
                    $_tally = 9; //creates a variable with a value of 9 as that is how many requirements there are
                    $_password = $_POST['pass']; //defines the variable of $_password as whatever is inputted into the pass input
                    $_spec_char = '/[!@#$"£%^&*()_=+{};:,.<>]/'; //a variable with a collection of all the special characters I could think of, I'm sure there's a better way

                    if (!preg_match('/[A-Z]/', $_password)) { //checks if an uppercase character doesn't exist in the password variable
                        $_tally --; //takes one off the tally if it doesn't
                        echo "your password must contain at least one uppercase character"; //improvement message
                        echo "<br>";
                    }
                    if (!preg_match('/[a-z]/', $_password)) {
                        $_tally --;
                        echo "your password must contain at least one lowercase character"; //improvement message
                        echo "<br>";
                    }
                    if (!preg_match('/[0-9]/', $_password)) {
                        $_tally --;
                        echo "your password must contain at least one number"; //improvement message
                        echo "<br>";
                    }
                    if (strlen($_password) <= 8) {
                        $_tally --;
                        echo "Your password must be at least 8 characters long."; //improvement message
                        echo "<br>";
                    }
                    if (preg_match('/^[0-9]/', $_password)) {
                        $_tally --;
                        echo "Your password should not start with a number."; //improvement message
                        echo "<br>";
                    }
                    if (preg_match($_spec_char, $_password[0])) {
                        $_tally --;
                        echo "Your password should not start with a special character."; //improvement message
                        echo "<br>";
                    }
                    if (preg_match($_spec_char, substr($_password, -1))) {
                        $_tally --;
                        echo "Your password should not end with a special character."; //improvement message
                        echo "<br>";
                    }
                    if (!preg_match($_spec_char, $_password)) {
                        $_tally --;
                        echo "Your password must contain at least one special character."; //improvement message
                        echo "<br>";
                    }
                    if ($_password === 'password') {
                        $_tally --;
                        echo "Your password cannot be password or Password."; //improvement message
                        echo "<br>";
                    }
                    echo "your password is: " . $_POST['pass'];
                    echo "<br>";
                    echo "your score is: " . $_tally . "/9";
                }
            echo "</div>"; //closes main div
        echo "</div>"; //closes container div
    echo "</body>"; //closes body
echo "</html>"; //closes html

?>