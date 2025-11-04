<?php
session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

if (!isset($_SESSION['userid'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: login.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['detchange'])) {
        $_SESSION['userid'] = $_POST['userid'];
        header("location: update_staff_details.php");
        exit;
    } elseif (isset($_POST['passchange'])) {
        $_SESSION['userid'] = $_POST['userid'];
        header("location: change_staff_pass.php");
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

echo "<p class='content'> Below are your logs </p>";
$logs = log_fetch(dbconnect_insert());

if (!$logs){
    echo "no logs found";
} else {
    echo "<table id='user_logs'>";

    foreach ($logs as $log) {
        if ($log['role'] = "doc") {
            $role = "Doctor";
        }elseif ($log['role'] = "nur") {
            $role = "Nurse";
        }
        echo "<form action= '' method='post'>"; // creating a form for each entry in the table
        echo "<tr>";
        echo "<td> Date : "  . $log['date'] . "</td>";
        echo "<td>  Description : "  . $log['longdesc'] . "</td>";
        echo "<td><input type='hidden' name='audtid' value=".$log['doc_id'] . ">
            <input type='submit' name='detchange' value='Change details' />
            <input type='submit' name='passchange' value='Change Password' /></td>";
        echo "</tr>";
        echo "</form>";
    }

}
echo "</div>";
echo "</div>";
echo "</body>";
echo "</html>"; //closes html