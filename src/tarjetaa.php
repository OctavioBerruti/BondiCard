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
        public $cardid = 0; 
        public $tipoBoleto="tarjeta";
        public $boleto = [];
        public $saldo = 0;
        public $Linea= "";
        public $plus=0;
        public $plusTot=0;
        public $tipoPasaje="";
        
        
       
        

        
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
        $this->boleto[] = new Boleto($this->tipoPasaje, $transporte, $fecha_y_hora, $this->tipoBoleto, $this->saldoTarjeta, $this->cardid, $this->Linea);
        }




        protected function pagarBondi(Transporte $transporte, $fecha_y_hora){             
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBondi);
                $dif=obtenerDiferenciaDebida();
 
                        if($this->ultimoColectivo==$transporte || $diferencia>=$dif || $this->transbordos==1 ){
                        
                        $this->valorViaje=8;
                            if($this->saldoTarjeta>$this->valorViaje || $this->plus < 2){
                              $this->tipoPasaje="";
                                $this->saldoTarjeta=$this->saldoTarjeta-8;
                                $this->transbordos=0;
                                $this->ultimoColectivo=$transporte;
                                $this->ultimaHoraBondi=$fecha_y_hora;
                                $this->plus=$this->plus+1;                              
                                $this->plusTot=$this->plusTot+$this->valorViaje;                                
                            }
                            else { print "Saldo Insuficiente <br />";}
                        }
                         else{                                                               
                                $this->valorViaje=2.64;
                                    if($this->saldoTarjeta>$this->valorViaje){
                                      $this->transbordos=1;
                                      $this->tipoPasaje="Transbordo";
                                        $this->saldoTarjeta=$this->saldoTarjeta-2.64;
                                        $this->ultimoColectivo=$transporte;
                                        $this->ultimaHoraBondi=$fecha_y_hora; 
                                    
                                    }
                                    else { print "Saldo Insuficiente <br />";}
                            }        
        }




        protected function pagarBici(Transporte $transporte, $fecha_y_hora){
                $diferencia=strtotime($fecha_y_hora)-strtotime($this->ultimaHoraBici);
                
                        if($diferencia>=86400 ){
                        $this->valorViaje=12;
                            if($this->saldoTarjeta>$this->valorViaje || $this->plus < 2){
                              $this->tipoPasaje="";
                            $this->saldoTarjeta=$this->saldoTarjeta-12;
                            $this->ultimaHoraBici=$fecha_y_hora; 
                            $this->plus=$this->plus+1;
                              $this->plusTot=$this->plusTot+$this->valorViaje; 
                            }
                            else {print "saldo insuficiente <br />";}
                        }
                        else{
                        $this->valorViaje=0;
                        }
 
                                
        }
        


         public function recargar($monto){
                if($monto>=$this->plusTot)
                {
                  $this->plus=0;
                  $this->plusTot=0;
                }
                else
                {
                  if ($monto>=($this->plusTot/2))
                  {
                  $this->plus=1;
                  $this->plusTot=$this->plusTot/2;
                  }
                  else
                  {
                  print "recarga un poco RATON ";
                  }
                }
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
                return $this->saldoTarjeta;
        }


         public function viajesRealizados(){ 
 
        return $this->viajes;
}


            public function obtenerDiferenciaDebida(){
                 $fechaActual=getdate();
                if($fechaActual[wday]>0 && $fechaActual[wday]<6)
                {
                
                  if($fechaActual[hours]>6 && $fechaActual[hours]<22)
                  {
                   return 3600;
                  }
                  else{
                  return 5400;
                  }
                  
                }
                  
                  else{
                    if($fechaActual[wday]==6 && $fechaActual[hours]>6 && $fechaActual[hours]<14)
                    {
                      return 3600;
                    }
                    else
                    {
                      return 5400;
                    }
                  }
                  
                
            }
        


}
