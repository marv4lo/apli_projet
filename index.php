<?php
$_SESSION = array();

// Pour détruire complètement la session, il faut éffacer également le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
session_destroy();

// include database and object files
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

// select all entreprise
$prep_state = $entreprise->getAllEntreprises($from_record_num, $records_per_page); //Name of the PHP variable to bind to the SQL statement parameter.
$num = $prep_state->rowCount();

// check if more than 0 record found
if($num>=0){

    
    echo "<table class='table table-hover'>";
    echo "<thead class='table-bordered thead-dark '><tr>";
    echo "<th>Nom de l'entreprise</th>";
    echo "</tr></thead>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //Import variables into the current symbol table from an array

        echo "<tbody class='table-bordered'><tr>";

        echo "<td>$row[namecie]</td>";

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