<?php

namespace connection;
class ConnectionApi{

    private $urlapi = "http://localhost:8001";

    public function consAPI($url, $method, $data){
        $resq = curl_init();
        $urlcomp = $this->urlapi . $url;

        curl_setopt($resq, CURLOPT_URL, $urlcomp);
        curl_setopt($resq, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($resq, CURLOPT_POSTFIELDS, $data);
        curl_setopt($resq, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        if ($method === "POST"){
            curl_setopt($resq, CURLOPT_POST, 1);
        } elseif ($method === "GET"){
            curl_setopt($resq, CURLOPT_HTTPGET, 1);
        } else{
            $message = "Metodo invalido";
            return $message;
        }

        $resposta = curl_exec($resq);

        return $resposta;
    }
}