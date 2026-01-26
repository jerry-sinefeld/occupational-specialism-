<?php
session_start();
require_once "assets/common.php";
require_once "assets/db_con.php";


if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: login.php");
    exit;
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {//this block must always be at the top so that headers/redirects can be used successfully

    try {
        $tmp = $_POST["adate"] . ' ' . $_POST["atime"];
        $epoch_time = strtotime($tmp);
        /* then the processing to do this can cause issues due to it receiving the request to transfer a string to a time that has not been created yet so we create
     the string before beginning the transfer to a time */

        if (book_update(dbconnect_insert(), $_SESSION['book_id'], $epoch_time)) {
            $_SESSION['usermessage'] = "SUCCESS: YOUR BOOKING HAS BEEN CHANGED!";
            auditor(dbconnect_insert(), $_SESSION['userid'], "log", "User has changed a booking");
            unset($_SESSION['book_id']);
            header("Location: bookings.php");
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: YOUR BOOKING HAS FAILED TO UPDATE!";
            unset($_SESSION['book_id']);
            header("Location: bookings.php");
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR:" . $e->getMessage();
    }
}
echo "<!DOCTYPE html>";

echo "<html>";

echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";


$booking = book_fetch(dbconnect_insert(), $_SESSION['book_id']); //should be a try catch around this as we are calling to a subroutine that might fail

echo "<form method='post' action=''>";

$staff = staff_getter(dbconnect_insert());

$book_time = date("H:i:s", $booking['book_time']);
$book_date = date("Y-m-d", $booking['book_time']);


echo "<label for ='atime'>Appointment time</label>";
echo "<input type='time' name='atime' value='" . $book_time . "' required>";
echo "<br>";
echo "<label for ='adate'>Appointment date</label>";
echo "<input type='date' name='adate' value='" . $book_date . "' required>";

echo "<br>";

echo "<select name='staff'>";

foreach ($staff as $staf) {//dropdown menu

    if ($staf ['active'] == '1') {
        $state = 'active';
    } else if ($staf ['active'] == '0') {
        $state = 'inactive';
    }
    if ($booking ['[staff session name]'] == $staf ['[staff session name]']) {
        $selected = "selected";
    } else {
        $selected = "";
    }
    echo "<option value =" . $staf ['[staff session name]'] . " " . $selected . ">" . $state . " " . $staf['fname'] . " " .
        $staf['lname'] . " " . "</option>";
}

echo "</select>";

echo "<br>";

echo "<label for='book_reason'>Appointment Reason </label>";
echo "<input type='text' name='book_reason' value='" . $booking['book_reason'] . "'>";

echo "<br>";

echo "<input type='submit' name='submit' value='Update'>";

echo "</form>";

echo "</div>";

echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>";