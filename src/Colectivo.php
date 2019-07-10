<?php

namespace Poli\Tarjeta;

class Colectivo extends Transporte {
        public $linea;
        public $empresa;
        


 public function __construct($linea,$empresa)
        {
                $this->tipo="colectivo";
                $this->linea=$linea;
                $this->empresa=$empresa;
        }


}

