<?php
header("Access-Control-Allow-Origin: http://localhost");
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Headers: Content-Type");

require("vendor/autoload.php");
use controller\UsuariosController;
use model\Users;

$method = $_SERVER['REQUEST_METHOD'];
$url = $_SERVER['REQUEST_URI'];


if ($method == 'POST'){
    switch ($url){
        case '/usuario/login':
            $userController = new UsuariosController;
            $resposta = $userController->addUser(file_get_contents("php://input"));
            echo $resposta;
            break;
        default: 
            echo (json_encode($data = ["status" => 404, "message" => "A url não foi encontrada"]));
    }

} elseif($method == 'GET'){
    switch($url){
       case '/usuario/listar':
            $userController = new UsuariosController();
            $resposta = $userController->mostrarUser();
            echo $resposta;
            break;
        default: 
            echo (json_encode($data = ["status" => 404, "message" => "A url não foi encontrada"]));
    }
}else{
    header ("HTTP/1.0 404 Page Not Allowed");
    echo (json_encode ($response));
}