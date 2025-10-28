<?php

echo "<div class='navi'/>";
    echo "<nav>";
        echo "<ul>";
            echo "<li> <a href='index.php'>Home</a></li>";

            if(!isset($_SESSION['user'])) {
                echo "<li> <a href='login.php'>Login</a></li>";
                echo "<li> <a href='register.php'>Register</a></li>";
                echo "<li> <a href='staff_reg.php'>Register staff</a></li>";
            }
            elseif (check_active(dbconnect_insert()) == True) {
                echo "<li> <a href='staff_bookings.php'>View appointments</a></li>";
                echo "<li> <a href='staff_change.php'>Change details</a></li>";
                echo "<li> <a href='staff_log.php'>Activity log</a></li>";
                echo "<li> <a href='logout.php'>Logout</a></li>";
            }else {
                echo "<li> <a href='bookings.php'>View Bookings</a></li>";
                echo "<li> <a href='book.php'>Make a booking</a></li>";
                echo "<li> <a href='change.php'>Change details</a></li>";
                echo "<li> <a href='log.php'>Activity log</a></li>";
                echo "<li> <a href='logout.php'>Logout</a></li>"; //by hiding the tabs you add an extra layer of protection by removing them from an unlogged in user
            }
    echo "</nav>";

echo "</div>";