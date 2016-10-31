<?php

namespace Poli\Tarjeta;

class paseLibre extends tarjetaa{


        public function tipoTarjeta(){
                return "tarjeta";
        }
        public function __construct{
            $this->cardid=$this->cardid+1;
        }
        public function idcard(){
            return $this->cardid;
        }


        public function pagar(Transporte $transporte, $fecha_y_hora){
        if($transporte->tipo=="colectivo"){
                        $this->pagarBondi($transporte,$fecha_y_hora);
                        }
                else{
                        $this->pagarBici($transporte,$fecha_y_hora);
                    }


        $this->viajes[] = new Viaje($transporte,$this->valorViaje);
        $this->boleto[] = new Boleto($transporte, $fecha_y_hora, $tipoBoleto, $saldoTarjeta, $cardid);
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
                return "El pase libre no tiene saldo  <br />";
        }
        }
