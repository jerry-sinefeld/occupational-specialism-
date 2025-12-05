<?php

session_start();

require_once "assets/common.php";
require_once "assets/db_con.php";

echo "<!DOCTYPE html>"; //declares the doc as a html so it follows the correct structure
echo "<html>"; //opens html
echo "<head>"; //opens head
echo "<title>Solar panel </title>"; //opens and writes title
echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head
echo "<body>"; //opens body
echo "<div class='container'>";
require_once "assets/topbar.php";
require_once "assets/nav.php";
echo "<div id='main'>";
echo "<h1>What Do Solar Panels Do?</h1>";
echo "<p>A solar panel is a device that converts sunlight into electricity using special cells called photovoltaic (PV) cells.
When sunlight hits these cells, they generate electrical energy that can power homes, businesses, or even entire communities.</p>";
echo "<h1>How Solar Panels Help Reduce Your Carbon Footprint</h1>";
echo "<p>Solar panels help the environment in several big ways:
They produce clean energy
Solar power generates electricity without burning fossil fuels like coal, oil, or gas.
This means fewer greenhouse gases are released into the atmosphere.
They reduce your reliance on the grid
The traditional power grid often relies on fossil-fuel-based power plants.
By generating your own solar energy, you draw less electricity from high-emission sources.
They lower lifetime emissions
Even though manufacturing solar panels requires some energy, their lifetime output far outweighs their production footprint.
Over 20–30 years, solar panels produce clean energy with very minimal emissions.
They can power electric vehicles and heat systems
Using solar energy to charge an EV or power eco-friendly heating systems multiplies your overall carbon savings.</p>";
echo "<a href='https://is-solar-worth-it.solar-sherpa.co.uk/?source=GAD&campaign=exact_worth_it&gad_source=1&gad_campaignid=23051998460&gbraid=0AAAAApyqObcNdn1wM7Px2rTxFCoSMumzO&gclid=Cj0KCQiAxJXJBhD_ARIsAH_JGjipg_0AdxrAwfjWZ1xtHRzxieOWAO6SKI2SD7SOwr2FzIisOqOBOuMaArcAEALw_wcB
'>Learn More</a>";
echo "</div>";
echo "</div>";
require_once "assets/bottombar.php";
echo "</body>";
echo "</html>"; //closes html