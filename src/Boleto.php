<?php

namespace Poli\Tarjeta;

class Boleto{

	private $transporte;
	public $fecha;
	public $tipoBoleto;
	public $saldo;
	public $linea;
	public $idCard;
	public $typePass;

	
	public function __construct ($tipoPasaje,Transporte $transporte, $fecha_y_hora, $tipoBoleto, $saldoTarjeta, $cardid, $Linea)
	{
		$this->typePass= $tipoPasaje;
		$this->transporte = $transporte;
		$this->fecha=$fecha_y_hora;
		$this->tipoBoleto=$tipoBoleto;
		$this->saldo=$saldoTarjeta;
		$this->idCard = $cardid;
		$this->linea = $Linea;
	}
	

    public function informacion(){
    	return "La informacion del boleto es la siguiente: <br /> " . $this->typePass . "<br />Linea o patente: ". $this->linea . "<br />Fecha del boleto: " . $this->fecha . "<br /> Tipo de boleto: " . $this->tipoBoleto . "<br /> Saldo restante: " . $this->saldo . "<br /> Numero de tarjeta: " . $this->idCard ;
    }

}
