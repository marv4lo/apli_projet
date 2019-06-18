<?php
session_start(); /* Démarre une session si aucune n'est déjà existante et enregistre le nom dans la variable de session $_SESSION['login'] ou $_SESSION['admin'] qui donne au visiteur ou à l'administrateur la possibilité de se connecter.*/

ini_set('display_errors', 1); // see an error when they pop up
error_reporting(E_ALL); // report all php errors
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $page_title; ?></title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <link href="library/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="./library/images/iut.png" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" > 
           
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil
                        <span  class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connection.php">
                            <?php if(isset($_SESSION['message']))
                            { echo "<i class='fas fa-user-check'></i>";
                            }
                            else {echo "<i class='fas fa-user-lock'></i>";
                            }
                            echo "Connection";
                            ?>
                            </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php"><i class="fas fa-user-plus"></i>Inscription</a>
                    </li>
                    <li class="navbar-text">
                        <a><?php if(isset($_SESSION['message1'])){
                            echo (htmlspecialchars($_SESSION['message1']));

                            }
                            else if (isset($_SESSION['message'])){
                                echo (htmlspecialchars($_SESSION['message']));
                                    echo ("<li class='nav_item'>
                                    <a class='nav-link' href='logout.php'>Déconnection</a>
                                </li>");
                            }
                            ?>
                        </a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <!--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
                    <div>
                        <?php if(isset($_SESSION['message'])){
                        echo "<i class='fas fa-user-check'></i>";
                        } else {
                                echo "<a class='nav-link' href='connectionadmin.php'><i class='fas fa-user-lock'></i>Administrateur</a>";
                               }
                        ?>
                    </div>
                </form>
            </div>
        </nav>

    <!-- container -->
    <div class="container">

       <div class="page-header">
        
            <?php echo "<h1>{$page_title}</h1>";?>
        
        </div>


        <!-- For the following code look at footer.php -->
