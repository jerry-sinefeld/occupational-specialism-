<?php

session_start();

require_once "assets/staff_common.php";
require_once "assets/db_con.php";

if (!isset($_SESSION['[staff session name]'])) {
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: staff_login.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['bookdelete'])) {
        try {
            if (cancel_book(dbconnect_insert(), $_POST['book_id'])) {
                $_SESSION['usermessage'] = "Appointment cancelled.";
                auditor(dbconnect_insert(), $_SESSION['[staff session name]'], "log", "Staff has cancelled appointment");
            } else {
                $_SESSION['usermessage'] = "Appointment could not be cancelled.";
            }
        } catch (PDOException $e) {
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        } catch (Exception $e) {
            $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        }
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

echo usermessage();

echo "<br>";

echo "<h2>Rolsa Technologies - Your Bookings</h2>";

echo "<p class='content'> Below are your bookings </p>";
$books = book_getter(dbconnect_insert());

if (!$books) {
    echo "no bookings found";
} else {
    echo "<table id='bookings'>";

    foreach ($books as $book) {
        echo "<form action= '' method='post'>"; // creating a form for each entry in the table

        echo "<tr>";
        echo "<td> Appt time:" . date('M d, Y @ h:i A', $book['book_time']) . "</td>";
        echo "<td> Made on:" . date('M d, Y @ h:i A', $book['book_date']) . "</td>";
        echo "<td> With:" . " " . $book['fname'] . " " . $book['lname'] . "</td>";
        echo "<td> Reason : " . $book['book_reason'] . "</td>";
        echo "<td><input type='hidden' name='book_id' value=" . $book['book_id'] . ">
            <input type='submit' name='bookdelete' value='Cancel booking' </td>";
        echo "</tr>";
        echo "</form>";
    }
}

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>"; //closes html
