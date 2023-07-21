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
            //Como recuperar id do registro cadastrado
            //echo $conn->lastInsertId();
        } else {
            echo "ERRO: Usuário não cadastrado";
        }
    }
    ?>
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Nome completo" required /><br><br>
        <label>E-mail:</label>
        <input type="email" name="email" placeholder="E-mail do usuário" required /><br><br>
        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Senha do usuário" required /><br><br>
        <label>Situação:</label>
        <input type="number" name="sists_usuario_id" placeholder="Situação do usuário" required /><br><br>
        <label>Nível de acecsso:</label>
        <input type="number" name="niveis_acesso_id" placeholder="Nível de acecsso do usuário" required /><br><br>
        <input type="submit" value="Cadastrar" name="SendCadUsuario" />

    </form>

</body>

</html>