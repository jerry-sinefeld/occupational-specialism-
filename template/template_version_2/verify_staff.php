<?php
//OPENS php
session_start();

require_once "assets/staff_common.php";
require_once "assets/db_con.php";

$[staff session name] = $_SESSION["[staff session name]"] ?? null; // if this value exists use it otherwise null// TODO: POTENTIAL CHANGE NEEDED
if (!$[staff session name]) {// TODO: POTENTIAL CHANGE NEEDED
    $_SESSION["usermessage"] = "Verification error: Please register first.";
    header("location: staff_reg.php"); //checks if there is a doc ID in the session and if there isn't it redirects you to the regsiter page
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = dbconnect_insert();
    if (!$conn) {
        $_SESSION["usermessage"] = "Database connection error. Please try again.";
        header("location: verify_staff.php");
        exit;
    }

    if (isset($_POST["request_code"])) {
        $auth_code = code_request($conn, $[staff session name]);// TODO: POTENTIAL CHANGE NEEDED
        if ($auth_code) {
            $_SESSION["usermessage"] = "Verification code generated and sent (Code: {$auth_code}). Please enter it below.";
        } else {
            $_SESSION["usermessage"] = "Error generating verification code. Please try again.";
        }
        header("location: verify_staff.php");
        exit;
    }

    if (isset($_POST["submit_verification"])) {
        $submitted_code = $_POST["auth_code"];
        if (empty($submitted_code)) {//input sanitization to check they have inputted anything into the code field and if they haven't it reloads the page
            $_SESSION["usermessage"] = "Please enter the 8-digit code.";
            $conn = null; // Close connection on form validation error
            header("location: verify_staff.php");
            exit;
        }

        if (auth($conn, $submitted_code)) {//authenticates
            if (activate_engin($conn, $[staff session name])) {//sets staff as active// TODO: POTENTIAL CHANGE NEEDED
                $_SESSION["usermessage"] = "Verification successful! You are now active.";
                header("location: index.php");
                exit;
            } else {
                $_SESSION["usermessage"] = "Verification failed: Could not update user status.";
            }
        } else {
            $_SESSION["usermessage"] = "Verification failed: Code is invalid or has expired.";
        }

        // Connection management for Submission Failure:
        header("location: verify_staff.php");
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
require_once "assets/topbar.php";//requires these files to run, if they are not present it will not run
echo "<div id='main'>";
echo "<h1>Staff verify</h1><br>";
echo "<h2>Verification</h2>";

echo usermessage(); // Display user message

echo "<form action='' method='post'>";
echo "<input type='submit' name='request_code' value='Request New Code'>";
echo "</form>";
echo "<br>";
echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='auth_code'>Verification Code:</label>";
echo "<input type='text' name='auth_code' id='auth_code' placeholder='Enter 8-digit code' maxlength='8' required>";
echo "<input type='submit' name='submit_verification' value='Verify'>";
echo "</form>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html