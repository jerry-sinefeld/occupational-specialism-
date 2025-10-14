<?php
session_start();

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

auditor(dbconnect_insert(), $_SESSION['userid'], "logout", "User has logged out");

session_destroy();

header("Location: index.php?message=You have been logged out!");