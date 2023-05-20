<?php

class Conn
{
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $dbname = "cadastro";
    public $port = 3306;
    public $connect = null;

    public function conectar(){
        //O try pode gerar uma excessão
        //O catch trata a excessão, exibe mensagem de erro ou toma ação apropriada para lidar com a situação
        try{
            $this->connect = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->dbname, $this->user, $this->pass);
            echo "Conexão realizada com sucesso!<br>";
            return $this->connect;
        }catch(Exception $err){

            echo "ERRO: Conexão não realizada. Erro gerado: " . $err;
            return false;
        }
    }
}