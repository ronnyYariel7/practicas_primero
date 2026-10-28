<?php

/**
 * classe sobrecarga con el siguiente comportamientoç
 * -Si la proiridadempieza por m o M la doy por buena
 * - una propiedad sobrecargada siempre tendra el valor 234
 */

class Classenormal{

    public int $numero=10;


    public function __set(string $name,mixed $value):void{
        throw new \Exception("La propiedad $name no existe");
              
    }

    
    public function __get(string $name):mixed{
        if(mb_substr(mb_strtoupper($name),0,1)!=='M')
            throw new \Exception("La propiedad $name no existe");
              
    }

     public function __isset(string $name):bool{
        return false;
              
    }

    
}


$clase1=new Classenormal();
$clase2=new Classenormal();

$cad="";
if(isset($clase1->cadena)){
    $cad=$clase2->cadena;
}

