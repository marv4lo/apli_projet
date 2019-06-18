<?php

class User
{
    public $db_conn;
    public $table_name = "membres";

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $pass;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function inscrip(){
        
        $sql = "INSERT INTO " . $this->table_name . " SET nom = ?, prenom = ?, email = ?, pass = ?";
        
        $prep_state = $this->db_conn->prepare($sql);
        $this->pass=password_hash($_POST['pass'],PASSWORD_BCRYPT);

        $prep_state->bindParam(1, $this->nom);
        $prep_state->bindParam(2, $this->prenom);
        $prep_state->bindParam(3, $this->email);
        $prep_state->bindParam(4, $this->pass);
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function verif(){
        $sql = "SELECT * FROM " . $this->table_name . " WHERE nom = :nom";
        
        $prep_state = $this->db_conn->prepare($sql);
      
        $prep_state->execute(array(':nom'=>$_POST['nom']));
        $resultat = $prep_state->fetchAll(); 
        $result = count($resultat);

        if ($result == 0 ) {
            return true;
        } else {
            return false;
        }
    }
    
    function connect(){
        $sql = "SELECT nom, pass FROM admin WHERE nom = :nom AND pass = :pass ";
        
        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute(array(':nom'=>$_POST['nom'],':pass'=>$_POST['pass']));
        $resultat = $prep_state->fetchAll();       
        $nb_result = count($resultat);

      if ($nb_result == 1){;
            return true;
        } else {
            return false;
        }
    }
    
    function connect2(){
            
        $sql= "SELECT  nom, pass FROM " . $this->table_name . " WHERE nom=:nom";
            
            $prep_state = $this->db_conn->prepare($sql);
            
            $prep_state -> execute(array(':nom'=>$_POST['nom']));
            $user = $prep_state->fetch();

            if (password_verify($_POST['pass'], $user['pass'])){
                //var_dump($user['pass']);
                return true;
            } else {
                return false;
            }
    }
}

?>




