<?php //OPENS PHP

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>";//opens html
echo "<head>";//opens head
    echo "<title>collectibles</title>"; //opens and writes title
    echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css"
echo "</head>";//closes head

echo "<body>";//opens body
    echo "<p>RESIDENT E<span class='seven_color'>VIL</span>COLLECTIBLES GUIDE</p>";//opening paragraph that I use as a semi title, this contains the span tag which allows you to color chosen words and/or letters
    echo "<p>To the <a href='index.php'>landing page</a></p>"; //link to landing page
    echo "<p>there are 3 collectibles you'll need to find during your playthroughs:</p>"; //content
echo "<div class='container'>"; //creates a div and gives it a class so I can apply this specific layout to chosen divs
    echo "<ol class='coll_ol'>"; //creates an ordered list with a name to be referenced in the css
        echo "<li>Antique Coins</li>"; //created a placeholder in the list which won't be displayed to the user
        echo "<img class='coll_size' src='Images/antique_coin.jfif' alt='Antique coin'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>there are 18 antique coins on normal and easy mode, these are upped to 32 on madhouse. You should have 7 coins before leaving the main house</p>";
        echo "<li>Files</li>"; //created a placeholder in the list which won't be displayed to the user
        echo "<img class='enc_size' src='Images/Files_coll.jfif' alt='Files'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>there are 32 files across the game to find. these must be found during a single playthrough.</p>"; //content
        echo "<li>Mr Nowhere</li>"; //created a placeholder in the list which won't be displayed to the user
        echo "<img 'enc_size' src='Images/Mr_everywhere.jpg' alt='bobblehead'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>there are 20 mr everywheres spread across the game to find.These are carried from run to run so if you destroy one you won't have to again</p>"; //content
    echo "</ol>"; //closes ordered list
echo "</div>"; //closes div
echo "<p>if you would like a more in-depth walkthrough guide then I would suggest <a href='https://m.youtube.com/watch?v=4MgHqXV-OMc&pp=ygUUcmU3IGFsbCBjb2xsZWN0aWJsZXM%3D'>PS5's trophy guide</a>.</p> "; //provides a video link with the link being dislpayed as a chosen set of words

echo "<p>Now for a pop quiz!"; //content
    echo "<br>"; //breakline

if ($_SERVER["REQUEST_METHOD"] == "POST") { //tells the server what to do with the info submitted
    echo "you chose: " . $_POST["antique"] . " antiques, the correct answer is 20"; //posts the result
    echo "<br>"; //breakline
    echo "you chose: " . $_POST['quantity'] . " coins, the correct answer is 7"; //posts the result
    echo "<br>"; //breakline
    echo "you said: " . $_POST["files"] . " to whether or not files carry over, the correct answer is yes"; //posts the result
    echo "<br>"; //breakline
    echo "you said: " . $_POST["num_of_bobbleheads"] . " to how many Mr Everywheres there are, the correct answer is 20"; //posts the result
    echo "<br>"; //breakline
    echo "you said: " . $_POST["bobblehead"] . " to whether or not Mr Everywheres carry over, the correct answer is yes"; //posts the result
}
echo "<div class='container'>"; //creates a div and gives it a class so I can apply this specific layout to chosen divs
    echo "<form action='' method='post'>";  //tells the form what should be done with the submitted info
        echo "<p>how many antique coins are there on normal and easy mode?</p>"; //content
            echo "<input type='radio' name='antique' value='20' required>"; //designates what type of form question it is it's name and it's value
                echo "<label for='20'>20</label>"; //gives the answer a number
                echo "<br>"; //breakline
            echo "<input type='radio' name='antique' value='32' required>"; //designates what type of form question it is it's name and it's value
                echo "<label for='32'>32</label>"; //adds the statement beside it
                echo "<br>"; //breakline
            echo "<input type='radio' name='antique' value='18' required>"; //designates what type of form question it is it's name and it's value
                echo "<label for='18'>18</label>"; //adds the statement beside it
                echo "<br>"; //breakline
        echo "<p>How many antique coins should you have before leaving the main house?</p>";
        echo "<input type='number'id='quantity' name='quantity' min='1' max='20' required>"; //designates what type of form question it is it's name and it's value
            echo "<label for='quantity'>coins</label> "; //adds the statement beside it
        echo "<p>Do collected files carry over from previous playthroughs?</p> "; //content
            echo "<input type='text' name='files' placeholder='Yes or no?' required>"; //designates what type of form question it is it's name and it's value
        echo "<p>Do Mr Nowheres carry over from previous playthroughs and how many are there?</p> "; //content
            echo "<input type='checkbox' id='yes_they_do' name='bobblehead' value='yes they do' >"; //designates what type of form question it is it's name and it's value
                echo "<label for='yes_they_do'>yes they do</label>"; //adds the statement beside it
                echo "<br>"; //breakline
            echo "<input type='checkbox' id='no_they_dont' name='bobblehead' value='no they dont' >"; //designates what type of form question it is it's name and it's value
                echo "<label for='no_they_dont'>no they don't</label>"; //adds the statement beside it
                echo "<br>"; //breakline
            echo "<input type='checkbox' id='21' name='num_of_bobbleheads' value='21 Mr Everywheres' >"; //designates what type of form question it is it's name and it's value
                echo "<label for='21'>21 Mr everywhere</label>"; //adds the statement beside it
                echo "<br>"; //breakline
            echo "<input type='checkbox' id='20' name='num_of_bobbleheads' value='20 Mr Everywheres' >"; //designates what type of form question it is it's name and it's value
                echo "<label for='20'>20 Mr everywhere</label>"; //adds the statement beside it
                echo "<br>"; //breakline
    echo "<input type='submit' name='submit' value='Submit'>"; //creates the submit button

    echo "</form>"; //closes form
echo "</div>"; //closes div
echo "</body>"; //closes body

echo "</html>"; //closes html
?>