<?php
namespace Connections;
use PDO; 

class Connection{
    function conexao(){
        $hostname = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'api';

        try{
            $pdo = new PDO ("mysql:host = $hostname; dbname=$dbname", $username, $password);
            return $pdo;
        }
    }
}


