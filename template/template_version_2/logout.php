<?php

session_start();//start session

require_once "assets/common.php"; //requires these files to run, if they are not present it will not run
require_once "assets/db_con.php"; //requires these files to run, if they are not present it will not run

session_destroy();//destroy session

header("Location: index.php?message=You have been logged out!");//sends user to index and outputs message You have been logged out!