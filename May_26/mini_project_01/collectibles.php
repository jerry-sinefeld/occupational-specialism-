<?php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>";
echo "<head>";
    echo "<title>collectibles</title>";
    echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css"
echo "</head>";

echo "<body>";
    echo "<p>RESIDENT E<span class='seven_color'>VIL</span>COLLECTIBLES GUIDE</p>";
    echo "<p>there are 3 collectibles you'll need to find during your playthroughs:</p>";
echo "<div class='container'>";
    echo "<ol class='coll_ol'>";
        echo "<li>Antique Coins</li>";
        echo "<img width='600' height='280' src='Images/antique_coin.jfif'>";
        echo "<p>there are 18 antique coins on normal and easy mode, these are upped to 32 on madhouse.";
        echo "<li>Files</li>";
        echo "<img width='600' height='380' src='Images/Files_coll.jfif'>";
        echo "<p>there are 32 files across the game to find. these must be found during a single playthrough.";
        echo "<li>Mr Nowhere</li>";
        echo "<img width='600' height='380' src='Images/Mr_everywhere.jpg'>";
        echo "<p>there are 20 mr everywheres spread across the game to find.These are carried from run to run so if you destroy one you won't have to again</p>";
    echo "</ol>";
echo "</div>";
echo "<p>if you would like a more in-depth walkthrough guide then I would suggest <a href='https://m.youtube.com/watch?v=4MgHqXV-OMc&pp=ygUUcmU3IGFsbCBjb2xsZWN0aWJsZXM%3D'>PS5's trophy guide</a>.</p> ";

echo "<p>Now for a pop quiz!";
    echo "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "you chose:" . $_POST["antique"] . "antique";
}
    echo "<form action='' method='post'>";
        echo "<p>how many antique coins are there on normal and easy mode?</p>";
            echo "<input type='radio' name='antique' value='20' required>";
                echo "<label for='20'>20</label>";
            echo "<input type='radio' name='antique' value='32' required>";
                echo "<label for='32'>32</label>";
            echo "<input type='radio' name='antique' value='18' required>";
                echo "<label for='18'>18</label>";






echo "</html>";
?>