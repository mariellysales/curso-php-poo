<?php
class Funcionario
{
    public string $nome;
    public float $salario;
    private string $salarioConvertido;

    public function verSalario(): string
    {
        return "O(a) funcionário(a) {$this->nome} tem o salário R$ {$this->converterSalario()}";
    }

    private function converterSalario(): string
    {
        $this->salarioConvertido = number_format($this->salario, '2', ',', '.');
        return $this->salarioConvertido;
    }
}