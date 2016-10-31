<?php

namespace Poli\Tarjeta;

class Boleto{

	private $transporte;
	public $fecha;
	public $tipoBoleto;
	public $saldo;
	public $lineabondi;
	public $idCard;

	
	public function __construct (Transporte $transporte, $fecha_y_hora, $tipoBoleto, $saldoTarjeta, $cardid)
	{
		$this->transporte = $transporte;
		$this->fecha=$fecha_y_hora;
		$this->tipoBoleto=$tipoBoleto;
		$this->saldo=$saldoTarjeta;
		$this->idCard = $cardid;
		lineaa();
	}

	public function lineaa(){
                if($this->transporte->tipo=="colectivo"){
                        $this->lineabondi = $this->transporte->linea;
                }
                else{
                        $this->lineabondi = $this->transporte->patente;
                }        
        }
	

    public function informacion(){
    	print "La informacion del boleto es la siguiente: <br /> Linea o patente: ". $this->lineabondi . "<br />Fecha del boleto: " . $this->fecha . "<br /> Tipo de boleto: " . $this->tipoBoleto . "<br /> Saldo restante: " . $this->saldo . "<br /> Numero de tarjeta: " . $this->idCard ;
    }

}
