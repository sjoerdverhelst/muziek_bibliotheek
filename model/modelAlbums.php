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