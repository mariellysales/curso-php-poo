<?php
class Funcionario
{
    public string $nome;
    public float $salario;

    public function verSalario(): string
    {
        return "O(a) funcionário(a) {$this->nome} tem o salário R$ {$this->converterSalario()}";
    }

    public function converterSalario(): string
    {
        return number_format($this->salario, '2', ',', '.');
    }
}