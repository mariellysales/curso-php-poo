<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário com INSERT</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Cadastrar usuários</h2>

    <?php
    //Atribuindo link na QUERY e substituir o link pelo valor com bindParam (RECOMENDADO)
    /*$nome = "Mary1";
    $email = "mary@gmail.com";
    $senha = 123456;
    $sists_usuario_id = 3;
    $niveis_acesso_id = 3;


*/
    //filtra dados enviados através de um formulário
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendCadUsuario'])) {

        try {
            $query_usuario = "INSERT INTO usuarios (nome, email, senha, sists_usuario_id, niveis_acesso_id, created) VALUES (:nome, :email, :senha, :sists_usuario_id, :niveis_acesso_id, NOW())";
            $cad_usuario = $conn->prepare($query_usuario);
            $cad_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $cad_usuario->bindParam(':email', $dados['email']);
            //criptografar senha
            $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $cad_usuario->bindParam(':senha', $senha_cript);
            $cad_usuario->bindParam(':sists_usuario_id', $dados['sists_usuario_id'], PDO::PARAM_INT);
            $cad_usuario->bindParam(':niveis_acesso_id', $dados['niveis_acesso_id'], PDO::PARAM_INT);
            $cad_usuario->execute();

            if ($cad_usuario->rowCount()) {
                echo "Usuário cadastrado com sucesso!";
                //destroi os dados mantidos no formulário
                unset($dados);
            } else {
                echo "ERRO: Usuário não cadastrado";
            }
        } catch (PDOException $erro) {
            echo "ERRO: Usuário não cadastrado.";
            //echo "ERRO: Usuário não cadastrado. Erro gerado: " . $erro->getMessage() . "<br>";
        }
    }
    ?>
    <form method="POST" action="">
        <label>Nome:</label>
        <!-- Mantendo dados no formulário:  -->
        <?php
        $nome = "";
        if (isset($dados['nome'])) {
            $nome = $dados['nome'];
        }
        ?>
        <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>" required /><br><br>
        <label>E-mail:</label>
        <?php
        $email = "";
        if (isset($dados['email'])) {
            $email = $dados['email'];
        }
        ?>
        <input type="email" name="email" placeholder="E-mail do usuário" value="<?php echo $email; ?>" required /><br><br>
        <label>Senha:</label>
        <?php
        $senha = "";
        if (isset($dados['senha'])) {
            $senha = $dados['senha'];
        }
        ?>
        <input type="password" name="senha" placeholder="Senha do usuário" value="<?php echo $senha; ?>" required /><br><br>
        <label>Situação:</label>
        <?php
        $situacao = "";
        if (isset($dados['sists_usuario_id'])) {
            $situacao = $dados['sists_usuario_id'];
        }
        ?>
        <input type="number" name="sists_usuario_id" placeholder="Situação do usuário" value="<?php echo $situacao; ?>" required /><br><br>
        <label>Nível de acecsso:</label>
        <?php
        $nivel_acesso = "";
        if (isset($dados['niveis_acesso_id'])) {
            $nivel_acesso = $dados['niveis_acesso_id'];
        }
        ?>
        <input type="number" name="niveis_acesso_id" placeholder="Nível de acecsso do usuário" value="<?php echo $nivel_acesso; ?>" required /><br><br>
        <input type="submit" value="Cadastrar" name="SendCadUsuario" />

    </form>

</body>

</html>