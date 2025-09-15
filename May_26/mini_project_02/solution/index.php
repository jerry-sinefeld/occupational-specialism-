<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Landing page</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
            echo "<div class='container'>"; //creates a div with the class of container
                echo "<h1>Gibjon Tutoring</h1><br>";
                echo "<div id='main'>"; //creates a div with the id of main
                    echo "<div class='links'>";//opens the links div
                        require_once "assets/nav.php"; //opens the nav php file that adds a navbar
                    echo "</div>";//closes div
                    echo "<img class='Tutor_1' src='images/Tutor.jpg' alt='Tutor'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
                    echo "<div class='flav'>";//opens the flavour div
                        echo "<h2>Welcome To Gibjon Tutoring!</h2>";//another header
                        echo "<p>Here at Gibjon your child’s growth is our number one priority, We believe that creating engaging environments is the best Way to set your child up for continued advancement.</p>";
                    echo "</div>";//closes flavour div
                    echo "<div class='links_boxes'>";//opens the div named link boxes to allow for a custom nav bar
                        echo "<a href='Login.php'>Login</a>";//link to login
                        echo "<a href='Make_booking.php'>Make a booking</a>";//link to make a booking
                        echo "<a href='Manage_bookings.php'>Manage bookings</a>";//link to manage bookings
                    echo "</div>";//closes div
                    echo "<p>Contact Us:</p>";//flavour text
                    echo "<p>+44 74400222</p>";//flavour text
                echo "</div>"; //closes div
            echo "</div>"; //closes div
    echo "</body>"; //closes body
echo "</html>"; //closes html


//closes php
?>
