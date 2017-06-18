<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>KBS project Denny Euverman</title>

        <link rel="stylesheet" type="text/css" href="projectkbs.css">
    </head>
    <body>



        <?php
        require_once('db.php');
        $mysqli->select_db("project");





        echo "<div class='round-button'><div class='round-button-circle'><a href='werkervaring.php' class='round-button'>Werk</a></div></div>";
        echo "<div class='round-button'><div class='round-button-circle'><a href='hobby.php' class='round-button'>Hobby's</a></div></div>";




// haalt contactgevens uit de database
        $sqlcontact = "SELECT * FROM contactgegevens";
        $contactgegevens = $mysqli->query($sqlcontact);

        echo "<table class='responstable'>";
        echo "<tr><th><h2> </h2></th>";
        echo "<th><h2>Persoonsgegevens</h2></th></tr>";


        if ($contactgegevens != NULL && $contactgegevens->num_rows > 0) {
            while ($cgprinten = $contactgegevens->fetch_assoc()) {

                echo "<tr>";
                echo "<td width='10%' style='text-align: right';>Naam:</td><td>" . $cgprinten["voornaam"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align: right'>Achternaam:</td><td>" . $cgprinten["achternaam"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align: right'>Adres:</td><td>" . $cgprinten["straatnaam"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align: right'>Huisnummer:</td><td>" . $cgprinten["huisnr"] . "</td>";
                echo "</tr>";
                echo "<td style='text-align: right'>Postcode:</td><td>" . $cgprinten["postcode"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align: right'>Plaats:</td><td>" . $cgprinten["woonplaats"] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td style='text-align: right'>Telefoon:</td><td>" . $cgprinten["telnr"] . "</td>";
                echo "</tr>";
                echo "<tr >";
                echo "<td style='text-align: right'>E-mail:</td><td>" . $cgprinten["email"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        echo "<p>Aanpassen CV <a href='editcv.php' class='round-button'>klik hier</a></p>";


        $mysqli->close();
        ?>
    </body>
</html>
