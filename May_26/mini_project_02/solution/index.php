<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Landing page</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
            echo "<div class='container'>"; //creates a div with the class of container
                echo "<h1>Gibjon Tutoring</h1><br>";
                echo "<div id='main'>"; //creates a div with the id of main
                    echo "<div class='links'>";
                        require_once "Assets/nav.php"; //opens the nav php file that adds a navbar
                    echo "</div>";
                    echo "<img class='Tutor_1' src='Images/Tutor.png' alt='Tutor'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
                    echo "<div class='flav'>";
                        echo "<h2>Welcome To Gibjon Tutoring!</h2>";
                        echo "<p>Here at Gibjon your child’s growth is our number one priority, We believe that creating engaging environments is the best Way to set your child up for continued advancement.</p>";
                    echo "</div>";
                    echo "<div class='links_boxes'>";
                        echo "<a href='Login.php'>Login</a>";
                        echo "<a href='Make_booking.php'>Make a booking</a>";
                        echo "<a href='Manage_bookings.php'>Manage bookings</a>";
                    echo "</div>";
                    echo "<p>Contact Us:</p>";
                    echo "<p>+44 74400222</p>";
                echo "</div>"; //closes div
            echo "</div>"; //closes div
    echo "</body>"; //closes body
echo "</html>"; //closes html



?>
