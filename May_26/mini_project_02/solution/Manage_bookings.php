<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Manage bookings</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
        echo "<div class='container'>"; //creates a div with the class of container
            echo "<h1>Manage bookings</h1><br>";
            echo "<div id='main'>"; //creates a div with the id of main
                echo "<div class='links'>";//opens the links class
                    require_once "assets/nav.php"; //opens the nav php file that adds a navbar
                echo "</div>"; //closes links div
                echo "<table class='Booking_table'>";
                    echo "<thead>";//opens the headers of the table
                        echo "<tr>";//opens table row
                            echo "<th>Student name</th>";//header column 1
                            echo "<th>Tutor</th>";//header column 2
                            echo "<th>Subject</th>";//header column 3
                            echo "<th>Date</th>";//header column 4
                        echo "</tr>";//closes table row
                    echo "</thead>";//closes table head
                    echo "<tbody>";//opens the main body of the table
                        echo "<tr>";//opens the row
                            echo "<td>John</td>";//data
                            echo "<td>Julia</td>";//data
                            echo "<td>Maths</td>";//data
                            echo "<td>13/08/25</td>";//data
                            echo "</tr>";//closes table row
                        echo "</tbody>";//closes body
                echo "</table>";//closes table
            echo "</div>"; //closes main div
        echo "</div>"; //closes container div
    echo "</body>"; //closes body
echo "</html>"; //closes html

?>
