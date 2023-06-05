<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Salário</title>
</head>

<body>
    <?php
    require "./Funcionario.php";
    require "./Bonus.php";
    $funcionario = new Funcionario();
    //Atributo publico pode ser acessado fora da classe
    $funcionario->nome = "Geovana";
    $funcionario->salario = 7961.75;
    echo $funcionario->verSalario();
    /*Atributo e método privado não pode ser acessado fora da classe
    $funcionario->salarioConvertido = "72,16"
    $funcionario->converterSalario();*/

    /*Atributo protegido somente pode ser acessado pela classe e pela classe filha
    $funcionario->bonus;*/

    $funcBonus = new Bonus();
    echo $funcBonus->verBonus();
    ?>
</body>

</html>