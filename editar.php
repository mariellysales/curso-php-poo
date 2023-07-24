<?php
session_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <title>Celke - Formulario UPDATE</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
</head>

<body>
    <h2>Editar Usuário</h2>
    <?php

    //Salvar as informações do usuário no banco de dados
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($dados['SendUpUsuario'])) {
        //var_dump($dados);
        try {
            $query_up_usuario = "UPDATE usuarios
                        SET nome=:nome, email=:email, senha=:senha, sists_usuario_id=:sists_usuario_id, niveis_acesso_id=:niveis_acesso_id, modified = NOW()
                        WHERE id=:id";
            $up_usuario = $conn->prepare($query_up_usuario);
            $up_usuario->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
            $up_usuario->bindParam(':email', $dados['email'], PDO::PARAM_STR);
            $senha_cript = password_hash($dados['senha'], PASSWORD_DEFAULT);
            $up_usuario->bindParam(':senha', $senha_cript, PDO::PARAM_STR);
            $up_usuario->bindParam(':sists_usuario_id', $dados['sists_usuario_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':niveis_acesso_id', $dados['niveis_acesso_id'], PDO::PARAM_INT);
            $up_usuario->bindParam(':id', $dados['id'], PDO::PARAM_INT);

            if ($up_usuario->execute()) {
                $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!</p>";
                header("Location: index.php");
            } else {
                echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
            }
        } catch (PDOException $erro) {
            echo "<p style='color: #f00;'>Erro: Usuário não editado com sucesso!</p>";
            //echo "Erro: Usuário não editado com sucesso. Erro gerando: " . $erro->getMessage() . " <br>";
        }
    }

    //Receber o id pela URL utilizando o método GET
    //Ex: http://localhost/celke/index.php?id_usuario=4
    $id = filter_input(INPUT_GET, "id_usuario", FILTER_SANITIZE_NUMBER_INT);

    //Id do usuário estático
    //$id = 3;

    try {
        //Pesquisar as informações do usuário no banco de dados
        $query_usuario = "SELECT id, nome, email, sists_usuario_id, niveis_acesso_id
                        FROM usuarios
                        WHERE id=:id
                        LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id, PDO::PARAM_INT);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);

    } catch (PDOException $erro) {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: index.php");
        //echo "Erro: Usuário não encontrado. Erro gerando: " . $erro->getMessage() . " <br>";

    }


    ?>

    <form method="POST" action="">

        <?php
        $id = "";
        if (isset($row_usuario['id'])) {
            $id = $row_usuario['id'];
        }
        ?>
        <input type="hidden" name="id" value="<?php echo $id; ?>" required>

        <?php
        $nome = "";
        if (isset($row_usuario['nome'])) {
            $nome = $row_usuario['nome'];
        }
        ?>
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>" required><br><br>

        <?php
        $email = "";
        if (isset($row_usuario['email'])) {
            $email = $row_usuario['email'];
        }
        ?>
        <label>E-mail: </label>
        <input type="email" name="email" placeholder="O melhor e-mail do usuario" value="<?php echo $email; ?>" required><br><br>

        <label>Senha: </label>
        <input type="password" name="senha" placeholder="Nova senha para o usuário" required><br><br>

        <?php
        $query_sists_usuarios = "SELECT id, nome FROM sists_usuarios ORDER BY nome ASC";
        $result_sists_usuarios = $conn->prepare($query_sists_usuarios);
        $result_sists_usuarios->execute();
        ?>
        <label>Situação: </label>
        <select name="sists_usuario_id">
            <option value="">Selecione</option>
            <?php
            while ($row_sist_usuario = $result_sists_usuarios->fetch(PDO::FETCH_ASSOC)) {
                extract($row_sist_usuario);

                $select_sist_usuario = "";
                if (isset($dados['sists_usuario_id']) and ($dados['sists_usuario_id'] == $id)) {
                    $select_sist_usuario = "selected";
                } elseif (((!isset($dados['sists_usuario_id'])) and (isset($row_usuario['sists_usuario_id']))) and ($row_usuario['sists_usuario_id'] == $id)) {
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

        <label>Nível de Acesso: </label>

        <select name="niveis_acesso_id">
            <option value="">Selecione</option>
            <?php
            while ($row_nivel_acesso = $result_niveis_acessos->fetch(PDO::FETCH_ASSOC)) {
                extract($row_nivel_acesso);

                $select_niv_usuario = "";
                if (isset($dados['niveis_acesso_id']) and ($dados['niveis_acesso_id'] == $id)) {
                    $select_niv_usuario = "selected";
                } elseif (((!isset($dados['niveis_acesso_id'])) and (isset($row_usuario['niveis_acesso_id']))) and ($row_usuario['niveis_acesso_id'] == $id)) {
                    $select_niv_usuario = "selected";
                }

                echo "<option value='$id' $select_niv_usuario>$nome</option>";
            }
            ?>
        </select><br><br>

        <input type="submit" value="Salvar" name="SendUpUsuario"><br><br>

    </form>
</body>

</html>