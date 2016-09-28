<?php

namespace Poli\Tarjeta;

class paseLibre extends tarjetaa{


        public function tipoDePago(){
                print "pase libre";
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
                        $this->valorViaje=0;
                $this->ultimoColectivo=$transporte;
                $this->ultimaHoraBondi=$fecha_y_hora;        
        }




        protected function pagarBici(Transporte $transporte, $fecha_y_hora){
                        $this->valorViaje=0;
                $this->ultimaHoraBici=$fecha_y_hora;                
        }




        public function recargar($monto){
                        print "No se puede recargar credito en un pase libre <br />";
        }


         public function saldo(){
                print "El pase libre no tiene saldo  <br />";
        }
        }
