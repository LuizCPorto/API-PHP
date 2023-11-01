<?php

namespace controller;

use models\Users;
use Connections\Connection;

require("vendor/autoload.php");

class UsuariosController
{
    public function addUser($jsonObject)
    {
        $user = new Users();
        $data = json_decode($jsonObject, true);

        $nome = $data["nome"];
        $email = $data["email"];
        $password = $data["password"];

        $userCreated = $user->CriarUser($nome, $email, $password);

        if ($userCreated) {
            $data = [
                "name" => $userCreated["nome"],
                "email" => $userCreated["email"],
                "password" => $userCreated["senha"]
            ];

            return json_encode($data);
        } else {
            return json_encode(["error" => "Erro no cadastro do usuário"]);
        }
    }

    public function mostrarUser()
    {
        $user = new Users();
        $usuarios = $user->mostrarUser();
        return json_encode($usuarios);
    }
}
