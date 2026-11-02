<?php

/**
 *4.- Definir la clase Flauta que es un instrumento de viento que es fabricable y de la que no se puede
*heredar ninguna otra subclase.
*- El constructor se hará privado
*- Se tiene el método estático CrearDesdeArray (constructor estatico) con parámetro un Array
*con posiciones asociativas “material” y “edad” (pueden no aparecer por lo que se tienen en
*cuenta valores por defecto) y que devuelve una instancia de Flauta con los valores
*indicados.
*- Definir el método de clonación para la clase flauta de forma que el nuevo objeto tenga los
*mismos valores, salvo la edad que será 0 y el número de instancia (propiedad) /número de
*instancias (propiedad de clase), ya que realmente he creado una nueva instancia.

 */
final class Flauta extends InstrumentoViento implements IFabricable
{
    /** Constructor privado */
    private function __construct(string $material = 'madera', int $edad = 15)
    {
        parent::__construct($material, $edad);
    }

    /**
     * Constructor estático.
     */
    public static function CrearDesdeArray(array $datos): self
    {
        // Nos quedamos solo con las claves válidas y las pasamos como argumentos con nombre.
        $validos = array_intersect_key($datos, ['material' => true, 'edad' => true]);

            return new static(...$validos);
       
    }

    /**
     * Clonación: mismos valores, salvo la edad (0)
     */
    public function __clone(): void
    {
        $this->_edad = 0;
        $this->registrarInstancia(); //incrementa el total de Instancia
    }

    /**
     * Mètodos
     *
     * @return string
     */
    public function sonido(): string
    {
        return 'sonido suave y agudo';
    }

    /**
     * Metodos de IFabricable
     */

    public function metodoFabricacion(): string
{
    return "Se corta un tubo de {$this->_material}, 
                se perforan los orificios de las notas, 
                        se pule la superficie y se monta la embocadura.";
}

   public function metodoReciclado(): string
{
    switch (mb_strtolower($this->_material)) {
        case 'madera':
            return 'Reutilizar la madera o triturarla.';
            
        case 'metal':
        case 'plata':
        case 'bronce':
        case 'latón':
            return 'Fundir el metal y reutilizarlo';
            
        case 'plástico':
            return 'Separar el plástico y llevarlo al contenedor.';
            
        default:
            return 'Material no reconocido';
    }
}
}