<?php //opens php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
        echo "<div class='container'>"; //creates a div with the class of container
            echo "<h1>Make a booking</h1><br>"; //heading
            echo "<div id='main'>"; //creates a div with the id of main
                if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
                    echo "Your childs name is:" . $_POST["childs_name"]; //posts email entered
                    echo "<br>"; //breakline
                    echo "Your Tutors name:" . $_POST["Tutor_name"]; //posts password
                    echo "<br>";//breakline
                    echo "Your Childs DOB is:" . $_POST["DOB"];//posts DOB
                    echo "<br>";//breakline
                    echo "The Tutor can teach:" . $_POST["Tutor_subject"]; //posts tutor subject
                    echo "<br>";//breakline
                    echo "The subject you have chosen for your Child is:" . $_POST["childs_subject"]; //posts childs subject
                    echo "<br>";//breakline
                    echo "The hours the Tutor is available are:" . $_POST["Tutor_hours"]; //posts hours of tutors availability
                }
                echo "<div class='links'>";//opens the links class
                    require_once "Assets/nav.php"; //opens the nav php file that adds a navbar
                echo "</div>";//closes the div
                echo "<form method='post' action=''>";//creates a form with the intention to post
                echo "<table>"; //opens table
                    echo "<tr><td>Childs Name</td><td><input type='text' name='childs_name' id='childs_name' placeholder= 'enter your name' required></td>"; //creates the form inputs inside a table
                    echo "<td>Tutor Name</td><td><input type='text' name='Tutor_name' id='Tutor_name' placeholder= 'Choose an available tutor' required></td>";//creates the form inputs inside a table
                    echo "</tr>";//closes the table row
                    echo "<tr><td>D.O.B</td><td><input type='text' name=DOB id='DOB' placeholder= 'enter childs DOB' required></td>";//creates the form inputs inside a table
                    echo "<td>Tutor Subject</td><td><input type='text' name='Tutor_subject' id='Tutor_subject' placeholder= 'Choose the subject you want' required></td>";//creates the form inputs inside a table
                    echo "</tr>";//closes the table row
                    echo "<tr><td>Childs Subject</td><td><input type='text' name='childs_subject' id='childs_subject' placeholder= 'Choose the subject you want' required></td>";//creates the form inputs inside a table
                    echo "<td>Tutor Hours</td><td><input type='text' name='Tutor_hours' id='Tutor_hours' placeholder= 'Hours Tutor is available' required></td>";//creates the form inputs inside a table
                    echo "</tr>";//closes the table row
                        echo "<tr><td></td><td></td><td><input type='submit' name='Submit' value='Submit'></td><td></td>"; //creates the Login box and moves it to the center of the table
                        echo "</tr>";//closes the table row
                echo "</table>";//closes table
                echo "</form>";//closes form
            echo "</div>"; //closes div
        echo "</div>"; //closes div
    echo "</body>"; //closes body
echo "</html>"; //closes html














?>
