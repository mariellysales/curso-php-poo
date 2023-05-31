<?php
session_start();

ob_start();
//receber id do usuario
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="create.php">Cadastrar</a><br>

    <h1>Editar Usuário</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    //inclui os arquivos
    require './Conn.php';
    require './User.php';

    // Recebe os dados do formulário
    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // Verifica se o usuário clicou no botão
    if (!empty($formData['SendEditUser'])) {
        var_dump($formData);
        $edituser = new User();
        $edituser->formData = $formData;
        $value = $edituser->edit();
        if ($value) {
            $_SESSION['msg'] = "<p style='color: green;'>Usuário editado com sucesso!.</p>";
            header("Location: index.php");
        } else {
            echo "<p style='color: #f00;'>Erro: Usuário não encontrado.</p>";
        }
    }
    //Verifica de o id possui valor
    if (!empty($id)) {


        //instancia a classe e cria o objeto
        $viewUser = new User();
        //envia o id para o atributo id da classe user
        $viewUser->id = $id;
        //intancia o método visualizar
        $valueUser = $viewUser->view();
        //var_dump($valueUser);
        extract($valueUser);
    ?>
        <form name="EditUser" method="POST">
            <!-- value="< ?php echo $id; ?>"Envia o id do usuário -->
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label>Nome: </label>
            <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>" required /><br><br>

            <label>E-mail: </label>
            <input type="text" name="email" placeholder="Seu melhor e-mail" value="<?php echo $email; ?>" required /><br><br>

            <input type="submit" value="Editar" name="SendEditUser" />
        </form>
    <?php
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado.</p>";
        header("Location: index.php");
    }


    ?>
</body>

</html>