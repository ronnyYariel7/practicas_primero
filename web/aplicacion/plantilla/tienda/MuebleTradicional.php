<?php

final class MuebleTradicional extends MuebleBase {

    //Propiedades
    private float $_peso=15;
    private string $_serie="S01";

   
    public function __construct(string $nombre, string $fabricante, string $pais, int $anio, string $fechaIniVenta, string $fechaFinVenta, 
    float $precio,float $peso,string $serie)
    {
         parent::__construct($nombre, $fabricante, $pais, $anio, $fechaIniVenta, $fechaFinVenta, $precio);
         $this->setPeso($peso);
         $this->setSerie($serie);

    }


    /**
     * Metodos setPeso que cambia valor de la propiedad
     * Peso
     */

    public function setPeso(float $numero):bool{
        $estado=true;

        if($numero<15 || $numero>300)$estado=false;

        if($estado)$this->_peso=$numero;
        return $estado;
    }

    /**
     * Método set que cambia el valo de 
     * Serie
     *
     * @param string $serie
     * @return void
     */
    public function setSerie(string $serie):void{ $this->_serie=$serie;}

    /**
     * Redefinición del Método toString
     */

 
    public function __toString()
    {
        return parent::__toString()."con un Peso de {$this->_peso}kg y con un número de serie:{$this->_serie}";
    }
}





?>