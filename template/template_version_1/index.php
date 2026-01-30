<?php
//OPENS php
if (!isset($_GET["message"])) { //checks if the message parameter is missing from the URL
    session_start(); //starts the session if no message is found and declares message as false
    $message = false; //message is declared as false
} else {
    // decodes the message for display
    $message = htmlspecialchars(urldecode($_GET["message"]));/*url decode converts URL encoded characters back into readable text and htmlspecialchars converts
    special characters such as < and > to prevent scripting via the URL*/
}

require_once "assets/common.php";// requires these files to run if they are not present the code will not run
require_once "assets/db_con.php";// requires these files to run if they are not present the code will not run

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title// TODO: POTENTIAL CHANGE NEEDED
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";// requires these files to run if they are not present the code will not run
require_once "assets/nav.php";// requires these files to run if they are not present the code will not run
echo "<div id='main'>"; //opens a div with the id of main this allows for customization
echo "<h1></h1>";// TODO: POTENTIAL CHANGE NEEDED //header
echo "<p> </p>";// TODO: POTENTIAL CHANGE NEEDED //flavour text
echo "<br>"; //break
echo "<h1>  </h1>";// TODO: POTENTIAL CHANGE NEEDED //header
echo "<p></p>";// TODO: POTENTIAL CHANGE NEEDED //flavour text
echo "<br>";//break
echo "<h1></h1>";// TODO: POTENTIAL CHANGE NEEDED//header
echo "<p> </p>";// TODO: POTENTIAL CHANGE NEEDED//flavour text

if (!$message) {// if there is no message
    echo user_message();// output the usermessage
} else { //if not
    echo $message;// display the message
}

try {
    $conn = dbconnect_insert();// checks if the connection to
    echo "success";// if connection is successful
} catch (PDOException $e) {//if unsuccessful catch the database error and display it
    echo $e->getMessage();//display the error
}

// ^ for testing purposes
echo "</div>";//close the div main
echo "</div>";//closes the div container
require_once "assets/bottombar.php";// requires these files to run if they are not present the code will not run
echo "</body>";//closes body
echo "</html>"; //closes html