<?php

//set page headers
$page_title = "Delete entreprise";
include_once "header.php";
include_once 'classes/database.php';
include_once 'classes/entreprise.php';
include_once 'initial.php';
// get database connection

$entreprise = new Entreprise($db);

// check if the submit button yes was clicked
if (isset($_POST['del-btn']))
{
    $id = $_GET['id'];
    $entreprise->delete($id);
    echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                    &times;
              </button>";
        echo "Success! l'entreprise est supprimée.";
    echo "</div>";
    echo "<div class='right-button-margin'>";
        echo "<a href='admin.php' class='btn btn-info pull-right'>";
            echo "<span class='glyphicon glyphicon-list-alt'>";
            echo "</span> Retour à la liste des entreprises ";
        echo "</a>";
    echo "</div>";

        exit();
}
?>
<!-- Bootstrap Form for deleting a entreprise -->
<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='table table-hover table-responsive table-bordered'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert alert-warning'>";
                        echo"Voulez vraiment la supprimer?";
                    echo"</div>";
                echo"<button type='submit' class='btn btn-danger' name='del-btn'>";
                    echo"Oui";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='admin.php' class='btn btn-default' role='button'>";
                    echo" Non";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  // Back to the first page
        echo"<a href='delete.php' class='btn btn-large btn-success'><span class='glyphicon glyphicon-backward'></span> Accueil </a>";
     }
?>

<?php
include_once "footer.php";
?>