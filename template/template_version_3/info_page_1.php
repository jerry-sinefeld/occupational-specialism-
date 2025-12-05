<?php


session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure
echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>EV Chargers</title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head
echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";
echo "<h1>Why Should I Switch To Electric?</h1>";
echo "<p>Switching to an electric car is one of the most effective ways to reduce your carbon footprint.
 Unlike petrol or diesel vehicles, electric cars run on electricity instead of burning fuel—meaning they don’t release harmful exhaust fumes or greenhouse gases while driving.
 This instantly cuts down your personal contribution to air pollution and climate change.</p>";
echo "<p> Electric vehicles also use energy far more efficiently, so they require less total energy to travel the same distance.
 When you charge an EV using renewable energy—like solar panels or a green energy plan—you’re powering your car with clean, zero-emission electricity.
 Over time, this dramatically lowers your overall environmental impact.</p>";
echo "<p>Beyond the environmental benefits, electric cars often cost less to run, require less maintenance, and offer a quieter, smoother driving experience.
With more charging stations popping up and battery ranges improving every year, EVs are becoming a practical, future-proof choice for many drivers.
In short: switching to an electric car helps you save money, reduce pollution, and take a major step toward a cleaner, more sustainable future.</p>";
echo "<a href='https://www.britishgas.co.uk/electrical/guides/ev-vs-petrol.html?source=Energy-Google-PPC&cid=PPC.cid_cname=BG-PPC_Energy_Drive-Action_Conversion_Non-Brand_Generic_Always-On_High4&gclsrc=aw.ds&gad_source=1&gad_campaignid=19630094082&gbraid=0AAAAADvuo5BTZa0s7BDHGv9y1_p_GazcL&gclid=Cj0KCQiAxJXJBhD_ARIsAH_JGjgmTXwtX9eNAcBRtVDYtabBZLBI-gV3oORiBcNgm3VssqpqhDtZt6gaAgRiEALw_wcB'
>Learn More</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html