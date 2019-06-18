<?php

// set page headers
$page_title = "Creer une nouvelle entreprise";
include_once "header.php";

echo "<div class='right-button-margin'>";
    echo "<a href='admin.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Retour à la liste des entreprises ";
    echo "</a>";
echo "</div>";

// get database connection
include_once 'classes/database.php';
include_once 'initial.php';


// check if the form is submitted
if ($_POST){

    // instantiate entreprise object
    include_once 'classes/entreprise.php';
    $entreprise = new Entreprise($db);

    // set entreprise property values
    $entreprise->namecie = htmlentities(trim($_POST['namecie']));
    $entreprise->namecontact = htmlentities(trim($_POST['namecontact']));
    $entreprise->email = htmlentities(trim($_POST['email']));
    $entreprise->city = htmlentities(trim($_POST['city']));

    // if the entreprise able to create
    if($entreprise->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Entreprise crée avec succes.";
        echo "</div>";
    }

    // if the entreprise unable to create
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Impossible de creer l'entreprise.";
        echo "</div>";
    }
}
?>

<!-- Bootstrap Form for creating a entreprise -->
<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nom de l'entreprise</td>
            <td><input type='text' name='namecie' class='form-control' placeholder="Nom de l'entreprise" required></td>
        </tr>

        <tr>
            <td>Nom du tuteur</td>
            <td><input type='text' name='namecontact' class='form-control' placeholder="Nom du contact" required></td>
        </tr>

        <tr>
            <td>Adresse mail</td>
            <td><input type='email' name='email' class='form-control' placeholder="Adresse  email" required></td>
        </tr>
        
        <tr>
            <td>Ville</td>
            <td><input type='text' name='city' class='form-control' placeholder="Ville" required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Creer
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

