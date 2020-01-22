<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error){
            die("Connection failed: ".$db->connect_error);
        }
    }

    public function getCartElementsOf($id){
        $stmt = $this->db->prepare("SELECT id_articolo FROM carrello WHERE id_carrello = ?");
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventsByCategory($category){
        if($category == '*'){
            $stmt = $this->db->prepare("SELECT id_articolo, nome, autore, luogo, immagine FROM articolo");
        } else {
            $stmt = $this->db->prepare("SELECT id_articolo, nome, autore, luogo, immagine FROM articolo WHERE tipo = ?");
            $stmt->bind_param('s', $category);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT id_articolo, nome, autore, luogo, immagine FROM articolo ORDER BY RAND() DESC"; //WHERE data > dataoggi  && data
        if($n > 0){
            $query .= " LIMIT ?";
        }
        $stmt = $this->db->prepare($query);
        if($n > 0){
            $stmt->bind_param('i',$n);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticle($id){
        $query = "SELECT id_articolo, nome, autore, luogo, immagine FROM articolo WHERE id_articolo = ? ORDER BY id_articolo DESC"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticle($titoloarticolo, $autore, $luogo, $tipo, $imgarticolo){
        $query = "INSERT INTO articolo (nome, autore, luogo, tipo, immagine) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss',$titoloarticolo, $autore, $luogo, $tipo, $imgarticolo);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function addEventInCart($id_cart, $id_event){    //aggiungere quantità
        $query = "INSERT INTO carrello (id_carrello, id_articolo) VALUES (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id_cart, $id_event);
        $stmt->execute();

        return $stmt;
    }

    public function checkLogin($username, $password){
        $query = "SELECT id, username, nome FROM user_login WHERE username = ? AND password = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result;
    }

    public function isThereUsername($username){
        $query = "SELECT username FROM user_login WHERE username = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();

        return mysqli_num_rows($result);
    }

    public function signUp($username, $password, $name, $surname, $birthday){
        $query = "INSERT INTO `user_login`(`username`, `Password`, `nome`, `cognome`, `data_nascita`) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss',$username, $password, $name, $surname, $birthday);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

?>
