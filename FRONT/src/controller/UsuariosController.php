<?php

namespace controller;
use connection\ConnectionApi;

class UsuariosController{

    public function addUser($nome, $email, $senha) {
        $api = new ConnectionApi();
        $url = "/usuario/login";
        $data = json_encode(["nome" => $nome, "email" => $email, "senha" => $senha]);
        $resposta = $api->consAPI($url, "POST", $data);
        return $resposta;
    }

    public function mostrarUser() {
        $api = new ConnectionApi();
        $url = "/usuario/listar";
        $resposta = $api->consAPI($url, "GET");
        return $resposta;
    }
}
?>
