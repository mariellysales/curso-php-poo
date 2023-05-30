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
    <title>Visualizar</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="create.php">Cadastrar</a><br>

    <h1>Detalhes do Usuário</h1>

    <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
//Verifica de o is possui valor
    if (!empty($id)) {
        //inclui os arquivos
        require './Conn.php';
        require './User.php';

        //instancia a classe e cria o objeto
        $viewUser = new User();
        //envia o id para o atributo id da classe user
        $viewUser->id = $id;
        //intancia o método visualizar
        $valueUser = $viewUser->view();
        extract($valueUser);
        echo "Id do usuário: $id <br>";
        echo "Nome: $nome <br>";
        echo "E-mail: $email <br>";
        echo "Cadastrado em: " . date('d/m/y H:i:s', strtotime($created)) . " <br>";

        if (!empty($modified)) {
            echo "Editado em: " . date('d/m/y H:i:s', strtotime($modified));
        }
        echo " <br>";

    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado.</p>";
        header("Location: index.php");
    }


    ?>
</body>

</html>