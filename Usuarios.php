<?php
//incluir arquivo conexão
require './Conn.php';
class Usuarios
{
    public $connect;
    public function listar()
    {
        //instanciar a classe e atribuir ao objeto
        $conn = new Conn();
        //instanciar o método
        $this->connect = $conn->conectar();

        //Obtém os usuários do banco de dados
        $query_usuarios = "SELECT id, nome, email FROM usuarios ORDER BY id DESC LIMIT 40";
        $result_usuarios = $this->connect->prepare($query_usuarios);
        $result_usuarios->execute();
        return $result_usuarios->fetchAll();

    }
}
