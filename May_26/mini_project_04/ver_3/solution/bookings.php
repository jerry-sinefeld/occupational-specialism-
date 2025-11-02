<?php

session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: login.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['appdelete'])) {
        try {
            if (cancel_appt(dbconnect_insert(), $_POST['apptid'])){
                $_SESSION['usermessage'] = "Appointment cancelled.";
                appt_audit(dbconnect_insert(), $_SESSION['userid'], "log", "User has cancelled appointment");
            } else {
                $_SESSION['usermessage'] = "Appointment could not be cancelled.";
            }

        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        } catch (Exception $e){
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        }
    } elseif (isset($_POST['appchange'])) {
        $_SESSION['apptid'] = $_POST['apptid'];
        header("location: change_book.php");
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

echo user_message();

echo "<br>";

echo "<h2>Primary Oaks - Your Bookings</h2>";

echo "<p class='content'> Below are your bookings </p>";
$appts = appt_getter(dbconnect_insert());

if (!$appts){
    echo "no appts found";
} else {
    echo "<table id='bookings'>";

    foreach ($appts as $appt) {
        if ($appt['role'] = "doc") {
            $role = "Doctor";
        }elseif ($appt['role'] = "nur") {
            $role = "Nurse";
        }

        echo "<form action= '' method='post'>"; // creating a form for each entry in the table

        echo "<tr>";
        echo "<td> Appt time:" . date('M d, Y @ h:i A', $appt['app_time']) . "</td>";
        echo "<td> Made on:" . date('M d, Y @ h:i A' , $appt['app_date']) . "</td>";
        echo "<td> With:" . $role . " " . $appt['name'] . " " . $appt['lname'] . "</td>";
        echo "<td> In Room : "  . $appt['room_numb'] . "</td>";
        echo "<td> Reason : "  . $appt['app_reason'] . "</td>";
        echo "<td><input type='hidden' name='apptid' value=".$appt['app_id'] . ">
            <input type='submit' name='appdelete' value='Cancel appt' />
            <input type='submit' name='appchange' value='Change appt' /></td>";

        echo "</tr>";
        echo "</form>";
    }

}
echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html