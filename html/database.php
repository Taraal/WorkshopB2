<?php

class config
{
    // const SERVERNAME="127.0.0.1";
    const SERVERNAME = "127.0.0.1";
    const PORT = "3307";
    const DBNAME = "workshopb2";
    const USER = "root";
    const PASSWORD = "";
    
}

class database
{
    private $db;

    static public function connect()
    {
        $db = new PDO("mysql:host=" . Config::SERVERNAME . ";port=" . Config::PORT . ";dbname=" . Config::DBNAME, Config::USER, Config::PASSWORD, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $db;
    }

    static public function testconnection($name,$password){


        $req = (database::connect())->prepare("select * from personnes");
        $req->bindParam(':iden', $name);
        $req->execute();

        $result = $req->fetchAll();
        var_dump($result);            

    }

};