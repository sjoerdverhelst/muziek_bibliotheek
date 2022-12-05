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
}