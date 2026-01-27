<?php
session_start();

require_once "assets/staff_common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

try{
auditor(dbconnect_insert(), $_SESSION['[STAFF ID]'], "logout", "Engineer has logged out");// TODO: POTENTIAL CHANGE NEEDED
} catch (PDOException $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');/* sending back to index because if we just reloaded the page the user would be put in an infinite loop with no way of
seeing the error*/
} catch (Exception $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: index.php');/* sending back to index because if we just reloaded the page the user would be put in an infinite loop with no way of
seeing the error*/
}

session_destroy();

header("Location: index.php?message=You have been logged out!");