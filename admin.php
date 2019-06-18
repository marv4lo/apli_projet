<?php
include_once 'classes/database.php';
include_once 'classes/entreprise.php';
include_once 'initial.php';

// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 5; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query limit clause

// instantiate database and entreprise object
$entreprise = new Entreprise($db);

// include header file
$page_title = "Entreprises pour les stagiaires de l'IUT de lannion";
include_once "header.php";

if(!isset($_SESSION['admin']))
{
    die('vous devez etre enregistré pour acceder à cette page');
    echo $_SESSION['admin'];
    echo $_SESSION['message_admin'];
}
// create entreprise button
echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn btn-primary pull-right'>";
echo "<span class='fa fa-plus-circle'></span> création d'une entreprise";
echo "</a>";
echo "</div>";

// select all entreprises
$prep_state = $entreprise->getAllEntreprises($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    echo "<table class='table table-hover table-responsive'>";
    echo "<thead class='table-bordered'<tr>";
    echo "<th>Nom de l'entreprise</th>";
    echo "<th>Nom du contact</th>";
    echo "<th>email</th>";
    echo "<th>Ville</th>";
    echo "<th>Actions</th>";
    echo "</tr></thead>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tbody class='table-bordered'><tr>";

        echo "<td>$row[namecie]</td>";
        echo "<td>$row[namecontact]</td>";
        echo "<td>$row[email]</td>";
        echo "<td>$row[city]</td>";

        echo "<td>";
        // edit button
        echo "<a href='edit.php?id=" . $id . "' class='btn btn-warning left-margin' title='editer'>";
        echo "<span class='fas fa-edit'></span>";
        echo "</a>";

        // delete button
        echo "<a href='delete.php?id=" . $id . "' class='btn btn-danger delete-object' title='supprimer'>";
        echo "<span class='fas fa-eraser'></span>";
        echo "</a>";

        echo "</td>";
        echo "</tr></tbody>";
    }

    echo "</table>";

    // include pagination file
    include_once 'pagination.php';
}

// if there are no entreprise
else{
    echo "<div> Aucune entreprise trouvée. </div>";
    }
?>


<?php
include_once "footer.php";
?>