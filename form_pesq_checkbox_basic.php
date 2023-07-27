<?php
include_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>IN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>

    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>

    <form method="POST" action="">
        <label>Pesquisar</label><br><br>
        <input type="checkbox" name="nivel_acesso[]" value="1">Super Administrador<br>
        <input type="checkbox" name="nivel_acesso[]" value="2">Administrador<br>
        <input type="checkbox" name="nivel_acesso[]" value="3">Aluno<br><br>

        <input type="submit" value="Pesquisar" name="PesqUsuario"><br><br>


    </form>
    <?php
    if (!empty($dados['PesqUsuario'])) {

        $valor_pesq = "";
        if (isset($dados['nivel_acesso'][0])) {
            $valor_pesq = $dados['nivel_acesso'][0];
        }

        if (isset($dados['nivel_acesso'][1])) {
            $valor_pesq .= ", " . $dados['nivel_acesso'][1];
        }

        if (isset($dados['nivel_acesso'][2])) {

            $valor_pesq .= " ," . $dados['nivel_acesso'][2];
        }
        if (array_key_exists('nivel_acesso', $dados) && isset($dados['nivel_acesso'][0]) || isset($dados['nivel_acesso'][1]) || isset($dados['nivel_acesso'][2])) {
            $query_usuarios = "SELECT id, nome, email, niveis_acesso_id FROM usuarios WHERE niveis_acesso_id IN ($valor_pesq) ORDER BY id DESC";
            $result_usuarios = $conn->prepare($query_usuarios);
            $result_usuarios->execute();

            while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
                extract($row_usuario);

                echo "ID: $id <br>";
                echo "Nome: $nome <br>";
                echo "E-mail: $email <br>";
                echo "Nível de acesso: $niveis_acesso_id <br>";
                echo "<hr>";
            }
        }
    }

    ?>
</body>

</html>