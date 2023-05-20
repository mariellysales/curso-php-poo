<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Herança</title>
</head>

<body>
    <?php
    require './Cliente.php';
    require './ClientePessoaFisica.php';
    require './ClientePessoaJuridica.php';
    $cliente = new Cliente();
    $cliente->logradouro = "Avenida Presidente Vargas - A";
    $cliente->bairro = "Centro";
    $msg = $cliente->verEndereco();
    echo $msg;
    echo "<hr>";

    $clientePF = new ClientePessoaFisica();
    $clientePF->logradouro = "Avenida Presidente Vargas - B";
    $clientePF->bairro = "Centro";
    $clientePF->nome = "Marielly";
    $clientePF->cpf = 12345678912;
    $msgPf = $clientePF->verInformacaoUsuario();
    echo $msgPf;
    echo "<hr>";

    $clientePJ = new ClientePessoaJuridica();
    $clientePJ->logradouro = "Avenida Presidente Vargas - C";
    $clientePJ->bairro = "Centro";
    $clientePJ->nomeFantasia = "L&M";
    $clientePJ->cnpj = 12345678912345;
    $msgPj = $clientePJ->verInformacaoEmpresa();
    echo $msgPj;
    echo "<hr>";
    ?>
</body>

</html>