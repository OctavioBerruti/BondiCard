<?php

namespace Poli\Tarjeta;

class medio extends tarjetaa{


        public function tipoDePago(){
                print "medio boleto";
        }


public function pagar(Transporte $transporte, $fecha_y_hora){
        if($transporte->tipo=="colectivo"){
                if(strtotime(substr($fecha_y_hora,(0),10)." ".substr($fecha_y_hora,(-5),5))>=strtotime(substr($fecha_y_hora,(0),10)." 07:00") && strtotime(substr($fecha_y_hora,(0),10)." ".substr($fecha_y_hora,(-5),5))<=strtotime(substr($fecha_y_hora,(0),10)." 20:00"))
                {$this->pagarBondi($transporte,$fecha_y_hora);
                }
        else{$this->pagarBondiComun($transporte,$fecha_y_hora);}
        }
        
                else{
                        $this->pagarBici($transporte,$fecha_y_hora);
                    }


        $this->viajes[] = new Viaje($transporte,$this->valorViaje);
        }




        protected function pagarBondi(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBondi);
 
                        if($this->ultimoColectivo==$transporte || $diferencia>=3600 || $this->transbordos==1 ){
                        $this->valorViaje=4;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-4;
                        $this->transbordos=0;
$this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;                        
}


else { print "Saldo Insuficiente <br /> ";}
}
                         else{
                        $this->valorViaje=1.32;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-1.32;
                        $this->transbordos=1;
$this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;
}
        else { print "Saldo Insuficiente <br />";}        }


 
 
                
                
        }


        
        protected function pagarBondiComun(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBondi);
 
                        if($this->ultimoColectivo==$transporte || $diferencia>=3600 || $this->transbordos==1 ){
                        $this->valorViaje=8;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-8;
                        $this->transbordos=0;
$this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;                        
}


else { print "Saldo Insuficiente <br /> ";}
}
                         else{
                        $this->valorViaje=2.64;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-2.64;
                        $this->transbordos=1;
$this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;
}
        else { print "Saldo Insuficiente <br />";}        }


 
 
                
                
        }


        protected function pagarBici(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBici);
 
                        if($diferencia>=86400 ){
                        $this->valorViaje=6;
If($this->saldoTarjeta>$this->valorViaje){
                        $this->saldoTarjeta=$this->saldoTarjeta-6;
        $this->ultimaHoraBici=$fecha_y_hora;}
else{print "saldo insuficiente <br />";}
                        }
                        else{
                        $this->valorViaje=0;
        
                        }
 
                                
        }
        }

