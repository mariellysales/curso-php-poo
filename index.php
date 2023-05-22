<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Herança</title>
</head>

<body>
    <?php
    require './Cheque.php';
    require './ChequeComum.php';
    require './ChequeEspecial.php';
    //A classe abstrata NÃO pode ser instanciada!!
    //$cheque = new Cheque(207.27, 'comum');
    //$msg = $cheque->verValor();
    //echo $msg;

    $chequeComum = new ChequeComum(307.37, 'comum');
    $msgChequeComum = $chequeComum->calcularJuro();
    echo $msgChequeComum;

    $chequeEspecial = new ChequeEspecial(407.37, 'especial');
    $msgChequeEspecial = $chequeEspecial->calcularJuro();
    echo $msgChequeEspecial;
    ?>
</body>

</html>