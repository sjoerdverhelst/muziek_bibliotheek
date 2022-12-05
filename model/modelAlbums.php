<?php

class modelAlbums{
    
    public $link;

    function __construct(){
        //roept de class aan DB
        $db_connection = new db();
        $this->link = $db_connection->connect();
    }

    public function showAllAlbums(){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM albums");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function showAllAlbumsDESC(){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM albums ORDER BY id DESC LIMIT 5");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function showAlbumById($id){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM albums WHERE id = $id");
        //
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    
    
}

if (isset($_POST['submit'])) {
    include "connection.php";
    $db_connection = new db();
    $pdo = $db_connection->connect();
    $naam = $_POST['naam'];
    $jaartal = $_POST['Jaartal'];
    $id = $_POST['id'];

    $data = [
        'naam' => $naam,
        'jaartal' => $jaartal,
        'id' => $id,
    ];
    $sql = "UPDATE albums SET naam=:naam, jaartal=:jaartal WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: http://localhost/muziek_bibliotheek/?page=album');
}