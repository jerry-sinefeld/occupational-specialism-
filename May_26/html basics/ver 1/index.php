<?php //this is a comment

echo "<!DOCTYPE html>"; // desired tag for correct structure of an html page to declare what type it is

echo "<html>"; // opens html
    echo "<head>";// opens head
        echo "<title>May 26</title>"; // opens title,writes it and close it
        echo "<link rel='stylesheet' href='CSS/styles.css'>";
    echo "</head>"; // closes head

    echo "<body>"; // opens body
        echo "<p id = 'my_id'>bonjour</p>";
        echo "<p >bonjour</p>";

        echo "<h1>cody is balding</h1>"; // opens first header
        echo "<hr>";

        echo "baldy baldy"; // writes first paragraph

        echo "<br>";

        echo "has no hair";

        echo "<a href = 'https://www.google.com/url?sa=t&rct=j&q=&esrc=s&source=web&cd=&cad=rja&uact=8&ved=2ahUKEwjb7MCvysGPAxWHUkEAHVshASsQFnoECDcQAQ&url=https%3A%2F%2Fwww.nhs.uk%2Fsymptoms%2Fhair-loss%2F&usg=AOvVaw1F4xFsgDLrgENaKiKx8hbl&opi=89978449'>  Go to advice.</a>";

    echo "<img src='images/receding_hairline_test.jfif'>";

        echo "</table>";
            echo "<tr>";
                echo "<td>Hello 1 </td>";
                echo "<td>Hello 2 </td>";
                echo "<td>Hello 3 </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Hello 4 </td>";
            echo "<td>Hello 5 </td>";
            echo "<td>Hello 6 </td>";
            echo "</tr>";

    echo "</table>";

    echo "<ul>";
    echo "<li>this is a bald man</li>";
    echo "<li>he loves baby oil</li>";
    echo "<li>so he can slip into nooks and crannies</li>";
    echo "</ul>";

    echo "<ol>";
        echo "<li>he uses a razor</li>";
        echo "<li>and a blowtorch</li>";
        echo "<li>to keep his head nice and shiny</li>";
    echo "</ol>";

    echo "<a href='page 2.php'> go to page 2</a>";

    echo "</body>"; // closes body

echo "</html>";
?>