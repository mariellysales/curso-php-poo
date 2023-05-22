<?php

abstract class Cheque
{
    /* Antes do PHP 8
    public float $valor;
    public string $tipo;

    public function __construct(float $valor, string $tipo)
    {
        $this->valor = $valor;
        $this->tipo = $tipo;
    }*/

    //Após PHP 8
    public function __construct(public float $valor, public string $tipo)
    {
    }

    abstract function calcularJuro();

    /*public function verValor(): string
    {
        return "Valor do cheque {$this->tipo} é de R$ {$this->valor}.<br>";
    }*/

    public function converterReal(float $valor): string
    {
        return number_format($valor, '2', ',', '.');
    }
}
