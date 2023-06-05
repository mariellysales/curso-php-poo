<?php

/**
 * A classe bônus é classe filha da classe Funcionário
 *
 * @author Marielly <mariellysales01@gmail.com>
 */
class Bonus extends Funcionario
{
    /**
     * Método para ver bônus
     *
     * @return string retorna o bônus calculado
     */
    public function verBonus(): string
    {
        return "O(a) funcionário(a) tem o bônus de R$ " . $this->bonusCalculado() . "<br>";
    }
}
