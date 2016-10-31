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
                return $this->ttransporte->tipo;
        }


        public function monto(){
               return $this->monto;
        }


        public function transporte(){
                return $this->ttransporte;
        }


        public function nombre(){
                if($this->ttransporte->tipo=="colectivo"){
                        return $this->ttransporte->linea;
                }
                else{
                        return $this->ttransporte->patente;
                }        
        }


}


