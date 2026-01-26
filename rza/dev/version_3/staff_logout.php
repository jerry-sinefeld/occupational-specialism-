<?php
session_start();

require_once "assets/staff_common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

auditor(dbconnect_insert(), $_SESSION['[staff session name]'], "logout", "Engineer has logged out");

session_destroy();

header("Location: index.php?message=You have been logged out!");