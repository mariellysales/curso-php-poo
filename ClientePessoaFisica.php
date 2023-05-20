<?php

//O extends indica que a classe criada é filha da classe Cliente
class ClientePessoaFisica extends Cliente
{
    public string $nome;
    public int $cpf;
    public function verInformacaoUsuario(): string
    {
        $dados = "Endereço da pessoa física<br>";
        $dados .= "Endereço: {$this->logradouro}<br>";
        $dados .= "Bairro: {$this->bairro}<br>";
        $dados .= "Nome: {$this->nome}<br>";
        $dados .= "CPF: {$this->cpf}";

        return "<p>$dados</p>";
    }
}
