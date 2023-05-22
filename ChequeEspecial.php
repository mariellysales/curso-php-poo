<?php

class ChequeEspecial extends Cheque
{
    public function calcularJuro(): string
    {
        $valorComJuro = (0.40 * $this->valor) + $this->valor;
        //$valorConvReal = parent::converterReal($this->valor);
        $valorConvReal = $this->converterReal($valorComJuro);
        return "Valor do cheque {$this->tipo} sem juros é de R$ {$this->converterReal($this->valor)}. Com juros é R$ {$valorConvReal}. <br>";
    }
}
