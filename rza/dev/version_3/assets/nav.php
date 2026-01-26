<?php

echo "<div class='navi'/>";
echo "<nav>";
echo "<ul>";
echo "<li> <a href='index.php'>Home</a></li>";
echo "<li> <a href='info_page_1.php'>EV Chargers</a></li>"; //link to EV chargers page// TODO: POTENTIAL CHANGE NEEDED
echo "<li> <a href='info_page_2.php'>Smart Meters</a></li>"; //link to smart meter page// TODO: POTENTIAL CHANGE NEEDED
echo "<li> <a href='info_page_3.php'>Solar Panels</a></li>"; //link to solar panels page// TODO: POTENTIAL CHANGE NEEDED

if(isset($_SESSION['[staff session name]']) AND $_SESSION['active'] == 1) {// TODO: POTENTIAL CHANGE NEEDED //checks if the session has an active engineer in it, active meaning they have been through the 2fa process
    echo "<li> <a href='staff_bookings.php'>Staff Bookings</a></li>";
    echo "<li> <a href='staff_logout.php'>Logout</a></li>";
}
elseif (isset($_SESSION['userid'])){// TODO: POTENTIAL CHANGE NEEDED
    echo "<li> <a href='logout.php'>Logout</a></li>"; //by hiding the tabs you add an extra layer of protection by removing them from an unlogged in user
    echo "<li> <a href='book.php'>Make a booking</a></li>";
    echo "<li> <a href='bookings.php'>View a booking</a></li>";
}
else{
    echo "<li> <a href='login.php'>Login</a></li>"; //link to login page
    echo "<li> <a href='reg.php'>Register</a></li>"; //link to user register page
}
echo "</nav>";

echo "</div>";