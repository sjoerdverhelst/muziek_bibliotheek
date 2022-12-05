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

    public function deleteAlbum($id){

        //stuurt een query naar de database
        $stm = $this->link->query("DELETE FROM albums WHERE id = $id");
        //
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        header('Location: http://localhost/muziek_bibliotheek/?page=album');
    }
}
if (isset($_POST['AddAlbum'])) {
    include "connection.php";
    $db_connection = new db();
    $pdo = $db_connection->connect();
    
    $naam = $_POST['naam'];
    $jaartal = $_POST['jaartal'];
    $data = [
            'naam' => $naam,
            'jaartal' => $jaartal
        ];
        $sql = "INSERT INTO albums (naam, jaartal) VALUES (:naam, :jaartal)";
        $stmt= $pdo->prepare($sql);
        $stmt->execute($data);

    header('Location: http://localhost/muziek_bibliotheek/?page=album');
}

if (isset($_POST['UpdateAlbum'])) {
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