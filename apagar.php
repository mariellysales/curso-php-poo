<?php
session_start();

include_once "conexao.php";

$id_usuario = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

if ($id_usuario) {
    try {
        $query_usuarios = "DELETE FROM usuarios WHERE id=:id LIMIT 1";
        $delete_usuario = $conn->prepare($query_usuarios);
        $delete_usuario->bindParam(':id', $id_usuario, PDO::PARAM_INT);
        if ($delete_usuario->execute()) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário apagado com sucesso!</p>";
            header("Location: index.php");
        } else {
            $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não apagado</p>";
            header("Location: index.php");
        }
    } catch (PDOException $err) {
        $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não apagado.</p>";
        header("Location: index.php");
    }
} else {
    $_SESSION['msg'] = "<p style='color: red;'>Erro: Usuário não encontrado</p>";
    header("Location: index.php");
}
