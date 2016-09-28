<?php

namespace Poli\Tarjeta;

class tarjetaa implements Tarjeta {
        public $saldoTarjeta=0;
        public $ultimoColectivo="";
        public $ultimaHoraBondi=0;
        public $ultimaHoraBici=0;
        public $valorViaje=0;
        public $viajes = [];
        public $transbordos = 0;


        public function tipoDePago(){
                print "tarjeta";
        }




         public function pagar(Transporte $transporte, $fecha_y_hora){
                if($transporte->tipo=="colectivo"){
                        $this->pagarBondi($transporte,$fecha_y_hora);
                        }
                else{
                        $this->pagarBici($transporte,$fecha_y_hora);
                    }


        $this->viajes[] = new Viaje($transporte,$this->valorViaje);
        }




        protected function pagarBondi(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBondi);
 
                        if($this->ultimoColectivo==$transporte || $diferencia>=3600 || $this->transbordos==1 ){
                        $this->valorViaje=8;
if($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-8;
                        $this->transbordos=0;
$this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;
                        }
else { print "Saldo Insuficiente <br />";}
}
                         else{
      
                         $this->transbordos=1;
                        $this->valorViaje=2.64;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-2.64;
                $this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;        
}


else { print "Saldo Insuficiente <br />";}}


 
 
                
                
        }




        protected function pagarBici(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBici);
 
                        if($diferencia>=86400 ){
                        $this->valorViaje=12;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-12;
$this->ultimaHoraBici=$fecha_y_hora; }
else {print "saldo insuficiente <br />";}
                        }
                        else{
                        $this->valorViaje=0;


                        }
 
                                
        }
        


         public function recargar($monto){
                if($monto==272){ 
                        $this->saldoTarjeta=$this->saldoTarjeta+320;
                        print "Se recargó con éxito 320 pesos en la tarjeta <br />";
                        }
                else{
                if($monto==500){
                        $this->saldoTarjeta=$this->saldoTarjeta+640;
                        print "Se recargó con éxito 640 pesos en la tarjeta <br />";
                        }
                        else{$this->saldoTarjeta=$this->saldoTarjeta+$monto;
                                print "Se recargó con éxito en la tarjeta". $monto ." pesos <br />";
                                }}
        }


         public function saldo(){
                print "El saldo de la tarjeta es " .  $this->saldoTarjeta . " <br />";
        }


         public function viajesRealizados(){ 
 
        return $this->viajes;
}


        }

