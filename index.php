<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>RIGHT JOIN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>
    <?php
    //Retorna dados da tabela principal mesmo que a mesma não tenha valor, desde que tenha na tabela secundária
    $query_usuarios = "SELECT cont.id AS id_cont, cont.telefone, cont.celular, usr.id AS id_usr, usr.nome, usr.email FROM contatos AS cont RIGHT JOIN usuarios AS usr ON usr.id=cont.usuario_id ORDER BY cont.id DESC LIMIT 40";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID do contato: $id_cont <br>";
        echo "Telefone do usuário: $telefone <br>";
        echo "Celular do usuário: $celular <br>";
        echo "ID do usuário: $id_usr <br>";
        echo "Nome do usuário: $nome <br>";
        echo "E-mail: $email <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>