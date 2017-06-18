<?php

function renderForm($first, $last, $error) {
    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

    <html>

        <head>

            <title>CV aanpassen</title>

            <link rel="stylesheet" type="text/css" href="projectkbs.css">
        </head>

        <body>

            <?php
            echo "<td><div class='round-button'><div class='round-button-circle'><a href='index.php' class='round-button'>Terug</a></div></div></td>";

            //als er errors zijn laat hij dit zien


            if ($error != '') {

                echo $error;
            }

            echo "<div>";
            echo "<table class='responstable'>";
            echo "<center><h2>Aanpassen CV</h2></center>";
            echo "<tr><th><b>voornaam *<b></th>";
            echo "<th><b>achternaam *</b></th>";
            echo "<th><b>straatnaam *</b></th>";
            echo "<th><b>huisnr *</b></th>";
            echo "<th><b>postcode *</b></th>";
            echo "<th><b>woonplaats *</b></th>";
            echo "<th><b>telnr *</b></th>";
            echo "<th><b>email *</b></th>";


            echo '<form action="" method="post">';
            echo "<tr>";
            echo "<td>" . '<input type="text" name="voornaam" />' . "</td >";
            echo "<td>" . '<input type="text" name="achternaam" />' . "</td >";
            echo "<td>" . '<input type="text" name="straatnaam" />' . "</td >";
            echo "<td>" . '<input type="text" name="huisnr" />' . "</td >";
            echo "<td>" . '<input type="text" name="postcode" />' . "</td >";
            echo "<td>" . '<input type="text" name="woonplaats" />' . "</td >";
            echo "<td>" . '<input type="text" name="telnr" />' . "</td >";
            echo "<td>" . '<input type="text" name="email" />' . "</td >";


            echo "</tr>";
            echo '<input type="submit" name="submit" value="Submit">';
            echo "</form>";
            echo "<p>* verplichte velden</p>";



            echo "</div>";
            ?>


        </body>

    </html>

    <?php
}

// connectie database

require_once('db.php');
$mysqli->select_db("project");


// Check of het formulier is ingevuld, zo ja, start het proces

if (isset($_POST['submit'])) {

    // data validatie

    $voornaam = mysql_real_escape_string(htmlspecialchars($_POST['voornaam']));

    $achternaam = mysql_real_escape_string(htmlspecialchars($_POST['achternaam']));

    $straatnaam = mysql_real_escape_string(htmlspecialchars($_POST['straatnaam']));

    $huisnr = mysql_real_escape_string(htmlspecialchars($_POST['huisnr']));

    $postcode = mysql_real_escape_string(htmlspecialchars($_POST['postcode']));

    $woonplaats = mysql_real_escape_string(htmlspecialchars($_POST['woonplaats']));

    $telnr = mysql_real_escape_string(htmlspecialchars($_POST['telnr']));

    $email = mysql_real_escape_string(htmlspecialchars($_POST['email']));



    // check of alles is ingevuld

    if ($voornaam == '' || $achternaam == '' || $straatnaam == '' || $huisnr == '' || $woonplaats == '' || $telnr == '' || $email == '') {

        // bericht error

        $error = 'ERROR: Vul de verplichte velden in!';



        // als een veld blanco is, laat hij het formulier nogmaals zien

        renderForm($voornaam, $achternaam, $straatnaam, $huisnr, $woonplaats, $telnr, $email);
    } else {

// data opslaan in de database

        $sqlcv = "UPDATE contactgegevens SET voornaam='$voornaam', achternaam='$achternaam', straatnaam='$straatnaam', huisnr='$huisnr', woonplaats='$woonplaats', telnr='$telnr', email='$email' WHERE ID='1'";
        $editcv = $mysqli->query($sqlcv);


        //na het opslaan terug naar index.php

        header("Location: index.php");
    }
} else {

// wanneer het formulier niet gesubmit is

    renderForm('', '', '');
}
?>