<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>LEFT JOIN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>
    <?php
    $query_usuarios = "SELECT usr.id AS id_usr, usr.nome AS nome_usr, usr.email, cont.telefone, cont.celular, ende.logradouro, ende.numero, ende.bairro, ende.cidade FROM usuarios as usr LEFT JOIN contatos AS cont ON cont.usuario_id=usr.id LEFT JOIN enderecos AS ende ON ende.usuario_id=usr.id ORDER BY usr.id DESC LIMIT 40";
    $result_usuarios = $conn->prepare($query_usuarios);
    $result_usuarios->execute();

    while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID do usuário: $id_usr <br>";
        echo "Nome do usuário: $nome_usr <br>";
        echo "E-mail: $email <br>";
        echo "Telefone do usuário: $telefone <br>";
        echo "Celular do usuário: $celular <br>";
        echo "Endereço: $logradouro, $numero, $bairro - $cidade <br>";
        echo "<hr>";
    }
    ?>
</body>

</html>