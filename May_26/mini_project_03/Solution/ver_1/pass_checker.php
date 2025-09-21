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
                    $_spec_char = '/[!@#$"£%^&*()_=+{};:,.<>]/'; //a variable with a collection of all the special characters I could think of, I'm sure there's a better way of doing this.

                    if (!preg_match('/[A-Z]/', $_password)) { //checks if an uppercase character doesn't exist in the password variable
                        $_tally --; //takes one off the tally if it doesn't
                        echo "your password must contain at least one uppercase character"; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (!preg_match('/[a-z]/', $_password)) { //checks if a lowercase character doesn't exist in the password variable
                        $_tally --; //takes one off the tally if it doesn't
                        echo "your password must contain at least one lowercase character"; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (!preg_match('/[0-9]/', $_password)) { //checks if the password doesn't contain a number
                        $_tally --; //takes one off the tally if it doesn't
                        echo "your password must contain at least one number"; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (strlen($_password) <= 8) { //checks if the strings length is less than or equal to 8
                        $_tally --; //takes one off the tally if it is
                        echo "Your password must be at least 8 characters long."; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (preg_match('/^[0-9]/', $_password)) { //checks to see if there is a number at the start of the password using ^
                        $_tally --; //takes one off the tally if there is
                        echo "Your password should not start with a number."; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (preg_match($_spec_char, $_password[0])) { //checks if there's a special character at the beginning of the string using the [0]
                        $_tally --; //takes one off the tally if there is
                        echo "Your password should not start with a special character."; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (preg_match($_spec_char, substr($_password, -1))) { /*checks if the last character is a special character. It does this by using the substr() function which
                        returns part of a given string (entered password) I got it to specifically return the last character in the string using the -1 offset which returns x amount at the end of the string */
                        $_tally --; //takes one off the tally if there is
                        echo "Your password should not end with a special character."; //improvement message
                        echo "<br>"; //breakline
                    }
                    if (!preg_match($_spec_char, $_password)) { //checks if password doesn't contain a special character
                        $_tally --; //takes one off the tally if it doesn't
                        echo "Your password must contain at least one special character."; //improvement message
                        echo "<br>"; //breakline
                    }
                    if ($_password === 'password') /* used an absolute comparator to check if password = password*/ {
                        $_tally --; //takes one off the tally if password = password
                        echo "Your password cannot be password or Password."; //improvement message
                        echo "<br>"; //breakline
                    }
                    echo "your password is: " . $_POST['pass']; //prints out the inputted password
                    echo "<br>"; //breakline
                    echo "your score is: " . $_tally . "/9"; //prints out your score is and then the tally variable which is where score is stored
                }
            echo "</div>"; //closes main div
        echo "</div>"; //closes container div
    echo "</body>"; //closes body
echo "</html>"; //closes html

?>