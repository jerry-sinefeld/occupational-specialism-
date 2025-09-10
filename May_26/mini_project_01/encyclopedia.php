<?php

echo "<!DOCTYPE html>";

echo "<html>";


echo "<head>"; //opens head
    echo "<title>Resident evil completionist guide</title>"; //opens and writes title
    echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>";
    echo "<p>RESIDENT E<span class='seven_color'>VIL</span> ENCYCLOPEDIA</p>"; //opening paragraph that I use as a semi title, this contains the span tag which allows you to color chosen words and/or letters
    echo "<h1>The encyclopedia</h1><br>";
    echo "<p>Here you'll find useful info on all the major items in the game.</p>";

echo "<div class='container'>";
    echo "<ol class='coll_ol";
        echo "<li>placeholder</li>";
        echo "<img src=''>";
        echo "<p></p>";

        echo "<li>Separating agent</li>";
        echo "<img width='600' height='380' src='Images/separating-agent.png'>";
        echo "<p>Rarity: 4/5</p>";
        echo "<p>Description: this item is very sparse aswell as appearing only in the late game(unless you're on madhouse then it's everywhere).</p>";
        echo "<p>Use: this item can be used to separate the chem fluid from anything you don't need (so long as chem fluid is in the recipe to make it). Got some burner fuel you know you're never gonna use? Repurpose it into some chem fluid!";
        echo "<li>Strong chem fluid</li>";
        echo "<img width='600' height='380' src='Images/strong-chem-fluid.png'>";
        echo "<p>Rarity:3/5</p>";
        echo "<p>Description:this item is quite rare and incredibly useful make sure to keep your eyes out for it.";
        echo "<p>Use:can be combined with gunpowder to make enhanced handgun ammo, supplements to make neuro rounds, green herbs to make strong first aid meds and solid fuel to make flame rounds.</p>";
        echo "<li>Chem Fluid</li>";
        echo "<img width='600' height='380' src='Images/chem-fluid.png'>";
        echo "<p>Rarity:1/5</p>";
        echo "<p>Description:like strong chem fluid, but weaker.</p>";
        echo "<p>Use:can be combined with gunpowder to make handgun ammo, herb to make first aid med, solid fuel to make burner fuel and supplements to make psychostimulants.</p>";
        echo "<li>Green herb</li>";
        echo "<img width='600' height='380' src='Images/herb.png'>";
        echo "<p>Rarity:1/5</p>";
        echo "<p>Description:a green herb, tasty.";
        echo "<p>Use:can be eaten to restore half a health state or combined with strong/weak chem fluid to make first aids.</p>";
        echo "<li>Supplements</li>";
        echo "<img width='600' height='380' src='Images/supplements.png'>";
        echo "<p>Rarity:4/5</p>";
        echo "<p>Description:very rare, used as a base to make strong consumables or ammo. No use on its own.";
        echo "<p>Use:makes psychostimulants and neuro rounds.</p>";
        echo "<li>psychostimulants</li>";
        echo "<img width='600' height='380' src='Images/psychostimulants.png'>";
        echo "<p>Rarity:4/5</p>";
        echo "<p>Description: allows you to see item locations through walls. On paper very useful however let's be real, if your looking for an item you can just use your phone. This game is 8+ years old someone will have a guide on it.";
        echo "<p>Use:crafted using supplements and chem fluid.</p>";
        echo "<li>First aid</li>";
        echo "<img width='600' height='380' src='Images/first-aid-med.png'>";
        echo "<p>Rarity:2/5</p>";
        echo "<p>Description:heals you by a health state.";
        echo "<p>Use:created using a herb and chem fluid. Pro tip: you can cancel the healing animation by blocking.</p>";
        echo "<li>Strong first aid</li>";
        echo "<img width='600' height='380' src='Images/strong-first-aid-med.png'>";
        echo "<p>Rarity:4/5</p>";
        echo "<p>Description: heals you by two health states.";
        echo "<p>Use:created using a herb and strong chem fluid. Pro tip: you can cancel the healing animation by blocking.</p>";
        echo "<li>Stabilizers</li>";
        echo "<img width='600' height='380' src='Images/stabilizer.png'>";
        echo "<p>Rarity:Special</p>";
        echo "<p>Description: there are only two of these in the game.";
        echo "<p>Use:increases reload speed.</p>";
        echo "<li>Steroids</li>";
        echo "<img width='600' height='380' src='Images/steroids.png'>";
        echo "<p>Rarity:Special</p>";
        echo "<p>Description: there are only four of these in the game.";
        echo "<p>Use:increases max health.</p>";
        echo "<li>Solid fuel</li>";
        echo "<img width='600' height='380' src='Images/solid-fuel.png'>";
        echo "<p>Rarity:2/5</p>";
        echo "<p>Description:the most useless item in the game. Annoyingly abundant.</p>";
        echo "<p>Use:can be wasted on chem fluid to make burner fuel.</p>";
        echo "<li>Gunpowder</li>";
        echo "<img width='600' height='380' src='Images/gunpowder.jpg'>";
        echo "<p>Rarity:2/5</p>";
        echo "<p>Description: can be used to make almost every ammo type in the game.</p>";
        echo "<p>Use:can be used to make handgun ammo using chem fluid, enchanced handgun ammo using strong chem fluid. </p>";
        echo "<li>Ammo</li>";
        echo "<img width='600' height='380' src='Images/ammo.jpg'>";
        echo "<p>Rarity:?/5</p>";
        echo "<p>Description: ammo to load your boomstick with.</p>";
        echo "<p>Use:death.</p>";
    echo "</ol>";
echo "</div>";

echo "</body>";
echo "</html>";
?>