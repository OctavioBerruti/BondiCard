<?php

namespace Poli\Tarjeta;

class Bici extends Transporte {
        public $patente;
        


 public function __construct($patente)
        {        
                $this->tipo="bicicleta";
                $this->patente=$patente;
        }

              
}

