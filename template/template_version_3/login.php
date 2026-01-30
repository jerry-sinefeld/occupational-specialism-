<?php
//OPENS php
session_start();//starts session

require_once "assets/db_con.php";// requires these files to run if they are not present the code will not run
require_once "assets/common.php";// requires these files to run if they are not present the code will not run

if (isset($_SESSION['userid'])) {//checks if user is already logged in if so it directs you to the index page// TODO: POTENTIAL CHANGE NEEDED
    $_SESSION['usermessage'] = "You are already logged in";// display the message
    header('Location: index.php'); //headers only work if no content has loaded on the page
    exit; //by forcing the exit it stops anything from being loaded before redirecting, allowing redirection
}
elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {// posts data
    try {//added a try catch in order to increase robustness in my code
        $usr = login(dbconnect_insert(), $_POST["username"]);//runs the login function and returns username

        if ($usr) {// if the usr function matches the stored username
            $_SESSION['userid'] = $usr['userid'];// TODO: POTENTIAL CHANGE NEEDED //sets the session id as the id stored in usr
            $_SESSION['usermessage'] = "You are logged in";// display the message
            auditor(dbconnect_insert(), $_SESSION['userid'], "log", "User has logged in");// TODO: POTENTIAL CHANGE NEEDED //sets the log in the audit table of when a user logged in
            header('Location: index.php');// sends user to index
            exit;// when doing a header you need an exit so the code in the rest of the page does not a run and cause issues
        } else {// if the details don't match
            $_SESSION['usermessage'] = "Incorrect password";// display the message
            header('Location: login.php');// reopen login
            exit;// when doing a header you need an exit so the code in the rest of the page does not a run and cause issues
        }
        } catch (PDOException $e) {//catch the database error
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage(); // set message as error followed by the PDO
            header('Location: login.php');// sends user to login
        } catch (Exception $e) {//catch any other error
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage(); // set message as error followed by the error message
            header('Location: login.php');// sends user to login
        }
}
echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>Login</title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";//opens the div container
require_once "assets/topbar.php";// requires these files to run if they are not present the code will not run
require_once "assets/nav.php";// requires these files to run if they are not present the code will not run
echo "<div id='main'>";//opens the div main
echo "<h1></h1><br>";// TODO: POTENTIAL CHANGE NEEDED //welcome header
echo "<h2>Login</h2>";//header
echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='username'>Username:</label>"; //creates the name text box and what it contains// TODO: POTENTIAL CHANGE NEEDED
echo "<input type='text' name='username' id='username' placeholder= 'enter your username' required>"; //creates the name field// TODO: POTENTIAL CHANGE NEEDED
echo "<br>";//break
echo "<label for='password'>Password:</label>"; //creates the name text box and what it contains// TODO: POTENTIAL CHANGE NEEDED
echo "<input type='text' name='password' id='password' placeholder= 'enter your password' required>"; //creates the name field// TODO: POTENTIAL CHANGE NEEDED
echo "<br>";//break
echo "<input type='submit' name='submit' value='submit'>";//submit button
echo "</form>";//close form


echo "</div>";//close main div
echo "</div>";//closes the div container
require_once "assets/bottombar.php";// requires these files to run if they are not present the code will not run
echo "</body>";//closes body
echo "</html>"; //closes html