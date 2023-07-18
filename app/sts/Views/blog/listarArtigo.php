<?php

echo "View - Listar os artigos<br>";

//Percorre cada elemento do array, extrai os valores e exibe
foreach ($this->dados['artigos'] as $artigo) {
    extract($artigo);
    echo "ID: $id <br>";
    echo "Titulo: $titulo <br>";
    echo "Conteúdo: $conteudo <br>";
    echo "<hr>";
}
