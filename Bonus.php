<?php
class Bonus extends Funcionario
{
    public function verBonus(): string
    {
        return "O(a) funcionário(a) tem o bônus de R$ " . $this->bonusCalculado() . "<br>";
    }
}
