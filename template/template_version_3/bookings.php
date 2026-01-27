<?php
session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

if (!isset($_SESSION['userid'])) {// TODO: POTENTIAL CHANGE NEEDED
    $_SESSION['usermessage'] = "ERROR: You are not logged in.";
    header("location: login.php");
    exit;
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
    if (isset($_POST['bookdelete'])) {
            if (cancel_book(dbconnect_insert(), $_POST['book_id'])) {// TODO: POTENTIAL CHANGE NEEDED
                $_SESSION['usermessage'] = "Appointment cancelled.";
                auditor(dbconnect_insert(), $_SESSION['userid'], "log", "User has cancelled appointment");// TODO: POTENTIAL CHANGE NEEDED
            } else {
                $_SESSION['usermessage'] = "Appointment could not be cancelled.";
            }
    } elseif (isset($_POST['bookchange'])) {
        $_SESSION['book_id'] = $_POST['book_id'];// TODO: POTENTIAL CHANGE NEEDED
        header("location: change_booking.php");
        exit;
    }
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        header('Location: bookings.php');
    } catch (Exception $e) {
        $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
        header('Location: bookings.php');
    }
}
echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title></title>"; //opens and writes title// TODO: POTENTIAL CHANGE NEEDED
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";

try{
echo user_message();
} catch (PDOException $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');/* sending back to index because if we just reloaded the page the user would be put in an infinite loop with no way of
seeing the error*/
} catch (Exception $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');/* sending back to index because if we just reloaded the page the user would be put in an infinite loop with no way of
seeing the error*/
}

echo "<br>";

echo "<h2>Rolsa Technologies - Your Bookings</h2>";// TODO: POTENTIAL CHANGE NEEDED

echo "<p class='content'> Below are your bookings </p>";

try{
$books = book_getter(dbconnect_insert());
} catch (PDOException $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');
} catch (Exception $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');
}

if (!$books) {
    echo "no bookings found";
} else {
    echo "<table id='bookings'>";

    foreach ($books as $book) {
        echo "<form action= '' method='post'>"; // creating a form for each entry in the table

        echo "<tr>";
        echo "<td> Appt time:" . date('M d, Y @ h:i A', $book['book_time']) . "</td>"; // TODO: POTENTIAL CHANGE NEEDED
        echo "<td> Made on:" . date('M d, Y @ h:i A', $book['book_date']) . "</td>"; // TODO: POTENTIAL CHANGE NEEDED
        echo "<td> With:" . " " . $book['fname'] . " " . $book['lname'] . "</td>"; // TODO: POTENTIAL CHANGE NEEDED
        echo "<td> Reason : " . $book['book_reason'] . "</td>";// TODO: POTENTIAL CHANGE NEEDED
        echo "<td><input type='hidden' name='book_id' value=" . $book['book_id'] . ">
            <input type='submit' name='bookdelete' value='Cancel booking' /> 
            <input type='submit' name='bookchange' value='Change booking' /></td>";
        echo "</tr>";
        echo "</form>";
    }
}

echo "</div>";

echo "</div>";

echo "</body>";

echo "</html>"; //closes html
