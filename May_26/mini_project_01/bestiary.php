<?php //OPENS PHP

echo "<!DOCTYPE html>";//declares the doc as a html so it follows the correct structure

echo "<html>";//opens html


echo "<head>"; //opens head
    echo "<title>Resident evil completionist guide</title>"; //opens and writes title
    echo "<link rel='stylesheet' href='CSS/styles.css'>"; //links the file to the stylesheet which contains all the css
echo "</head>"; //closes head

echo "<body>";//opens body
    echo "<p>RESIDENT E<span class='seven_color'>VIL</span> BESTIARY</p>"; //opening paragraph that I use as a semi title, this contains the span tag which allows you to color chosen words and/or letters
    echo "<p>To the <a href='index.php'>landing page</a>"; //link to landing page
    echo "<h1>The encyclopedia</h1><br>"; //header
    echo "<p>Here you'll find useful info on all the enemies in the game.</p>";//content

echo "<div class='container'>"; //creates a div and gives it a class so I can apply this specific layout to chosen divs
    echo "<ol class='coll_ol"; //creates an ordered list with a name to be referenced in the css
        echo "<li>placeholder</li>"; //created a placeholder in the list which won't be displayed to the user
        echo "<img src=''>"; //creates an image with a source
        echo "<p></p>"; //content
        echo "<h1>The family</h1>"; //header
        echo "<li>Jack Baker</li>"; //entry of list
        echo "<img id='jack' src='Images/jackbaker.jpg' alt='Jack Baker'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:2/5</p>"; //content
        echo "<p>Description: The father of the family and the poster boy of the game.If you were the unstoppable force then Jack is the immovable object he constantly stalks you around the main house, taunting you as he does it.</p>";//content
        echo "<p>Tips:Jack may seem intimidating but in all of his forms he doesn't pose much risk to you if you know what you're doing. most of his attacks can be completely negated by ducking depending on how high his swings are. Other can just be blocked. He's also slower than you so just take advantage of that. His bossfights are a cakewalk. Just aim for his weakspot and fire.</p>";//content
        echo "<li>Marguerite baker</li>";//entry of list
        echo "<img id='marge' src='Images/Margureite.jpg' alt='Marguriete Baker'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:1-4/5</p>";//content
        echo "<p>Description:Margueriete is the wife of Jack and only spawns in the old house which is infested with flies,spiders and other insects that she can control. She has two forms. Normal and spider. When she is in her normal form she functions similarly to Jack. She stalks the house and will send flies to swarm you if she spots you. These do little to no damage and her AI doesn't have ears so you can run straight past her and she'll be none the wiser. </p>";//content
        echo "<p>Tips: Her spider form is where things become a problem. You only encounter this form in her boss fight arena. She will dive in and out of the arena, ambushing you through holes in the walls and ceilings. Each of her attacks do a lot of damage, some even taking a whole health state even if your blocking. Her main weakeness is her speed. She is incredibly slow during her attacks which are also very heavily telegraphed meaning you can avoid them quite easily.When you do enough damage she will retreat and plant a bug nest to harrass and distract you. She makes lots of noise as this happens, if you can locate her in the middle of this process you can interupt it and stun her by shooting her. You can also stun her if she is climbing on any surface by shooting her enough</p>";//content
        echo "<li>Lucas Baker</li>";//entry of list
        echo "<img id='Lucas' src='Images/Lucas.jpg' alt='Lucas Baker'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:0/5</p>";//content
        echo "<p>Description: It's best to imagine Lucas as a budget saw. He is never a direct threat to you, however, his section of the game is full of traps that you will need to be vigilant about if you want to stay alive.</p>";//content
        echo "<p>Tips: Lucas doesn't have a boss fight in the main game, he instead has a puzzle you have to solve in a specific way.Get it wrong and you die. To find out what the solution to the puzzle is you'll need to watch the birthday tape which can be found in the cupboard in Lucas' attic.</p>";//content
        echo "<h1> The molded";//header
        echo "<li>Molded</li>";//entry of list
        echo "<img id='Molded' src='Images/molded.png' alt='molded'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:1/5</p>";//content
        echo "<p>Description: The basic enemy of the game. Squishy head.</p>";//content
        echo "<p>Tips:As mentioned before these guys have very weak heads. That is their weak spot 3 pistol shots to the head will usually do them. All their attacks can be dodged by either strafing or ducking</p>";//content
        echo "<li>Blade molded</li>";//entry of list
        echo "<img id='Blade_molded' src='Images/blade_molded.jpg' alt='Blade molded'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:1/5</p>";//content
        echo "<p>Description:These enemies are almost identical to normal molded they just do more damage and have more wide sweeping attacks. </p>";//content
        echo "<p>Tips:Keep your distance and aim for the head</p>";//content
        echo "<li>4-legged molded</li>";//entry of list
        echo "<img id='crawler_molded' src='Images/molded-crawler.png' alt='Molded crawler'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:4/5</p>";//content
        echo "<p>Description: Very short agile creatures that dive scratch and bite.</p>";//content
        echo "<p>Tips: These are by far the most deadly molded you'll run into. Each attack does two health states worth of damage even while blocking. However, this enemy has a very low health pool. Only taking two pistol shots to the head to kill one. Almost all their attacks are in the form of a leap towards you. If you can hit them during that leap you'll stun them and push them back out of range of you. This can be done with any weapon but a melee weapon works best.</p>";//content
        echo "<li>Fat molded</li>";//entry of list
        echo "<img id='Fat_molded' src='Images/molded-fat.png' alt='Fat molded'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:3/5</p>";//content
        echo "<p>Description: Large, tall tanks that spew acid and spurt it from the holes in their bodies made from our bullets.</p>";//content
        echo "<p>Tips:These enemies are bullet sponges more than threats. The weakpoint is the head. There aren't many of them in the game so using strong ammo on them is advisable to save your other weaker ammo for weaker enemies.My strategy is to use a neuro round to stun them and shoot them point-blank with my shotgun. 2-3 hits usually kills them. Make sure to stand back once you kill on as they explode upon death.</p>";//content
        echo "<li>Tripwires</li>";//entry of list
        echo "<img id='tripwire' src='Images/bomb.png' alt='Tripwire bomb'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:0/5</p>";//content
        echo "<p>Description:Bombs with wires attached that trigger when tripped. </p>";//content
        echo "<p>Tips:Use your brain and avoid the wires. If you can't, shoot the bomb it's connected with from afar.";
        echo "<li>Box traps</li>";//entry of list
        echo "<img id='Box_trap' src='Images/wooden-crate.png' alt='Trapped wood crate'>"; //displays an image with a source as well as measurements and alternate text that appears if image doesn't load
        echo "<p>Difficulty:0/5</p>";//content
        echo "<p>Description:Fairly unassuming crate containing a bomb </p>";//content
        echo "<p>Tips:These guys have killed me more times than I'd like to admit. If you get close to them before breaking them you'll hear a slight ticking noise. If you do then don't break them or break them from afar.</p>";//content
    echo "</ol>"; //closes ordered list


echo "</div>"; //closes div
echo "</body>"; //closes body
?>