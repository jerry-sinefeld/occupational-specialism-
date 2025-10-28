<?php

//OPENS php
session_start();

require_once "assets/staff_common.php";
require_once "assets/db_con.php";

$doc_id = isset($_SESSION["doc_id"]) ? $_SESSION["doc_id"] : null;

// If no doc ID is in the session, they shouldn't be here.
if (!$doc_id) {
    $_SESSION["usermessage"] = "Verification error: Please register first.";
    header("location: staff_reg.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // IMPORTANT: Open the connection ONCE at the start of the POST block.
    $conn = dbconnect_insert();

    if (!$conn) {
        $_SESSION["usermessage"] = "Database connection error. Please try again.";
        header("location: verify.php");
        exit;
    }

    // --- LOGIC 1: USER REQUESTS A NEW CODE ---
    if (isset($_POST["request_code"])) {

        // Pass the open connection ($conn) to the subroutine.
        $auth_code = code_request($conn, $doc_id);

        if ($auth_code) {
            $_SESSION["usermessage"] = "Verification code generated and sent (Code: {$auth_code}). Please enter it below.";
        } else {
            $_SESSION["usermessage"] = "Error generating verification code. Please try again.";
        }

        header("location: verify.php");
        exit;
    }

    // --- LOGIC 2: USER SUBMITS THE VERIFICATION CODE ---
    if (isset($_POST["submit_verification"])) {
        $submitted_code = trim($_POST["auth_code"]);

        if (empty($submitted_code)) {
            $_SESSION["usermessage"] = "Please enter the 8-digit code.";
            $conn = null; // Close connection on form validation error
            header("location: verify.php");
            exit;
        }

        // 1. Validate the code (auth() is assumed to accept $conn)
        if (auth($conn, $submitted_code)) {

            // 2. Code is valid: Activate the doctor's account
            // activate_doctor() is the FINAL step. It should close $conn upon success.
            if (activate_doc($conn, $doc_id)) {

                // 3. SUCCESS: Redirect to index
                $_SESSION["usermessage"] = "Verification successful! You are now active.";
                unset($_SESSION["doc_id"]);

                // $conn is already null here because activate_doctor() closed it.
                header("location: index.php");
                exit;

            } else {
                $_SESSION["usermessage"] = "Verification failed: Could not update user status.";
            }

        } else {
            $_SESSION["usermessage"] = "Verification failed: Code is invalid or has expired.";
        }

        // Connection management for Submission Failure:
        header("location: verify.php");
        exit;
    }

} // End POST handling

// No need for connection management outside the POST block.

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

echo user_message(); // Display user message (code sent/success/error)

// --- FORM 1: REQUEST CODE ---
echo "<form action='' method='post' class='inline-block'>";
echo "<input type='submit' name='request_code' value='Request New Code'>";
echo "</form>";

echo "<br>";

// --- FORM 2: SUBMIT CODE ---
echo "<form action='' method='post'>"; //creates the form and tells the form what to do
echo "<label for='auth_code'>Verification Code:</label>";
echo "<input type='text' name='auth_code' id='auth_code' placeholder='Enter 8-digit code' maxlength='8' required>";
echo "<input type='submit' name='submit_verification' value='Verify'>";
echo "</form>";

echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html
