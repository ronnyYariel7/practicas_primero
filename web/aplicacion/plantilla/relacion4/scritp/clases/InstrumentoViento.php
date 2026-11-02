<?php

/**
 *3.- Definir la clase InstrumentoViento que hereda de InstrumentoBase con el siguiente
*comportamiento:
*- La descripción es “instrumento de viento”.
*- Tiene el atributo material con valor por defecto madera. Este atributo no es accesible
*directamente desde el exterior aunque si desde las clases derivadas. No se tienen métodos
*set/get para esta propiedad.
*- Al constructor se le pasa como parámetro el material y la edad (valor por defecto 15).
*- El método afinar no debe ser redefinible en las clases derivadas de esta.
*- Cuando se muestre en un echo aparecerá, junto a todo lo indicado por la clase base, el texto
*“Instrumento de material XXXX”. 
 * 
 * 
 */
class InstrumentoViento extends InstrumentoBase
{
    /**
     * Variables
     */
    protected string $_material = 'madera'; // valor por defecto madera

    public function __construct(string $material = 'madera', int $edad = 15)
    {
        parent::__construct('instrumento de viento', $edad); //parent para llmar a la clase padre

        $this->_material = $material;
    }

    /**
     * Métodos heredados
     *
     * @return string
     */
    public function sonido(): string
    {
        return 'Al soplar, suena una nota';
    }

    /** final: las clases derivadas NO pueden redefinirlo. */
    final public function afinar(): string
    {
        return '1) Soplar Instrumento. '
            . '2) Tocar una nota . '
            . '3) Ajustar la longitud hasta igualar la nota.';
    }

    /**
     * Método toString
     *
     * @return string
     */
    public function __toString(): string
    {
        //parent llama el toString de la Clase Padre
        return parent::__toString()." Instrumento de material {$this->_material}";
    }
}
