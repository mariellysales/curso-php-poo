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

        <?php
        //Pesquisa os niveis de acesso no BD
        $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY ordem ASC";
        $result_niveis_acessos = $conn->prepare($query_niveis_acessos);
        $result_niveis_acessos->execute();

        $valor_pesq_list = "";
        if (!empty($dados['nivel_acesso'])) {
            foreach ($dados['nivel_acesso'] as $niveis_acesso_id) {
                $valor_pesq_list .= "$niveis_acesso_id, ";
            }
        }

        while ($row_nivel_acesso = $result_niveis_acessos->fetch(PDO::FETCH_ASSOC)) {
            extract($row_nivel_acesso);
            $result_valor = mb_strpos($valor_pesq_list, $id);
            if ($result_valor === false) {
                $checked = "";
            } else {
                $checked = "checked";
            }

            echo "<input type='checkbox' name='nivel_acesso[]' value='$id' $checked>$nome<br>";
        }
        ?>

        <br><input type="submit" value="Pesquisar" name="PesqUsuario"><br><br>

    </form>

    <?php
    if (!empty($dados['PesqUsuario'])) {

        $valor_pesq = "";
        $controle = 1;
        if (array_key_exists('nivel_acesso', $dados)) {

            foreach ($dados['nivel_acesso'] as $niveis_acesso_id) {
                if ($controle == 1) {
                    $valor_pesq = $niveis_acesso_id;
                } else {
                    $valor_pesq .= ", $niveis_acesso_id";
                }
                $controle++;
            }
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