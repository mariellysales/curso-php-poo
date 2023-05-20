<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar</title>
</head>
<body>
    <?php
    //Incluindo arquivo
        require './Usuarios.php';
        //Instanciando a classe Usuarios
        //Criando objeto $listar_usuarios
        $listar_usuarios = new Usuarios();
        //Instanciando o método listar
        $result_usuarios = $listar_usuarios->listar();

        //Laço de repetição que percorre todos os usuários e exibe os dados cada usuário
        foreach($result_usuarios as $row_usuario){
            extract($row_usuario);
            echo "ID do usuario: $id <br>";
            echo "Nome do usuario: $nome <br>";
            echo "E-mail do usuario: $email <br><br>";

        }
    ?>
</body>
</html>