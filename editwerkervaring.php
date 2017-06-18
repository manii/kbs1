<?php

function renderForm($id, $firstname, $lastname, $error) {
    ?>

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

    <html>

        <head>

            <title>aanpassen werkervaring</title>

            <link rel="stylesheet" type="text/css" href="projectkbs.css">
        </head>

        <body>

            <?php
            echo "<td><div class='round-button'><div class='round-button-circle'><a href='werkervaring.php' class='round-button'>Terug</a></div></div></td>";
// bij een error

            if ($error != '') {

                echo '<div style="padding:4px; border:1px solid red; color:red;">' . $error . '</div>';
            }
            ?>



            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                <div>
                    <p><strong>ID:</strong> <?php echo $id; ?></p>
                    <strong>Beginjaar: *</strong> <input type="number" name="beginjaar" maxlength="4"/><br/>

                    <strong>functie: *</strong> <input type="text" name="functie"/><br/>

                    <strong>functie omschrijving: *</strong> <input type="text" name="functie_omschrijving"/><br/>

                    <p>* verplicht</p>

                    <input type="submit" name="submit" value="Submit">

                </div>

            </form>

        </body>

    </html>

    <?php
}

// connectie database

require_once('db.php');
$mysqli->select_db("project");



// checken of het formulier is gesubmit

if (isset($_POST['submit'])) {

// kijken of ID bestaat

    if (is_numeric($_POST['id'])) {

// verkrijgen van de formulier gegevens en kijken of hij valid is

        $id = $_POST['id'];

        $beginjaar = mysql_real_escape_string(htmlspecialchars($_POST['beginjaar']));

        $functie = mysql_real_escape_string(htmlspecialchars($_POST['functie']));

        $functie_omschrijving = mysql_real_escape_string(htmlspecialchars($_POST['functie_omschrijving']));





// check of de data bestaat

        if ($beginjaar == '' || $functie == '' || $functie_omschrijving == '') {

// genereren van error bericht

            $error = 'ERROR: Vul de verplichte velden in!!';
            echo $error;


//error display

            renderForm($beginjaar, $functie, $functie_omschrijving);
        } else {

// data opslaan in de database

            $sqlwerkervaringedit = "UPDATE werkervaring SET beginjaar='$beginjaar', functie='$functie', functie_omschrijving='$functie_omschrijving' WHERE ID='$id'";
            $editwerkervaring = $mysqli->query($sqlwerkervaringedit);





// als hij is opgeslagen naar de page

            header("Location: werkervaring.php");
        }
    } else {

// als de ID niet valid is

        echo 'Error!';
    }
} else {

// had het formulier niet is submit,krijgt hij de data en laat het formulier zien
// ophalen van id van de URL als het bestaat, zeker weten dat hij bestaat en zorgen dat hij groter is dan 0


    if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0) {

// query database

        $id = $_GET['id'];


        $sqlwerkervaring = "SELECT * FROM werkervaring WHERE id=$id";
        $werkervaring = $mysqli->query($sqlwerkervaring);


        $row = mysqli_fetch_array($werkervaring);


        // check dat de ID gelijk is met de rij in de database

        if ($row) {



// data ophalen van database

            $beginjaar = $row['beginjaar'];

            $functie = $row['functie'];

            $functie_omschrijving = $row['functie_omschrijving'];


// zien formulier

            renderForm($id, $beginjaar, $functie, $functie_omschrijving, '');
        } else {

// bij geen match

            echo "Geen resultaten!";
        }
    } else {

// Als ID niet goed of niet bestaat

        echo 'Error!';
    }
}
?>