<?php

namespace Poli\Tarjeta;

class Boleto{

	private $transporte;
	public $fecha;
	public $tipoBoleto;
	public $saldo;
	public $linea;
	public $idCard;

	
	public function __construct (Transporte $transporte, $fecha_y_hora, $tipoBoleto, $saldoTarjeta, $cardid, $Linea)
	{
		$this->transporte = $transporte;
		$this->fecha=$fecha_y_hora;
		$this->tipoBoleto=$tipoBoleto;
		$this->saldo=$saldoTarjeta;
		$this->idCard = $cardid;
		$this->linea = $Linea
	}
	

    public function informacion(){
    	print "La informacion del boleto es la siguiente: <br /> Linea o patente: ". $this->linea . "<br />Fecha del boleto: " . $this->fecha . "<br /> Tipo de boleto: " . $this->tipoBoleto . "<br /> Saldo restante: " . $this->saldo . "<br /> Numero de tarjeta: " . $this->idCard ;
    }

}
