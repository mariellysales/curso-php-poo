<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Formulário UPDATE e campo SELECT</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Editar usuário</h2>

    <?php
    //Salvar as informações do usuario no banco de dados
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);


    if (!empty($dados)) {
        try {
            $query_up_usuario = "UPDATE usuarios SET nome=:nome, email=:email, senha=:senha, sists_usuario_id=:sists_usuario_id, niveis_acesso_id=:niveis_acesso_id, modified = NOW() WHERE id=:id";
            $up_usuario = $conn->prepare($query_up_usuario);
            $up_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $up_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $senha_script = password_hash($dados['senha'], PASSWORD_DEFAULT) .
                $up_usuario->bindParam(':senha', $senha_script, PDO::PARAM_STR);
            $up_usuario->bindParam(':sists_usuario_id', $dados['sists_usuario_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':niveis_acesso_id', $dados['niveis_acesso_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':id', $dados['id'], PDO::PARAM_INT);

            if ($up_usuario->execute()) {
                echo "Usuário editado com sucesso";
            } else {
                echo "Usuário não editado";
            }
        } catch (PDOException $erro) {
            echo "ERRO: Usuário não editado";
        }
    }

    //receber id pela URL utilizando o método GET
    //ex: http://localhost/cursoPHPPOO/index.php?id_usuario=1
    //$id = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

    //receber o id do usuário estático
    $id = 15;
    try {
        //Pesquisar as informações do usuário no banco de dados
        $query_usuarios = "SELECT id, nome, email, sists_usuario_id, niveis_acesso_id FROM usuarios WHERE id=:id LIMIT 1";
        $result_usuario = $conn->prepare($query_usuarios);
        $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $erro) {
        echo "Usuário não encontrado";
    }

    ?>
    <form method="POST" action="">
        <?php

        $id = "";
        if (isset($row_usuario['id'])) {
            $id = $row_usuario['id'];
        }
        ?>
        <input type="hidden" name="id" value="<?php echo $id ?>" required> <br><br>

        <?php
        $nome = "";
        if (isset($row_usuario['nome'])) {
            $nome = $row_usuario['nome'];
        }
        ?>
        <label>Nome</label>
        <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome ?>" required> <br><br>

        <?php
        $email = "";
        if (isset($row_usuario['email'])) {
            $email = $row_usuario['email'];
        }
        ?>
        <label>E-mail</label>
        <input type="email" name="email" placeholder="Insira o e-mail" value="<?php echo $email ?>" required> <br><br>

        <label>Senha</label>
        <input type="password" name="senha" placeholder="Insira uma nova senha" required> <br><br>

        <?php
        $query_sists_usuario = "SELECT id, nome FROM sists_usuarios ORDER BY nome ASC";
        $result_sists_usuario = $conn->prepare($query_sists_usuario);
        $result_sists_usuario->execute();
        ?>
        <label>Situação do usuário</label>
        <select name="sists_usuario_id">
            <option value="">Selecione</option>
            <?php
            while ($row_sist_usuario = $result_sists_usuario->fetch(PDO::FETCH_ASSOC)) {
                extract($row_sist_usuario);
                $select_sist_usuario = "";
                if (isset($dados['sists_usuario_id']) and ($dados['sists_usuario_id'] == $id)) {
                    $select_sist_usuario = "selected";
                } elseif (((!isset($row_usuario['sists_usuario_id'])) and (isset($row_usuario['sists_usuario_id']))) and ($row_usuario['sists_usuario_id'] == $id)) {
                    $select_sist_usuario = "selected";
                }
                echo "<option value='$id' $select_sist_usuario>$nome</option>";
            }
            ?>
        </select><br><br>

        <?php
        $query_niveis_acessos = "SELECT id, nome FROM niveis_acessos ORDER BY nome ASC";
        $result_niveis_acessos = $conn->prepare($query_niveis_acessos);
        $result_niveis_acessos->execute();
        ?>
        <label>Níveis de acesso</label>

        <select name="niveis_acesso_id">
            <option value="">Selecione</option>
            <?php
            while ($row_nivel_acesso = $result_niveis_acessos->fetch(PDO::FETCH_ASSOC)) {
                extract($row_nivel_acesso);
                $select_niv_acesso = "";
                if (isset($dados['niveis_acesso_id']) and ($dados['niveis_acesso_id'] == $id)) {
                    $select_niv_acesso = "selected";
                } elseif (((!isset($row_usuario['niveis_acesso_id'])) and (isset($row_usuario['niveis_acesso_id']))) and ($row_usuario['niveis_acesso_id'] == $id)) {
                    $select_niv_acesso = "selected";
                }
                echo "<option value='$id' $select_niv_acesso>$nome</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Salvar" name="SendUpUsuario"><br><br>

    </form>
</body>

</html>