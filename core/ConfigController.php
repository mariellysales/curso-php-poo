<?php
//Indica onde a classe está
namespace Core;

class ConfigController
{
    private string $url;
    private array $urlArray;
    private string $urlController;
    private string $urlMetodo;
    public function __construct()
    {
        //verifica se a url não está vazia
        if (!empty(filter_input(INPUT_GET, 'url', FILTER_DEFAULT))) {
            //armazena o valor da url
            $this->url = filter_input(INPUT_GET, 'url', FILTER_DEFAULT);
            //transforma a string em array, divide a URL em partes e armazena na propriedade
            $this->urlArray = explode("/", $this->url);

            //verifica se as posições 0 e 1 do array existem
            if ((isset($this->urlArray[0])) and (isset($this->urlArray[1]))) {
                //armazena os dados do array nas propriedades
                $this->urlController = $this->urlArray[0];
                $this->urlMetodo = $this->urlArray[1];
            } else {
                //caso as posições 0 e 1 estiverem vazias, será definida as seguintes propriedades
                $this->urlController = "erro";
                $this->urlMetodo = "index";
            }
        } else {
            //caso o parâmetro GET 'url' estiver vazio, será definida as seguintes propriedades
            $this->urlController = "home";
            $this->urlMetodo = "index";
        }
        //retorna o valor das  propriedades
        //echo "Controller: {$this->urlController} - Método: {$this->urlMetodo}<br>";
    }

    //Função responsável por carregar a controller
    public function loadPage()
    {
        //Para carregar a página Controller
        //O valor de $this->urlController é armazenado em ucwords e faz a converção do primeiro caractere de cada palavra (nesse caso da controller) em maiúsculo
        $urlController = ucwords($this->urlController);
        // echo "Carregar a pagina/Controller <br>";
        //concatena o namespace e o diretório onde os controladores estão
        $classLoad = "\\Sts\Controllers\\" . $urlController;
        //echo ucfirst($classLoad) . "<br>";
        //cria uma nova instancia de classe e atribui ao controlador "Home"
        $classPage = new $classLoad();
        //O método index é chamado, ele executa a lógica do controlador
        $classPage->index();
    }
}
