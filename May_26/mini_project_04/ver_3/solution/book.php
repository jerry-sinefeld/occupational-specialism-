<?php

session_start();
require_once "assets/common.php";
require_once "assets/db_con.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){//this block must always be at the top so that headers/redirects can be used successfully

    try {
        $tmp = $_POST["adate"] . ' ' . $_POST["atime"];
        $epoch_time = strtotime($tmp);
        /*the line above could be placed inside the brackets here however if your server is overloaded
 then the processing to do this can cause issues due to it receiving the request to transfer a string to a time that has not been created yet so we create
     the string before beginning the transfer to a time */
        if (commit_booking(dbconnect_insert(), $epoch_time)){
            $_SESSION['usermessage'] = "SUCCESS: YOUR BOOKING HAS BEEN CREATED!";
            appt_audit(dbconnect_insert(), $_SESSION['userid'], "log", "User has created a booking");
            header("Location: bookings.php");
            exit;
        } else {
            $_SESSION['usermessage'] = "ERROR: YOUR BOOKING HAS FAILED!";
        }
    }
    catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR:". $e->getMessage();
    } catch (PDOException $e) {
        $_SESSION['usermessage'] = "ERROR:". $e->getMessage();
    }
    echo $epoch_time;
    echo "<br>";
    echo time();
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


    echo "<form method='post' action=''>";

    $staff = staff_getter(dbconnect_insert());

    echo "<label for ='adate'>Appointment date</label>";
    echo "<input type='date' name='adate' value='" . date("Y-m-d") . "'>";

    echo "<br>";

    echo "<br>";

    echo "<label for ='atime'>Appointment time</label>";
    echo "<input type='time' name='atime' value='" . date("H:i") . "'>";

    echo "<br>";

    echo "<select name='staff'>";

    foreach ($staff as $staf) {//dropdown menu

        if ($staf ['role'] = 'doc') {
            $role = 'Doctor';
        } else if ($staf ['role'] = 'nur') {
            $role = 'Nurse';
        }
        echo "<option value ='" . $staf ['doc_id'] . "'>" . $role . " ". $staf['name']." ".
            $staf['lname']. " " . "Room". " "  . $staf['room_numb']. "</option>";
    }

    echo "</select>";

    echo "<br>";

    echo "<label for='app_reason'>Appointment Reason </label>";
    echo "<input type='text' name='app_reason' placeholder='Appointment reason'>";

    echo "<br>";

    echo "<input type='submit' name='submit' value='Submit'>";

    echo "</form>";

    echo "</div>";

    echo "</div>";

    echo "</body>";
    echo "</html>";