
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hobbys</title>

        <link rel="stylesheet" type="text/css" href="projectkbs.css">

    </head>
    <body>

        <?php
        echo "<td><div class='round-button'><div class='round-button-circle'><a href='index.php' class='round-button'>Home</a></div></div></td>";
        require_once('db.php');
        $mysqli->select_db("project");

        $sqlhobby = "SELECT * FROM hobby";
        $hobby = $mysqli->query($sqlhobby);


        echo "<table class='responstable'>";
        echo "<center><h2>Hobby's</h2></center>";
        echo "<tr><th><b>Soort<b></th>";
        echo "<th><b>Omschrijving</b></th>";

        if ($hobby != NULL && $hobby->num_rows > 0) {
            while ($hobbyprinten = $hobby->fetch_assoc()) {
                echo "<tr>";
                echo "<td width='10%'>" . $hobbyprinten["soort"] . "</td>";
                echo "<td>" . $hobbyprinten["omschrijving"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";

        $mysqli->close();
        ?>

    </body>
</html>