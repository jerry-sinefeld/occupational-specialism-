<?php //OPENS php

echo "<!DOCTYPE html>";//declares the doc as a html so it follows the correct structure

echo "<html>";//opens html


echo "<head>"; //opens head
    echo "<title>Resident evil completionist guide</title>"; //opens and writes title
    echo "<link rel='stylesheet' href='css/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>";//opens body
    echo "<p>RESIDENT E<span class='seven_color'>VIL</span> ENCYCLOPEDIA</p>"; //opening paragraph that I use as a semi title, this contains the span tag which allows you to color chosen words and/or letters
    echo "<p>To the <a href='index.php'>landing page</a>"; //sends you to the landing page
    echo "<h1>The encyclopedia</h1><br>"; //header
    echo "<p>Here you'll find useful info on all the major items in the game.</p>"; //content

echo "<div class='container'>"; //creates a div and gives it a class so I can apply this specific layout to chosen divs
    echo "<ol class='coll_ol"; //creates an ordered list with a name to be referenced in the css
        echo "<li>placeholder</li>"; //created a placeholder in the list which won't be displayed to the user
        echo "<img src=''>"; //creates an images with a source
        echo "<p></p>"; //content

        echo "<li>Separating agent</li>"; //entry of list
        echo "<img class='enc_size' src='images/separating-agent.png' alt='separating agent'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity: 4/5</p>"; //content
        echo "<p>Description: this item is very sparse aswell as appearing only in the late game(unless you're on madhouse then it's everywhere).</p>";//content
        echo "<p>Use: this item can be used to separate the chem fluid from anything you don't need (so long as chem fluid is in the recipe to make it). Got some burner fuel you know you're never gonna use? Repurpose it into some chem fluid!</p>";//content
        echo "<li>Strong chem fluid</li>";//entry of list
        echo "<img class='enc_size' src='images/strong-chem-fluid.png' alt='strong chem fluid'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:3/5</p>";//content
        echo "<p>Description:this item is quite rare and incredibly useful make sure to keep your eyes out for it.</p>";//content
        echo "<p>Use:can be combined with gunpowder to make enhanced handgun ammo, supplements to make neuro rounds, green herbs to make strong first aid meds and solid fuel to make flame rounds.</p>";//content
        echo "<li>Chem Fluid</li>";//entry of list
        echo "<img class='enc_size' src='images/chem-fluid.png' alt='Chem fluid'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:1/5</p>";//content
        echo "<p>Description:like strong chem fluid, but weaker.</p>";//content
        echo "<p>Use:can be combined with gunpowder to make handgun ammo, herb to make first aid med, solid fuel to make burner fuel and supplements to make psychostimulants.</p>";
        echo "<li>Green herb</li>";//entry of list
        echo "<img class='enc_size' src='images/herb.png' alt='Herb'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load//
        echo "<p>Rarity:1/5</p>";//content
        echo "<p>Description:a green herb, tasty.</p>";//content
        echo "<p>Use:can be eaten to restore half a health state or combined with strong/weak chem fluid to make first aids.</p>";//content
        echo "<li>Supplements</li>";//entry of list
        echo "<img class='enc_size' src='images/supplements.png' alt='supplements'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:4/5</p>";//content
        echo "<p>Description:very rare, used as a base to make strong consumables or ammo. No use on its own.</p>";//content
        echo "<p>Use:makes psychostimulants and neuro rounds.</p>";//content
        echo "<li>psychostimulants</li>";//entry of list
        echo "<img class='enc_size' src='images/psychostimulants.png' alt='psychostimulants'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:4/5</p>";//content
        echo "<p>Description: allows you to see item locations through walls. On paper very useful however let's be real, if your looking for an item you can just use your phone. This game is 8+ years old someone will have a guide on it.";
        echo "<p>Use:crafted using supplements and chem fluid.</p>";//content
        echo "<li>First aid</li>";//entry of list
        echo "<img class='enc_size' src='images/first-aid-med.png' alt='first aid med'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:2/5</p>";//content
        echo "<p>Description:heals you by a health state.</p>";//content
        echo "<p>Use:created using a herb and chem fluid. Pro tip: you can cancel the healing animation by blocking.</p>";//content
        echo "<li>Strong first aid</li>";//entry of list
        echo "<img class='enc_size' src='images/strong-first-aid-med.png' alt='strong first aid med'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:4/5</p>";//content
        echo "<p>Description: heals you by two health states.</p>";//content
        echo "<p>Use:created using a herb and strong chem fluid. Pro tip: you can cancel the healing animation by blocking.</p>";//content
        echo "<li>Stabilizers</li>";//entry of list
        echo "<img class='enc_size' src='images/stabilizer.png' alt='stabilizer'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:Special</p>";//content
        echo "<p>Description: there are only two of these in the game.</p>";//content
        echo "<p>Use:increases reload speed.</p>";//content
        echo "<li>Steroids</li>";//entry of list
        echo "<img class='enc_size' src='images/steroids.png' alt='steroids'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:Special</p>";//content
        echo "<p>Description: there are only four of these in the game.";
        echo "<p>Use:increases max health.</p>";//content
        echo "<li>Solid fuel</li>";//entry of list
        echo "<img class='enc_size' src='images/solid-fuel.png' alt='solid fuel'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:2/5</p>";//content
        echo "<p>Description:the most useless item in the game. Annoyingly abundant.</p>";//content
        echo "<p>Use:can be wasted on chem fluid to make burner fuel.</p>";//content
        echo "<li>Gunpowder</li>";//entry of list
        echo "<img class='enc_size' src='images/gunpowder.jpg' alt='gunpowder'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:2/5</p>";//content
        echo "<p>Description: can be used to make almost every ammo type in the game.</p>";//content
        echo "<p>Use:can be used to make handgun ammo using chem fluid, enchanced handgun ammo using strong chem fluid. </p>";//content
        echo "<li>Ammo</li>";//entry of list
        echo "<img class='enc_size' src='images/ammo.jpg' alt='Ammo'>"; //displays an images with a source as well as measurements and alternate text that appears if images doesn't load
        echo "<p>Rarity:?/5</p>";//content
        echo "<p>Description: ammo to load your boomstick with.</p>";//content
        echo "<p>Use:death.</p>";//content
    echo "</ol>"; //closes ordered list
echo "</div>";//closes div

echo "</body>";//closes div
echo "</html>";//closes html
?>