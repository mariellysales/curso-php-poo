<?php

/**
 * A classe Funcionário calcula o salário do colaborador
 *
 * @author Marielly <mariellysales01@icloud.com>
 */
class Funcionario
{
    /** @var string $nome Recebe o nome do colaborador */
    public string $nome;
    /** @var string $salario Recebe o salário do colaborador */
    public float $salario;
    /** @var string $salarioConvertido Recebe o salário convertido para R$ */
    private string $salarioConvertido;
    /** @var string $bonus Recebe o bonus do colaborador */
    protected float $bonus = 2500;

    /**
     * Cria a frase com o nome e o salário do colaborador
     *
     * @return string Retorna a frase com o nome e o salário do colaborador
     */
    public function verSalario(): string
    {
        return "O(a) funcionário(a) {$this->nome} tem o salário R$ {$this->converterSalario($this->salario)} <br>";
    }

    /**
     * Método privado, ppode ser chamado somente na classe
     * @param float $valor Deve ser enviado o parametro numérico
     * @return string retorna o valor convertido para R$
     */
    private function converterSalario($valor): string
    {
        $this->salarioConvertido = number_format($valor, '2', ',', '.');
        return $this->salarioConvertido;
    }
/**
 * Método protegido, somente pode ser chamado na classe ou na classe filha
 * @return string Retorna o bônusF
 */
    protected function bonusCalculado(): string
    {
        return $this->converterSalario($this->bonus);
    }
}
