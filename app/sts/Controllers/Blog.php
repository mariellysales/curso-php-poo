<?php

namespace Sts\Controllers;

use Core\ConfigView;

class Blog
{
    //Carregar método index
    private array $dados;
    //Carregar método index
    public function index()
    {
        //instancia a lógica de obtenção dos artigos do blog
        $listarArtigo = new \Sts\Models\StsListarBlog();
        //chama o método para biscar informações dos artigos do blog
        $this->dados['artigos'] = $listarArtigo->listar();
        //instancia a classe ConfigView para carregar a visualização
        $carregarView = new ConfigView("sts/views/blog/listarArtigo", $this->dados);
        $carregarView->renderizar();
    }
}
