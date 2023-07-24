<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastrar usuario</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Cadastrar usuário</h2>

    <?php
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
                $_SESSION['msg'] = "<p style='color: green'>Usuário cadastrado com sucesso!</p>";
                //destroi os dados mantidos no formulário
                unset($dados);
                header("Location: index.php");
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
        $query_sists_usuario = "SELECT id, nome FROM sists_usuarios ORDER BY nome ASC";
        $result_sists_usuario = $conn->prepare($query_sists_usuario);
        $result_sists_usuario->execute();
        ?>
        <!-- Caixa de seleção -->
        <select name="sists_usuario_id" required>
            <!-- Define uma única opção dentro de um elemento da caixa de seleção que podeá ser escolhida -->
            <option value="">Selecione</option>
            <?php
            //para ler mais de um registro
            while ($row_sist_usuario = $result_sists_usuario->fetch(PDO::FETCH_ASSOC)) {
                $select_sit_usuario = "";
                //Verifica se o existe um valor nos dados do formulário e se uma opçao foi selecionada previamente
                if (isset($dados['sists_usuario_id']) and ($dados['sists_usuario_id'] == $row_sist_usuario['id'])) {
                    //aparece a opção pré-selecionada no formulário caso a condição seja verdadeira
                    $select_sit_usuario = "selected";
                }
                //Obtem o valor do registro atual tornando-a pré-selecionada
                echo "<option value=' " . $row_sist_usuario['id'] . "' $select_sit_usuario>" . $row_sist_usuario['nome'] . " </option>";
            }
            ?>
        </select>
        <br><br>

        <label>Nível de acecsso:</label>
        <?php
        $query_niveis_acesso = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
        $result_niveis_acesso = $conn->prepare($query_niveis_acesso);
        $result_niveis_acesso->execute();
        ?>
        <select name="niveis_acesso_id" required>
            <option value="">Selecione</option>
            <?php
            while ($row_niveis_acesso = $result_niveis_acesso->fetch(PDO::FETCH_ASSOC)) {
                $select_niveis_acesso = "";
                if (isset($dados['niveis_acesso_id']) and ($dados['niveis_acesso_id'] == $row_niveis_acesso['id'])) {
                    $select_niveis_acesso = "selected";
                }
                echo "<option value=' " . $row_niveis_acesso['id'] . "' $select_niveis_acesso>" . $row_niveis_acesso['nome'] . " </option>";
            }
            ?>
        </select>
        <br><br>
        <input type="submit" value="Cadastrar" name="SendCadUsuario" />

    </form>

</body>

</html>