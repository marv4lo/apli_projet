<?php
// set page headers
$page_title = "Modifier une entreprise";
include_once "header.php";

// read entreprise button
echo "<div class='right-button-margin'>";
    echo "<a href='admin.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Retour à l'accueil ";
    echo "</a>";
echo "</div>";

// isset() is a PHP function used to verify if ID is there or not
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// include database and object entreprise file
include_once 'classes/database.php';
include_once 'classes/entreprise.php';
include_once 'initial.php';

// instantiate entreprise object
$entreprise = new Entreprise($db);
$entreprise->id = $id;
$entreprise->getEntreprise();

// check if the form is submitted
if($_POST)
{
    // set entreprise property values
    $entreprise->namecie = htmlentities(trim($_POST['namecie']));
    $entreprise->namecontact = htmlentities(trim($_POST['namecontact']));
    $entreprise->email = htmlentities(trim($_POST['email']));
    $entreprise->city = htmlentities(trim($_POST['city']));

    // Edit entreprise
    if($entreprise->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! entreprise modifiée.";
        echo "</div>";
    }

    // if unable to edit entreprise
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Impossible de modifier l'entreprise.";
        echo "</div>";
    }
}
?>

    <!-- Bootstrap Form for updating a entreprise -->
    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover'>
            <tbody class="table-bordered">
            <tr>
                <td>Nom de l'entreprise</td>
                <td><input type='text' name='namecie' value='<?php echo $entreprise->namecie;?>' class='form-control' placeholder="Nom de l'entreprise" required></td>
            </tr>

            <tr>
                <td>Nom du contact</td>
                <td><input type='text' name='namecontact' value='<?php echo $entreprise->namecontact;?>' class='form-control' placeholder="Nom du contact" required></td>
            </tr>

            <tr>
                <td>Adresse mail de l'entreprise</td>
                <td><input type='email' name='email' value='<?php echo $entreprise->email;?>' class='form-control' placeholder="mail de l'entreprise" required></td>
            </tr>
            
            <tr>
                <td>Ville</td>
                <td><input type='text' name='city' value='<?php echo $entreprise->city;?>' class='form-control' placeholder="ville" required></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> Update
                    </button>
                </td>
            </tr>
</tbody>
        </table>
    </form>

<?php
include_once "footer.php";
?>