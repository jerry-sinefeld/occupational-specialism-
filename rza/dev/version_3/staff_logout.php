<?php
session_start();

require_once "assets/staff_common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

auditor(dbconnect_insert(), $_SESSION['employid'], "logout", "staff member has logged out");// TODO: POTENTIAL CHANGE NEEDED

session_destroy();

header("Location: index.php?message=You have been logged out!");