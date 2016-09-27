<?php         
interface Tarjeta {
 public function pagar(Transporte $transporte, $fecha_y_hora);
 public function recargar($monto);
 public function saldo();
 public function viajesRealizados();
}




abstract class Transporte{
        public $tipo;
        public function tipo(){
                return $this->tipo;
        }
}


class Bici extends Transporte {
        public $patente;
        


 public function __construct($patente)
        {        
                $this->tipo="bicicleta";
                $this->patente=$patente;
        }


}


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
