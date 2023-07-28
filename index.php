<?php
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>AVG</title>
    <link rel="shortcut icon" href="images/favicon.ico">
</head>

<body>
    <h2>Média paga nos cursos</h2>
    <?php
    //Com casa decimal
    $query_media_preco = "SELECT AVG(preco) AS media_preco, created FROM inscricoes_cursos";
    $result_media_preco = $conn->prepare($query_media_preco);
    $result_media_preco->execute();

    $row_media_preco = $result_media_preco->fetch(PDO::FETCH_ASSOC);
    extract($row_media_preco);
    $media_preco_format = number_format($media_preco, 2, ',', '.');
    echo "Media de preço: $media_preco_format <br>";
    echo "<hr>";

    //Sem casa decimal
    $query_media_preco_b = "SELECT format(AVG(preco), '#') AS media_preco_b, created FROM inscricoes_cursos";
    $result_media_preco_b = $conn->prepare($query_media_preco_b);
    $result_media_preco_b->execute();

    $row_media_preco_b = $result_media_preco_b->fetch(PDO::FETCH_ASSOC);
    extract($row_media_preco_b);
    $media_preco_format_b = number_format($media_preco_b, 2, ',', '.');
    echo "Media de preço: $media_preco_format_b <br>";
    echo "<hr>";
    ?>

</body>

</html>