<?php

final class MuebleReciclado extends MuebleBase {

    //Propiedades
    private int $_PorcentajeReciclado=10;


    //constructor
   public function __construct(string $nombre, string $fabricante, string $pais, int $anio, string $fechaIniVenta, 
        string $fechaFinVenta, float $precio,Caracteristicas $caracteristicas, int $PorcentajeReciclado)
    {
        try{
                 parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $precio,$caracteristicas);
         if(!($this->setPorcentajeReciclado($PorcentajeReciclado)))
            throw new Error("debe estar entre 0 y 100");
        }
        catch(Exception $e){
                echo "Error".$e->getMessage();
        }
        
    }


    /** 
     * Función para cambiar el valor de PorcentajeReciclado
     * 
    */

    public function setPorcentajeReciclado(int $numero):bool{
        $estado=true;
        if($numero<0 || $numero>100)$estado=false;

        if($estado)$this->_PorcentajeReciclado=$numero;

        return $estado;
    }

    /***
     * Método toString
     */

    public function __toString()
    {
        return parent::__toString()." con porcentaje de {$this->_PorcentajeReciclado}% Reciclado";
    }

}




?>