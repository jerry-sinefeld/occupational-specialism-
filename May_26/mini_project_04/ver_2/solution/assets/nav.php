<?php

echo "<div class='navi'/>";
    echo "<nav>";
        echo "<ul>";
            echo "<li> <a href='index.php'>home</a></li>";

            if(!isset($_SESSION['user'])) {
                echo "<li> <a href='login.php'>login</a></li>";
                echo "<li> <a href='register.php'>register</a></li>";
            }else {
                echo "<li> <a href='bookings.php'>register console</a></li>";
                echo "<li> <a href='book.php'>logout</a></li>";
                echo "<li> <a href='logout.php'>Logout</a></li>"; //by hiding the tabs you add an extra layer of protection by removing them from an unlogged in user
            }
    echo "</nav>";

echo "</div>";