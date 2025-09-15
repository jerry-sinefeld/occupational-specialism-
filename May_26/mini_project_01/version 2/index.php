<?php //OPENS php

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title>Resident evil completionist guide</title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

echo "<body>"; //opens body
echo "<div class='container'>";
echo "<div id='main'>";
        echo "<div class='res_title'>";
            echo "<p1>RESIDENT E<span class='seven_color'>VIL</span> COMPLETIONIST GUIDE</p1>"; //opening paragraph that I use as a semi title, this contains the span tag which allows you to color chosen words and/or letters
        echo "</div>";
        require_once "assets/nav.php";
        echo "<h1>Welcome to the family, son!</h1>"; // opens and writes to the first header
        echo "<hr>";
        echo "<video controls> <source src='images/Re7_welcome.mp4' type='video/mp4'></video>"; //plays a stored video and decides its size and type
        echo "<p>Are you a returning resident evil 7 player, or a fresh face taking their first steps into the baker estate?</p>"; //content
        echo "<p>no matter your answer you've come to the right place, here you will find all the neat tips and tricks that you'll need to take on the baker family!</p>"; //content
        echo "<p>First things first, you'll need to know what you're getting yourself into before you decide to begin. The resident evil games are known as survival horror games for a reason. You must survive!"; //content
        echo "<p>'But what does that mean?!' I hear you ask. Well it means that you are not doomguy or kratos, you're just a man and a gun with very limited ammunition!</p>"; //content
        echo "<p>Therefore, treat every bullet like it's your last."; //content
        echo "<p>Now that we have the basics out of the way let's get down to specifics."; //content
        echo "<h2>Contents</h2>"; // second header
        echo "<p>Here are the components to your run. First is the <a href='bestiary.php'> bestiary</a>, this is where you'll find all the info you need on all the baddies you'll face during your residential visit."; //content as well as links to other pages
        echo "<p>Then there's the <a href='encyclopedia.php'>encyclopedia</a> which will give you a complete rundown of every item in the game and it's use."; //content as well as links to other pages
        echo "<p>Finally, we have the <a href='collectibles.php'>collectibles</a> section which will give you the edge when it comes to getting that sweet sweet 100% achievement"; //content as well as links to other pages
echo "</div>";
echo "</div>";
echo "</html>"; //closes html
?>