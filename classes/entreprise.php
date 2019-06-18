<?php

class Entreprise
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "entreprise";

    // object properties
    
    public $namecie;
    public $namecontact;
    public $email;
    public $city;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET namecie = ?, namecontact = ?, email = ?, city = ? ";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->namecie);
        $prep_state->bindParam(2, $this->namecontact);
        $prep_state->bindParam(3, $this->email);
        $prep_state->bindParam(4, $this->city);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET 
            namecie = :namecie,
            namecontact = :namecontact,
            email = :email,
            city  = :city WHERE id=:id";
            
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(':namecie', $this->namecie);
        $prep_state->bindParam(':namecontact', $this->namecontact);
        $prep_state->bindParam(':email', $this->email);
        $prep_state->bindParam(':city', $this->city);
        
        $prep_state->bindParam(':id', $this->id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute(array(":id" => $_GET['id']))) {
            return true;
        } else {
            return false;
        }
    }

    
    function getAllEntreprises($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, namecie, namecontact, email, city FROM " . $this->table_name . " ORDER BY namecie ASC LIMIT ?, ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);

        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    function getEntreprise()
    {
        $sql = "SELECT namecie, namecontact, email, city FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->namecie = $row['namecie'];
        $this->namecontact = $row['namecontact'];
        $this->email = $row['email'];
        $this->city = $row['city'];
    }
}







