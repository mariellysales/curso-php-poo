<?php

namespace Core;

class ConfigView
{
    /*
    Antes do PHP 8
    private string $nome;
    private array $dados;
    //atribui valores passados nos parâmetros para as propriedades
    public function __construct(string $nome, array $dados)
    {
        $this->nome = $nome;
        $this->dados = $dados;
    }*/

    //A partir do PHP 8
    public function __construct(private string $nome, private array $dados)
    {
        $this->nome = $nome;
        $this->dados = $dados;
    }

    public function renderizar()
    {
        //Verifica se o arquivo com o nome especificado pela propriedade $this->nome existe
        if (file_exists('app/' . $this->nome . '.php')) {
            //inclui o conteúdo do arquivo onde o método renderizar está sendo chamado
            include 'app/' . $this->nome . '.php';
        } else {
            echo 'Erro: por favor, tente novamente. Caso o problema persista entre em contato com o administrador adm@empresa.com';
        }
    }
}
