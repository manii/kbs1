

<html>

    <head>

        <meta charset="UTF-8">
        <title>werkervaring</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="projectkbs.css">

    </head>

    <body>



        <?php
        echo "<td><div class='round-button'><div class='round-button-circle'><a href='index.php' class='round-button'>Home</a></div></div></td>";






// connectie database

        require_once('db.php');
        $mysqli->select_db("project");


// resultaten van database

        $sqlwerkervaring = "SELECT * FROM werkervaring we JOIN werkgever wg ON we.werkgever_id = wg.werkgever_id ORDER BY beginjaar desc";
        $werkervaring = $mysqli->query($sqlwerkervaring);
// Data in tabel




        echo "<table class='responstable'>";
        echo "<center><h2>Werkervaring</h2></center>";
        echo "<tr><th><b>Beginjaar<b></th>";
        echo "<th><b>Functie</b></th>";
        echo "<th><b>Omschrijving</b></th>";
        echo "<th><b>Werkgever</b></th>";
        echo "<th><b>Plaats</b></th>";
        echo "<th><b>Link</b></th>";
        echo "<th><b> </b></th>";
        echo "<th><b> </b></th></tr>";



        //loop door resultaten van database query, laat het zien in de tabel

        if ($werkervaring != NULL) {
            if ($werkervaring->num_rows) {
                while ($weprinten = mysqli_fetch_assoc($werkervaring)) {
                    echo "<tr>";
                    echo "<td>" . $weprinten["beginjaar"] . "</td>";
                    echo "<td>" . $weprinten["functie"] . "</td>";
                    echo "<td>" . $weprinten["functie_omschrijving"] . "</td>";
                    echo "<td>" . $weprinten["werkgevernaam"] . "</td>";
                    echo "<td>" . $weprinten["vestigingsplaats"] . "</td>";
                    echo "<td>" . '<a target="_blank" href="' . $weprinten["link"] . '">' . $weprinten["link"] . '</a>' . "</td>";


                    echo '<td><a href="editwerkervaring.php?id=' . $weprinten['ID'] . '"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>';

                    echo '<td><a href="deletewerkervaring.php?id=' . $weprinten['ID'] . '"><i class="fa fa-trash" aria-hidden="true"></i></a></td>';

                    echo "</tr>";
                }
            } else {
                echo("0 results");
            }
        }


        echo "</table>";

        $mysqli->close();
        ?>
        <p><a href = "newwerkervaring.php">Add a new record</a></p >

    </body>

</html>

