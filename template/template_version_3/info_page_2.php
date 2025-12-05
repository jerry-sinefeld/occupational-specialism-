<?php


session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure
echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>Smart home energy management systems</title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head
echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";
echo "<h1>Why You Should Get a Smart Meter</h1>";
echo "<p>Getting a smart meter is an easy way to take control of your energy use while reducing your carbon footprint. A smart meter shows you exactly how much electricity and gas you’re using in real time, so you can spot where energy is being wasted and make quick changes that lower your bills. Instead of estimated readings, you get accurate data—meaning you only pay for what you actually use.</p>";
echo "<p>By understanding your energy habits, you can reduce unnecessary consumption, which helps cut down the emissions created by powering your home.
 Smart meters also support a greener energy system.
  They make it easier for suppliers to balance demand with renewable sources like wind and solar, helping the whole country move toward cleaner, more efficient energy.</p>";
echo "<p>In short: a smart meter helps you save money, reduce wasted energy, and play a part in building a more sustainable future.</p>";
echo "<a href='https://www.britishgas.co.uk/energy/smart-meters.html?source=Energy-Google-PPC&cid=PPC.cid_cname=BG-PPC_Energy_Drive-Action_Conversion_Non-Brand_Generic_Always-On_High4&gclsrc=aw.ds&gad_source=1&gad_campaignid=19630094082&gbraid=0AAAAADvuo5BTZa0s7BDHGv9y1_p_GazcL&gclid=Cj0KCQiAxJXJBhD_ARIsAH_JGjgAM3a6VYCaCWgNviPL7rQCn_qgUmVHJQmnDAeHdm8yND9PqL-hFXUaAhGqEALw_wcB'
>Learn More</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html