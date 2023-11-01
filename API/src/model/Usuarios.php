<?php 

namespace models;
require ("vendor/autoload.php");
use Connections\Connection;
use PDO; 

class Users{
    public function CriarUser($nome,$email, $senha){
        $connection = new Connection ();
        $sql = $connection -> conexao () -> query ("INSERT INTO users (nome,email,senha) VALUES ('$nome','$email','$senha')");
        $sql = $sql -> fetchAll (PDO::FETCH_ASSOC);
        return $sql;
    }

    public function mostrarUser(){
        $conexao = new Connection();
        $result = $conexao -> conexao()->query("SELECT id,nome, email FROM users");
        $result = $result->fetchAll(PDO::FETCH_ASSOC);
        return isset($result[0]) ? $result:0;
    }
}