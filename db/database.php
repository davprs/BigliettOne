<?php

class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error){
            die("Connection failed: ".$db->connect_error);
        }
    }

    public function removeOneArticle($id_event, $id_cart){
        $query = "SELECT quantita FROM carrello WHERE id_carrello2 = ? AND id_articolo = ?"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id_cart, $id_event);
        $stmt->execute();
        $result = $stmt->get_result();
        $ricorrenze = mysqli_num_rows($result);
        $result = $result->fetch_all(MYSQLI_ASSOC)[0];

        $newQuantity = $result["quantita"] - 1;
        $query = "UPDATE `carrello` SET `quantita` = ? WHERE `id_carrello2` = ? AND `id_articolo` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii',$newQuantity, $id_cart, $id_event);
        $stmt->execute();

    }

    public function addOneArticle($id_event, $id_cart){
        $query = "SELECT quantita FROM carrello WHERE id_carrello2 = ? AND id_articolo = ?"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id_cart, $id_event);
        $stmt->execute();
        $result = $stmt->get_result();
        $ricorrenze = mysqli_num_rows($result);
        $result = $result->fetch_all(MYSQLI_ASSOC)[0];

        $newQuantity = $result["quantita"] + 1;
        $query = "UPDATE `carrello` SET `quantita` = ? WHERE `id_carrello2` = ? AND `id_articolo` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('iii',$newQuantity, $id_cart, $id_event);
        $stmt->execute();
    }

    public function removeFromCart($idArticolo, $idCarrello){
        $stmt = $this->db->prepare("DELETE FROM `carrello` WHERE `id_carrello2` = ? AND `id_articolo` = ?");
        $stmt->bind_param('ii', $idCarrello, $idArticolo);
        $stmt->execute();
    }

    public function getCartByUsername($username){
        $stmt = $this->db->prepare("SELECT `carrello` FROM user_login WHERE username = ? LIMIT 1");
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getQuantity($cartId, $articleId){
        $stmt = $this->db->prepare("SELECT quantita FROM carrello WHERE id_carrello2 = ? AND id_articolo = ? ");
        $stmt->bind_param('ss',$cartId, $articleId);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartElementsOf($id){
        $stmt = $this->db->prepare("SELECT id_articolo FROM carrello WHERE id_carrello2 = ? AND id_articolo IS NOT NULL ");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventsByCategory($category){
        if($category == '*'){
            $stmt = $this->db->prepare("SELECT id_articolo, nome, prezzo, descrizione_breve, autore, luogo, immagine FROM articolo");
        } else {
            $stmt = $this->db->prepare("SELECT id_articolo, nome, prezzo, descrizione_breve, autore, luogo, immagine FROM articolo WHERE tipo = ?");
            $stmt->bind_param('s', $category);
        }
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPosts($n=-1){
        $query = "SELECT id_articolo, nome, autore, prezzo, descrizione_breve, immagine FROM articolo ORDER BY RAND() DESC"; //WHERE data > dataoggi  && data
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

    public function getAddress($id){
        $query = "SELECT via, civico, citta, cap FROM indirizzo WHERE id_indirizzo = ? LIMIT 1"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getArticle($id){
        $query = "SELECT id_articolo, nome, descrizione, prezzo, autore, luogo, immagine FROM articolo WHERE id_articolo = ? ORDER BY id_articolo DESC"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertArticle($titoloarticolo, $autore, $luogo, $data, $tipo, $imgarticolo, $descrzione, $descrizione_breve, $prezzo){
        $query = "INSERT INTO articolo (nome, autore, luogo, data, tipo, immagine, prezzo, descrizione, descrizione_breve) VALUES (?, ?, 2, ?, ?, ?, ?, ?, ?)";
        //$query = "INSERT INTO articolo (nome, autore, luogo) VALUES (?, ?, 1)";

        $date_field = date('Y-m-d',strtotime($data));

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssiss',$titoloarticolo, $autore, $date_field, $tipo, $imgarticolo, $prezzo, $descrzione, $descrizione_breve);
        $stmt->execute();

        return $stmt->insert_id;
    }

    public function addEventInCart($id_cart, $id_event, $quantity){
        $query = "SELECT quantita FROM carrello WHERE id_carrello2 = ? AND id_articolo = ?"; //WHERE data > dataoggi  && data
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ii',$id_cart, $id_event);
        $stmt->execute();
        $result = $stmt->get_result();
        $ricorrenze = mysqli_num_rows($result);
        $result = $result->fetch_all(MYSQLI_ASSOC)[0];

        if( $ricorrenze >= 1){
            $newQuantity = $quantity + $result["quantita"];
            $query = "UPDATE `carrello` SET `quantita` = ? WHERE `id_carrello2` = ? AND `id_articolo` = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iii',$newQuantity, $id_cart, $id_event);
            $stmt->execute();
        } else {
            $query = "INSERT INTO carrello (id_carrello2, id_articolo, quantita) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('iii',intval($id_cart), $id_event, $quantity);
            $stmt->execute();

            return $stmt;
        }
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

    public function createCart(){
        $query = "SELECT `id` FROM user_login ORDER BY id DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC)[0];
        $id = intval($res["id"]) + 1;

        $query = "INSERT INTO `carrello`(`id_carrello2`) VALUES ('".$id."')";
        $stmt = $this->db->prepare($query);
        //$stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();

        return $id;
    }

    public function signUp($username, $password, $name, $surname, $birthday, $myCart){
        $query = "INSERT INTO `user_login`(`username`, `Password`, `nome`, `cognome`, `data_nascita`,`carrello`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssi',$username, $password, $name, $surname, $birthday, $myCart);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }
}

?>
