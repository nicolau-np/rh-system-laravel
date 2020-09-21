<?php

namespace App\Negocio;

class Calculos
{

    protected $inss_desconto;
    protected $inss_resto;
    protected $irt;
    protected $falta;

    public function inss_desconto($salario_base)
    {
        $this->inss_desconto = $salario_base * (3/100); //salario_base * 3%

        return $this->inss_desconto;
    }

    public function inss_resto($salario_base, $inss_desconto)
    {
        $this->inss_resto = $salario_base - $inss_desconto;

        return $this->inss_resto;
    }

    public function irt($inss_resto, $parcela_fixa, $percentagem, $excesso)
    {
        $total = $inss_resto - $excesso;
        $this->irt = $parcela_fixa + $percentagem * ($total);

        return $this->irt;
    }

    public function faltas($numero_falta){
        $this->falta = $numero_falta * 1000;
        return $this->falta;
    }
}
