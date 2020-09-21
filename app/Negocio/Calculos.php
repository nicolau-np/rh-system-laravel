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

    public function irt($salario_base, $excesso, $ss, $percentagem, $parcela_fixa)
    {
       $this->irt = ($salario_base - $excesso -$ss) * $percentagem + $parcela_fixa;

        return $this->irt;
    }

    public function faltas($numero_falta){
        $this->falta = $numero_falta * 1000;
        return $this->falta;
    }
}
