<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Manage bookings</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
        echo "<div class='container'>"; //creates a div with the class of container
            echo "<h1>Manage bookings</h1><br>";
            echo "<div id='main'>"; //creates a div with the id of main
                echo "<div class='links'>";
                    require_once "Assets/nav.php"; //opens the nav php file that adds a navbar
                echo "</div>"; //closes links div
                echo "<table class='Booking_table'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Student name</th>";
                            echo "<th>Tutor</th>";
                            echo "<th>Subject</th>";
                            echo "<th>Date</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                        echo "<tr>";
                            echo "<td>John</td>";
                            echo "<td>Julia</td>";
                            echo "<td>Maths</td>";
                            echo "<td>13/08/25</td>";
                            echo "</tr>";
                        echo "</tbody>";
                echo "</table>";
            echo "</div>"; //closes main div
        echo "</div>"; //closes container div
    echo "</body>"; //closes body
echo "</html>"; //closes html

?>
