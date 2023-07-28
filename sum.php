<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>SUM</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Valor total de venda</h2>
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    ?>
    <form method="POST" action="">
        <?php
        $data_inicio = "";
        if (isset($dados['data_inicio'])) {
            $data_inicio = $dados['data_inicio'];
        }
        ?>
        <label>Data de início</label>
        <input type="date" name="data_inicio" value="<?php echo $data_inicio;
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
    if (!empty($dados['PesqData'])) {
        $query_total_venda = "SELECT SUM(preco) AS total_venda, created FROM inscricoes_cursos WHERE created BETWEEN :data_inicio AND :data_final";
        $result_total_venda = $conn->prepare($query_total_venda);
        $result_total_venda->bindParam(':data_inicio', $dados['data_inicio']);
        $result_total_venda->bindParam(':data_final', $dados['data_final']);
        $result_total_venda->execute();

        $row_total_venda = $result_total_venda->fetch(PDO::FETCH_ASSOC);
        extract($row_total_venda);
        $total_venda_format = number_format($total_venda, 2, ',', '.');
        echo "Total de vendas $total_venda_format <br>";
        echo "<hr>";
    }
    ?>

</body>

</html>