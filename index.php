<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salário</title>
</head>

<body>
    <?php
    require "./Funcionario.php";
    $funcionario = new Funcionario();
    $funcionario->nome = "Geovana";
    $funcionario->salario = 7961.75;
    echo $funcionario->verSalario();
    /*Atributo e método privado não pode ser acessado fora da classe
    $funcionario->salarioConvertido = "72,16"

    $funcionario->converterSalario();*/

    ?>
</body>

</html>