

/*
* To change this license header, choose License Headers in Project Properties.
* To change this template file, choose Tools | Templates
* and open the template in the editor.
*/

<?php
// connectie database

require_once('db.php');
$mysqli->select_db("project");



//check of de ID variabel in de URL staat en valid is

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

// get ID

    $id = $_GET['id'];



// deleten van de rij
    $delete = "DELETE FROM werkervaring WHERE id=$id";
    $updatdelete = $mysqli->query($delete);






// terug naar de pagina

    header("Location: werkervaring.php");
} else {

// als ID niet klopt terug naar site

    header("Location: werkervaring.php");
}
?>