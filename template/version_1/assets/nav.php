<?php

echo "<div class='navi'/>";
    echo "<nav>";
        echo "<ul>";
            if(!isset($_SESSION['user'])) {
                echo "<li> <a href='link_1'>Login</a></li>";
                echo "<li> <a href='link_2'>Register</a></li>";
            }else {
                echo "<li> <a href='link_3'>link3</a></li>";
                echo "<li> <a href='link_4'>link4</a></li>";
            }
        echo "</ul>";
    echo "</nav>";

echo "</div>";