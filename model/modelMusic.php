<?php

class modelMusic{
    
    public $link;

    function __construct(){
        //roept de class aan DB
        $db_connection = new db();
        $this->link = $db_connection->connect();
    }

    public function showAllNummers(){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM nummers");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function showNummerById($id){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM nummers WHERE id = $id");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function showAllNummersDESC5(){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM nummers ORDER BY id DESC LIMIT 5");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }

    public function showMusicByAlbumId($id){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM nummers WHERE album_id = $id");
        //
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    public function deleteNummer($id){

        //stuurt een query naar de database
        $stm = $this->link->query("DELETE FROM nummers WHERE id = $id");
        //
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        header('Location: http://localhost/muziek_bibliotheek/?page=music');
    }
}



if (isset($_POST['AddMusic'])) {
    include "connection.php";
    $db_connection = new db();
    $pdo = $db_connection->connect();

    $naam = $_POST['naam'];
    $album_id = $_POST['album_id'];
    $artiest_id = $_POST['artiest_id'];

    $data = [
        'naam' => $naam,
        'artietst_id' => $artiest_id,
        'album_id' => $album_id
    ];
    $sql = "INSERT INTO nummers (naam, artietst_id, album_id ) VALUES (:naam, :artietst_id, :album_id)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute($data);


    header('Location: http://localhost/muziek_bibliotheek/?page=music');
}


if (isset($_POST['UpdateMusic'])) {
    include "connection.php";
    $db_connection = new db();
    $pdo = $db_connection->connect();

    $id = $_POST['id'];
    $naam = $_POST['naam'];
    $album_id = $_POST['album_id'];
    $artiest_id = $_POST['artiest_id'];

    $data = [
        'naam' => $naam,
        'artietst_id' => $artiest_id,
        'album_id' => $album_id,
        'id' => $id
        
    ];
    $sql = "UPDATE nummers SET naam=:naam, artietst_id=:artietst_id , album_id=:album_id  WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: http://localhost/muziek_bibliotheek/?page=music');
}