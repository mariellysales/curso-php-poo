<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>BETWEEN</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Listar usuários</h2>
    <?php
    //Obtém dados do formulário através do método post e retorna como string
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    ?>
    <form method="POST" action="">
        <?php
        // Mantem a data utilizada no formulário
        $data_inicio = "";
        if (isset($dados['data_inicio'])) {
            $data_inicio = $dados['data_inicio'];
        }
        ?>
        <label>Data de início</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio; // Mantem a data utilizada no formulário
                                                        ?>"><br><br>

        <?php
        $data_final = "";
        if (isset($dados['data_final'])) {
            $data_final = $dados['data_final'];
        }
        ?>
        <label>Data final</label>
        <input type="date" name="data_final" value="<?php echo $data_final; ?>"><br><br>

        <input type="submit" value="Pesquisar" name="PesqData"><br><br>
    </form>
    <?php
    //Caso contenha dados no formulário, a query é executada filtrando as informações do banco de dados
    if (!empty($dados['PesqData'])) {
        $query_usuarios = "SELECT id, nome, email, created FROM usuarios WHERE created BETWEEN :data_inicio AND :data_final";
        $result_usuarios = $conn->prepare($query_usuarios);
        //Define o que os parâmetros irão receber
        $result_usuarios->bindParam(':data_inicio', $dados['data_inicio']);
        $result_usuarios->bindParam(':data_final', $dados['data_final']);
        $result_usuarios->execute();

        //loop de repetição que mostrará os dados de um usuario em cada linha
        while ($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)) {
            extract($row_usuario);

            echo "ID: $id <br>";
            echo "Nome: $nome <br>";
            echo "E-mail: $email <br>";
            //Implementa conversão de datas
            echo "Data cadastro: " . date('d/m/y', strtotime($created)) . "<br>";
            echo "<hr>";
        }
    }
    ?>
</body>

</html>