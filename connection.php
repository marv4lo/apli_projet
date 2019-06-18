<?php
// set page headers
$page_title = "Connection";
include_once "header.php";

// include database and object user file
include_once 'classes/database.php';
include_once 'classes/user.php';
include_once 'initial.php';

if($_POST)
{
    $user = new User($db);
    
    if($user->connect2()){
        
        $_SESSION['login'] = $_POST['nom']; //enregistre le nom dans la variable de session 
        $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous êtes connecté';
        $_SESSION['message']=$message;
        
        echo $message;
        
        header("Location: index.membre.php");
        exit();
}

    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! Impossible de se connecter.";
        echo "</div>";
    }
}

?>

<!-- Bootstrap Form for creating a user -->
<form action='connection.php' role="form" method='post'>

    <table class='table table-hover '>
        <tbody class="table-bordered"><tr>
            <th><label for="nom">Nom : </label></th>
            <td>
                <input type="text" name="nom" id="nom" required />
            </td>
        </tr>
        <tr>
            <th><label for="pass">Mot de passe : </label></th>
            <td>
                <input type="password" name="pass" id="pass" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Envoyer" id = "valider" /></td>
        </tr>
        </tbody>

    </table>
</form>
  
<?php
include_once "footer.php";
?>

