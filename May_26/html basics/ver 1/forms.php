<?php

echo "<!DOCTYPE html>";

echo "<html>"; // opens html

echo "<head>";// opens head
    echo "<link rel='stylesheet' href='CSS/styles.css'>";
echo "</head>"; // closes head

echo "<body>"; // opens body
    echo "<form action='' method='post'>";
    echo "<label for='num'>No.of tickets:</label>";
    echo "<input type='text' name='num' id='num' placeholder= 'number of tickets' required>";
    echo "<br>";
    echo "<br>";

    echo "<label for='pass'>please enter your password:</label>";
    echo "<input type='password' name='password' id='pass' placeholder= 'password' required>";
    echo "<br>";
    echo "<br>";

    echo "<p>how old are you?</p>";
    echo "<input type='radio' id ='age_choice3' name='age3' value='3'>";
    echo "<label for='age_choice'>3</label> <br>";
    echo "<input type='radio' id ='age_choice4' name='age4' value='4'>";
    echo "<label for='age_choice'>4</label> <br>";
    echo "<input type='radio' id ='age_choice5' name='age5' value='5'>";
    echo "<label for='age_choice'>5</label> <br>";

    echo "<p> are you happy with being bald?</p>";
    echo "<input type='checkbox' id ='bald?' name='are_u_bald' value='yes'>";
    echo "<label for='bald?'>Yes</label> <br>";
    echo "<input type='checkbox' id ='not_bald' name='has_hair' value='yes very'>";
    echo "<label for='not_bald'>Yes very</label> <br>";
    echo "<br>";
    echo "<p> how many years have you been bald?</p>";
    echo "<label for='quantity'>Age</label> ";
    echo "<input type='number'id='quantity' name='quantity' min='1' max='5'>";
    echo "<br>";
    echo "<br>";
    echo "<input type='submit' name='submit' value='Login'>";
    echo "</form>";
echo "</body>"; // closes body


echo "</html>";



?>