<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Atributo estático</title>
</head>

<body>
    <?php
    require './Disciplina.php';

    //Acessa o atributo sem criar o objeto
    echo "Média: " . Disciplina::$media . "<br><hr>";

    $disciplina = new Disciplina("Aline", 3, 5);
    echo $disciplina->situacao();

    echo Disciplina::situacaoAluno(9);
    ?>

</body>

</html>