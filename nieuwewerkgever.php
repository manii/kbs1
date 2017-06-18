<?php

function renderForm($first, $last, $error) {
    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

    <html>

        <head>

            <title>werkervaring toevoegen</title>

            <link rel="stylesheet" type="text/css" href="projectkbs.css">
        </head>

        <body>

            <?php
            echo "<td><div class='round-button'><div class='round-button-circle'><a href='newwerkervaring.php' class='round-button'>Terug</a></div></div></td>";

            //als er errors zijn laat hij dit zien


            if ($error != '') {

                echo $error;
            }

            echo "<div>";
            echo "<table class='responstable'>";
            echo "<center><h2>Nieuwe werkgever</h2></center>";
            echo "<tr><th><b>Werkgever *<b></th>";
            echo "<th><b>Vestigingsplaats *</b></th>";
            echo "<th><b>link</b></th>";



            echo '<form action="" method="post">';
            echo "<tr>";

            echo "<td>" . '<input type="text" name="werkgevernaam" />' . "</td >";
            echo "<td>" . '<input type="text" name="vestigingsplaats" />' . "</td >";
            echo "<td>" . '<input type="text" name="link" />' . "</td >";


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

    $werkgevernaam = mysql_real_escape_string(htmlspecialchars($_POST['werkgevernaam']));

    $vestigingsplaats = mysql_real_escape_string(htmlspecialchars($_POST['vestigingsplaats']));

    $link = mysql_real_escape_string(htmlspecialchars($_POST['link']));



// check of alles is ingevuld

    if ($werkgevernaam == '' || $vestigingsplaats == '') {

// bericht error

        $error = 'ERROR: Vul de verplichte velden in!';



// als een veld blanco is, laat hij het formulier nogmaals zien

        renderForm($werkgevernaam, $vestigingsplaats, $link);
    } else {

// data opslaan in de database

        $sqlwerkgever = "INSERT INTO werkgever SET werkgevernaam='$werkgevernaam', vestiginsplaats='$vestigingsplaats', link='$link' ";
        $werkgever = $mysqli->query($sqlwerkgever);


//na het opslaan terug naar werkervaring.php

        header("Location: newwerkervaring.php");
    }
} else {

// wanneer het formulier niet gesubmit is

    renderForm('', '', '');
}
?>