<?php

namespace Poli\Tarjeta;

class Boleto{

	private $transporte;
	public $fecha;
	public $tipoBoleto;
	public $saldo;
	public $linea;
	public $idCard;

	public function __construct (Transporte $transporte, $fecha_y_hora, $this->tipoBoleto, $this->saldoTarjeta, $this->cardid)
	{
		$this->transporte = $transporte;
		$this->fecha_y_hora=$fecha;
		$this->tipoBoleto=$tipoBoleto;
		$this->saldoTarjeta=$saldo;
		$this->cardid = $idCard;
		$this->linea= linea();
	}


	public function linea(){
                if($this->transporte->tipo=="colectivo"){
                        return $this->transporte->linea;
                }
                else{
                        return $this->transporte->patente;
                }        
        }

    public function informacion(){
    	print "La informacion del boleto es la siguiente: <br /> Linea o patente: ". $this->linea . "<br />Fecha del boleto: " . $this->fecha . "<br /> Tipo de boleto: " . $this->tipoBoleto . "<br /> Saldo restante: " . $this->saldo . "<br /> Numero de tarjeta: " . $this->idCard ;
    }

}
