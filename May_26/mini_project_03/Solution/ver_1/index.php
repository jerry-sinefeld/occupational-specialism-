<?php //OPENS php
session_start();

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure

echo "<html>"; //opens html
    echo "<head>"; //opens head
        echo "<title></title>"; //opens and writes title
        echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
    echo "</head>"; //closes head

    echo "<body>"; //opens body
    echo "<div class='container'>"; //opens the div with the class of main
    require_once "assets/topbar.php"; //opens top bar file
    require_once "assets/nav.php"; //opens assets file
    echo "<div id='main'>"; //opens the div with the id of main
        echo "<p>A strong password is your first line of defense against cyber threats, but many people still use simple, easy-to-guess combinations. Creating a secure password isn't just about making it difficult for others to figure out; it's about making it computationally difficult for a machine to crack. Your password should have at least 8 characters and use a diverse set of characters. It must include at least one uppercase letter, at least one lowercase letter, at least one number, and at least one special character. The first character cannot be a special character or a number, and the last character cannot be a special character. Your password cannot contain the word 'password'. By following these guidelines, you can significantly reduce your risk of becoming a victim of a cyberattack.<p/>";
    echo "</div>"; //closes main div
    echo "</div>"; //closes container div
    echo "</body>"; //closes body
echo "</html>"; //closes html