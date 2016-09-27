<?php

namespace Poli\Tarjeta;

class Viaje {


        private $ttransporte;
        public $monto;


        public function __construct(Transporte $transporte, $valorViaje){
                $this->ttransporte=$transporte;
                $this->monto=$valorViaje;
        }


        public function tipo(){
                print "el tipo de transporte elegido es " . $this->ttransporte->tipo . " <br />";
        }


        public function monto(){
                print "el monto del viaje tomado es " . $this->monto . " <br />";
        }


        public function transporte(){
                return $this->ttransporte;
        }


        public function nombre(){
                if($this->ttransporte->tipo=="colectivo"){
                        print "la linea del colectivo tomado es " .  $this->ttransporte->linea . " <br />";
                }
                else{
                        print "la patente de la bicicleta usada es " .  $this->ttransporte->patente . " <br />";
                }        
        }


}


