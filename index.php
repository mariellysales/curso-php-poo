<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    //responsável por carregar automaticamente as classes e arquivos do composer
    require "./vendor/autoload.php";
    //Instanciando a classe
    $url = new Core\ConfigController();
    //Chama o método para carregar a página
    $url->loadPage();
    ?>
</body>

</html>