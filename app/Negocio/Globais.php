<?php

namespace App\Negocio;

class Globais {

    private $ano_lectivo;
    private $data;
    private $dia;
    private $dia_semana;
    private $hora;
    private $mes;
    private $dia_semana_extenso;
    private $mes_extenso;

    function __construct() {
        $this->ano_lectivo = date("Y");
        $this->data = date("Ymd");
        $this->dia = date("d");
        $this->dia_semana = date("N");
        $this->hora = date("H:i:s");
        $this->mes = date("m");
    }

    function getAno_lectivo() {
        return $this->ano_lectivo;
    }

    function getData() {
        return $this->data;
    }

    function getDia() {
        return $this->dia;
    }

    function getDia_semana() {
        return $this->dia_semana;
    }

    function getHora() {
        return $this->hora;
    }

    function getMes() {
        return $this->mes;
    }

    function getDia_semana_extenso() {
        return $this->dia_semana_extenso;
    }

    function getMes_extenso() {
        return $this->mes_extenso;
    }

    function setAno_lectivo($ano_lectivo) {
        $this->ano_lectivo = $ano_lectivo;
    }

    function setData($data) {
        $this->data = $data;
    }

    function setDia($dia) {
        $this->dia = $dia;
    }

    function setDia_semana($dia_semana) {
        $this->dia_semana = $dia_semana;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    function setMes($mes) {
        $this->mes = $mes;
    }

    function setDia_semana_extenso($dia_semana_extenso) {
        $this->dia_semana_extenso = $dia_semana_extenso;
    }

    function setMes_extenso($mes_extenso) {
        $this->mes_extenso = $mes_extenso;
    }

    public function converterDia_semana() {
        $this->dia_semana_extenso = null;
     
            if ($this->dia_semana == 0){
                $this->dia_semana_extenso = "Domingo";
            }elseif ($this->dia_semana == 1){
                $this->dia_semana_extenso = "Segunda";
            }elseif ($this->dia_semana == 2){
                $this->dia_semana_extenso = "Terça";
            }elseif ($this->dia_semana == 3){
                $this->dia_semana_extenso = "Quarta";
            }elseif ($this->dia_semana == 4){
                $this->dia_semana_extenso = "Quinta";
            }elseif ($this->dia_semana == 5){
                $this->dia_semana_extenso = "Sexta";
            }elseif ($this->dia_semana == 6){
                $this->dia_semana_extenso = "Sábado";
            }
  
        return $this->dia_semana_extenso;
    }

    public function converterMes() {
        $this->mes_extenso = null;
   
            if ($this->mes == 1){
                $this->mes_extenso = "Janeiro";
            }elseif ($this->mes == 2){
                $this->mes_extenso = "Fevereiro";
            }elseif ($this->mes == 3){
                $this->mes_extenso = "Março";
            }elseif ($this->mes == 4){
                $this->mes_extenso = "Abril";
            }elseif ($this->mes == 5){
                $this->mes_extenso = "Maio";
            }elseif ($this->mes == 6){
                $this->mes_extenso = "Junho";
            }elseif ($this->mes == 7){
                $this->mes_extenso = "Julho";
            }elseif ($this->mes == 8){
                $this->mes_extenso = "Agosto";
            }elseif ($this->mes == 9){
                $this->mes_extenso = "Setembro";
            }elseif ($this->mes == 10){
                $this->mes_extenso = "Outubro";
            }elseif ($this->mes == 11){
                $this->mes_extenso = "Novembro";
            }elseif ($this->mes == 12){
                $this->mes_extenso = "Dezembro";
             }
    
        return $this->mes_extenso;
    }

}











