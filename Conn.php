<?php

abstract class Conn
{
    public string $db = "mysql";
    public string $host = "localhost";
    public string $user = "root";
    public string $pass = "";
    public string $dbname = "cadastro";
    public int $port = 3306;
    public object $connect;

    public function connectDb()
    {
        try {
            $this->connect = new PDO($this->db . ':host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->dbname, $this->user, $this->pass);
            //echo"Conexão com banco de dados realizada com sucesso!<br>";
            return $this->connect;
        } catch (Exception $err) {
            die('ERRO: Por favor, tente novamente. Caso o problema persista, entre em contato com o administrador adm@empresa.com.');
            //echo"Erro: conexão com banco de dados não realizada. Erro gerado " . $err->getMessage();
        }
    }
}
