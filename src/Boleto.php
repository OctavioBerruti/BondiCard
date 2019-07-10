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
    	return $this->typePass . $this->linea . $this->fecha . $this->tipoBoleto . $this->saldo . $this->idCard ;
    }

}
