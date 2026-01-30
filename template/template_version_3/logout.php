<?php

session_start();//start session

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

try{//added a try catch in order to increase robustness in my code
auditor(dbconnect_insert(), $_SESSION['userid'], "logout", "User has logged out");// TODO: POTENTIAL CHANGE NEEDED //sets the log in the audit table of when a user logged in
} catch (PDOException $e) {//catch the database error
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();// set message as error followed by the PDO
    header('Location: .php');// sends user to login
} catch (Exception $e) {//catch any other error
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();// set message as error followed by the error message
    header('Location: .php');// sends user to login
}

session_destroy();//destroy session

header("Location: index.php?message=You have been logged out!");//sends user to index and outputs message You have been logged out!