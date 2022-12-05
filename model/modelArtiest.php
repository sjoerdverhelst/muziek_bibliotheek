<?php

class modelArtiest{
    
    public $link;

    function __construct(){
        //roept de class aan DB
        $db_connection = new db();
        $this->link = $db_connection->connect();
    }

    public function showAll(){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM artiest");
        //
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function showArtiestById($id){
        //stuurt een query naar de database
        $stm = $this->link->query("SELECT * FROM artiest WHERE id = $id");
        //
        $row = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }
}