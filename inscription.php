<?php
// set page headers
$page_title = "Inscription";
include_once "header.php";

// include database and object user file
include_once 'classes/database.php';
include_once 'initial.php';

if($_POST){
    include_once 'classes/user.php';
    $user = new User($db);
    
    $user->nom = htmlentities(trim($_POST['nom']));
    $user->prenom = htmlentities(trim($_POST['prenom']));
    $user->email = htmlentities(trim($_POST['email']));
    $user->pass = htmlentities(trim($_POST['pass']));
    $user->pass = htmlentities(trim($_POST['passconf']));
    
    if($user->verif() && $user->inscrip())
    {
        if($_POST['pass']!=$_POST['passconf'])
        {
            echo('Mot de passe et confirmation différent');
        }else{

        //session_start();
        $_SESSION['login'] = $_POST['nom'];
        $message = 'Bonjour '.htmlspecialchars($_SESSION['login']).', vous pouvez cliquer sur connection';
        $_SESSION['message1'] = $message;

          header("Location: index.php");
            exit();
        
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                        &times;
                  </button>";
            echo "Success! ". ($_SESSION['login']. " " . $_SESSION['message1']);        
        echo "</div>";
    }
    }

    else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "<button type='button' class='close' data-dismiss='alert' aria-hidden=\"true\">
                  </button>";
            echo "Error! Impossible de creer un utilisateur.<i class='far fa-sad-cry'></i>";
        echo "</div>";
        }
}

?>

<!-- Bootstrap Form for creating a user -->
<form action='inscription.php' role="form" method='post'>

    <table class='table table-hover'>
        <tbody  class="table-bordered"><tr>
            <td>Nom</td>
            <td><input type='text' name='nom' class='form-control' placeholder="Nom" required></td>
        </tr>
        <tr>
            <td>prenom</td>
            <td><input type='text' name='prenom' class='form-control' placeholder="prenom" required></td>
        </tr>
         <tr>
            <td>Mail</td>
            <td><input type='email' name='email' class='form-control' placeholder="email" required></td>
        </tr>

        <tr>
            <td>Mot de passe</td>
            <td><input type='text' name='pass' class='form-control' placeholder="mot de passe" required minlenght="8" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
       title="Une lettre capitale un chiffre ou un caractère spécial et 8 caractères minimum"></td>
        </tr>
        <tr>
            <td>Confirmer le mot de passe</td>
            <td><input type='text' name='passconf' class='form-control' placeholder="confirmer le mot de passe" required>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Creer
                </button>
            </td>
            </tr>
        </tbody>

    </table>
</form>
  
<?php
include_once "footer.php";
?>

