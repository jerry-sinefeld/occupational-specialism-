<?php

echo "<div class='navi'/>";
echo "<nav>";
echo "<ul>";
echo "<li> <a href='index.php'>Home</a></li>";

if(isset($_SESSION['enginid']) AND $_SESSION['active'] == 1) { //checks if the session has an active engineer in it, active meaning they have been through the 2fa process
    echo "<li> <a href='logout.php'>Logout</a></li>";
}
elseif (!isset($_SESSION['userid'])) {
    echo "<li> <a href='login.php'>Login</a></li>"; //link to login page
    echo "<li> <a href='reg.php'>Register</a></li>"; //link to user register page
    echo "<li> <a href='staff_reg.php'>Register staff</a></li>";//only present for testing purposes, the final product would not have either of these in it
    echo "<li> <a href='staff_login.php'>Staff login</a></li>"; //only present for testing purposes, the final product would not have either of these in it


}else {
    echo "<li> <a href='logout.php'>Logout</a></li>"; //by hiding the tabs you add an extra layer of protection by removing them from an unlogged in user
}
echo "</nav>";

echo "</div>";