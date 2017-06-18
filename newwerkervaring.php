<?php
/*
 * Requiring of documents on top of page!
 */
// connectie database


require_once('db.php');
$mysqli->select_db("project");

// Check of het formulier is ingevuld, zo ja, start het proces
if (isset($_POST['submit'])) {
    // data validatie
    $beginjaar = mysql_real_escape_string(htmlspecialchars($_POST['beginjaar']));
    $functie = mysql_real_escape_string(htmlspecialchars($_POST['functie']));
    $functie_omschrijving = mysql_real_escape_string(htmlspecialchars($_POST['functie_omschrijving']));

    // check of alles is ingevuld
    if ($beginjaar == '' || $functie == '' || $functie_omschrijving == '') {

        // bericht error
        $error = 'ERROR: Vul de verplichte velden in!';

        // als een veld blanco is, laat hij het formulier nogmaals zien
        renderForm($beginjaar, $functie, $functie_omschrijving);
    } else {

        // data opslaan in de database
        $sqlwerkervaring = "INSERT INTO werkervaring SET beginjaar='$beginjaar', functie='$functie', functie_omschrijving='$functie_omschrijving' ";
        $werkervaring = $mysqli->query($sqlwerkervaring);

        //na het opslaan terug naar werkervaring.php
        header("Location: werkervaring.php");
    }
} else {
    // wanneer het formulier niet gesubmit is
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <title>werkervaring toevoegen</title>

            <link rel="stylesheet" type="text/css" href="projectkbs.css">
        </head>

        <body>
            <div class='round-button'>
                <div class='round-button-circle'><a href='werkervaring.php' class='round-button'>Terug</a></div>
            </div>
            <?php
            //            echo "<td><div class='round-button'><div class='round-button-circle'><a href='werkervaring.php' class='round-button'>Terug</a></div></div></td>";
            //als er errors zijn laat hij dit zien
            if ($error != '') {

                echo $error;
            }

            //            echo "<div>";
            //            echo "<table class='responstable'>";
            //            echo "<center><h2>Werkervaring</h2></center>";
            //            echo "<tr><th><b>Beginjaar *<b></th>";
            //            echo "<th><b>Functie *</b></th>";
            //            echo "<th><b>Omschrijving *</b></th>";
            //            echo "<th><b>Kies werkgever *</b></th>";
            ?>
            <div>
                <center><h2>Toevoegen werkervaring</h2></center>
                <form action="" method="post">
                    <table class='responstable'>
                        <tr>
                            <th><b>Beginjaar *</b></th>
                            <th><b>Functie *</b></th>
                            <th><b>Omschrijving *</b></th>
                            <th><b>Kies werkgever *</b></th>
                        </tr>

                        <tr>
                            <td><input type="number" name="beginjaar" max="9999" /></td>
                            <td><input type="text" name="functie" /></td>
                            <td><input type="text" name="functie_omschrijving" /></td>
                            <td>
                                <label>Select werkgever</label>
                                <select class="form-control" name="werkgevernaam">
                                    <?php
                                    $result = $mysqli->query("SELECT werkgevernaam FROM werkgever ORDER BY werkgever_id");
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option id='" . $row['werkgevernaam'] . "'>" . $row['werkgevernaam'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Submit"></td>

                        </tr>
                    </table>
                    <p>Nieuwe werkgever <a href='nieuwewerkgever.php' class='round-button'>klik hier</a></p>
                </form>
            </div>

        </body>
    </html>
    <?php
}



