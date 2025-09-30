<?php //opens php

echo "<!DOCTYPE html>"; // declares doctype

echo "<html>"; // opens html

echo "<head>";// opens head
    echo "<link rel='stylesheet' href='css/styles.css'>"; //opens the stylesheet css which contains all clarifications for style
echo "</head>"; // closes head

echo "<body>"; // opens body
if ($_SERVER["REQUEST_METHOD"] == "POST") /*requests the server to post the inputted*/ {
    echo "your name:" . $_POST["num"] ; //posts name
    echo "<br>"; //breakline
    echo "your email:" . $_POST["email"] ; //posts code
    echo "<br>"; //breakline
    echo "your password:" . $_POST["password"] ; //posts password
    echo "<br>"; //breakline
    echo "your age:" . $_POST["age"] ; //posts radio
    echo "<br>"; //breakline
    echo "your happiness with your baldness:" . $_POST["are_u_bald"] ; //posts the checkbox
    echo "<br>"; // breakline
    echo "your years of service as a baldy:" . $_POST["quantity"] ; //posts numerical choice

}
    echo "<form action='' method='post'>"; //creates the form and tells the form what to do
    echo "<label for='num'>Name:</label>"; //creates the name text box and what it contains
    echo "<input type='text' name='num' id='num' placeholder= 'enter your name' required>"; //creates the name field
    echo "<br>"; //breakline
    echo "<br>"; //breakline
    echo "<input type='email' name='email' placeholder='Email'/>"; //creates the email field
    echo "<br>"; //breakline
    echo "<label for='pass'>please enter your password:</label>"; //creates the password box
    echo "<br>"; //breakline
    echo "<input type='password' name='password' id='pass' placeholder= 'password' required>"; //creates the password field
    echo "<br>"; //breakline
    echo "<br>"; //breakline

    echo "<p>how old are you?</p>"; //asks question
            echo "<input type='radio' id='age_choice3' name='age' value='3'>"; //creates the 3 option
        echo "<label for='age_choice3'>3</label> <br>"; // labels the option
            echo "<input type='radio' id='age_choice4' name='age' value='4'>"; // creates the 4 option
        echo "<label for='age_choice4'>4</label> <br>"; //labels the option
            echo "<input type='radio' id='age_choice5' name='age' value='5'>"; // creates the 5 option
    echo "<label for='age_choice5'>5</label> <br>"; // labels the option

    echo "<p> are you happy with being bald?</p>"; //asks question
    echo "<input type='checkbox' id ='bald?' name='are_u_bald' value='yes' required>"; //creates the tickbox
    echo "<label for='bald?'>Yes</label> <br>"; //adds the statement beside it
    echo "<input type='checkbox' id ='not_bald' name='are_u_bald' value='yes very' required>"; //creates the tickbox
    echo "<label for='not_bald'>Yes very</label> <br>"; //adds the statement beside it
    echo "<br>"; //breakline
    echo "<p> how many years have you been bald?</p>";
    echo "<label for='quantity'>Age</label> "; //adds the statement beside it
    echo "<input type='number'id='quantity' name='quantity' min='1' max='5' required>"; //creates the number box
    echo "<br>"; //breakline
    echo "<br>"; //breakline
    echo "<input type='submit' name='submit' value='Submit'>"; //creates the submit box
    echo "</form>"; //closes the form
echo "</body>"; // closes body


echo "</html>"; //closes html

//closes php
?>