<?php
session_start();
ob_start();
//recebe o id da URL
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
require './Conn.php';
require './User.php';
//verifica se o ID possui valor
if (!empty($id)) {
    //inclui os arquivos do banco de dados
    var_dump($id);
    $delete_user = new User();
    $delete_user->id = $id;
    $delete = $delete_user->delete();
    if ($delete) {
        $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado com sucesso!.</p>";
        header("Location: index.php");
    }
}else{
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não encontrado!</p>";
    header("Location: index.php");
    exit();
}
