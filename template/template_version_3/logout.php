<?php

session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

try{
auditor(dbconnect_insert(), $_SESSION['userid'], "logout", "User has logged out");// TODO: POTENTIAL CHANGE NEEDED
} catch (PDOException $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: .php');
} catch (Exception $e) {
    $_SESSION['usermessage'] = "ERROR" . $e->getMessage();
    header('Location: .php');
}

session_destroy();

header("Location: index.php?message=You have been logged out!");