<?php


namespace Poli\Tarjeta;

use PHPUnit\Framework\TestCase;

class TarjetaTest extends TestCase {

  public function testCargaSaldo() {
    $tarjeta = new tarjetaa;
    $tarjeta->recargar(272);
    $this->assertEquals($tarjeta->saldo(), 320, "Cuando cargo 272 deberia tener finalmente 320");
  }


  public function testPagarViaje() {
	$tarjeta = new tarjetaa;
	$tarjeta->recargar(272);
	$colectivo144Negro = new Colectivo("144 Negro", "Rosario Bus");
	$tarjeta->pagar($colectivo144Negro, "2016/06/30 22:50");
	$this->assertEquals($tarjeta->saldo(), 320 - 8, "Cuando pago el pasaje me deberian quedar 312 pesos");	

  }

  public function testPagarViajeSinSaldo() {
	$tarjeta = new tarjetaa;
	$colectivo144Negro = new Colectivo("144 Negro", "Rosario Bus");
	$this->assertEquals($tarjeta->pagar($colectivo144Negro, "2016/06/30 22:50"), false, "Cuando pago el pasaje no me deberia dejar pagar y deberia decir que no tengo saldo ");
  }

  public function testTransbordo() {
	
$tarjeta = new tarjetaa;
$tarjeta->recargar(272);
$colectivo144Negro = new Colectivo("144 Negro", "Rosario Bus");
$tarjeta->pagar($colectivo144Negro, "2016/06/30 22:50");
$colectivo135 = new Colectivo("135", "Rosario Bus");
$tarjeta->pagar($colectivo135, "2016/06/30 23:10");
$this->assertEquals($tarjeta->saldo(), (320 - 8 - 2.64), "Cuando pago el pasaje me deberian quedar 309.36 pesos");

  }

  public function testNoTransbordo() {

	$tarjeta = new tarjetaa;
$tarjeta->recargar(272);
$colectivo144Negro = new Colectivo("144 Negro", "Rosario Bus");
$tarjeta->pagar($colectivo144Negro, "2016/06/30 22:50");
$colectivo135 = new Colectivo("135", "Rosario Bus");
$tarjeta->pagar($colectivo135, "2016/07/30 23:10");
$this->assertEquals($tarjeta->saldo(), (320 - 8 - 8), "Cuando pago el pasaje me deberian quedar 304 pesos");

  }

}
