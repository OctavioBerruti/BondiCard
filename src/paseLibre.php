<?php

namespace Poli\Tarjeta;

class paseLibre extends tarjetaa{
public $tipoBoleto="paseLibre";

        public function tipoTarjeta(){
                return "paseLibre";
        }
        public function __construct(){
            $this->cardid=$this->cardid+1;
        }
        public function idcard(){
            return $this->cardid;
        }


        public function pagar(Transporte $transporte, $fecha_y_hora){
        if($transporte->tipo=="colectivo"){
                        $this->pagarBondi($transporte,$fecha_y_hora);
                         $this->Linea = $transporte->linea;
                        }
                else{
                        $this->pagarBici($transporte,$fecha_y_hora);
                        $this->Linea = $transporte->patente;
                    }


        $this->viajes[] = new Viaje($transporte,$this->valorViaje);
        $this->boleto[] = new Boleto($transporte, $fecha_y_hora, $this->tipoBoleto, $this->saldoTarjeta, $this->cardid, $this->Linea);
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
                        return false;
        }


         public function saldo(){
                print "El pase libre no tiene saldo  <br />";
                return false;
        }
        }
