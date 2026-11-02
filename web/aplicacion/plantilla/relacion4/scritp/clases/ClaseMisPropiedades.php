<?php

/**
 * Crear la clase ClaseMisPropiedades. En esta clase se define una propiedad privada llamada
*$_propiedades. Se debe permitir añadir en tiempo de ejecución cualquier nueva propiedad
*(propiedades dinámicas) a una instancia. Además tenemos las propiedades de instancia
*$propPublica (publica, mixed) y $_propPrivada (privada, mixed, inicializada a 25).
 */

class ClaseMisPropiedades implements Iterator
{
    private array $_propiedades = [];
    public mixed $propPublica = null;
    private mixed $_propPrivada = 25;

    // Propiedades auxiliares 
    private array $_keys = [];
    private array $_values = [];
    private int $_position = 0;

    /**
     * Captura la asignación de propiedades dinámicas
     */
    public function __set(string $name, mixed $value): void
    {
      
        $this->_propiedades[$name] = $value;
    }

    /**
     * Permite leer propiedades dinámicas 
     */
    public function __get(string $name)
    {
        if (array_key_exists($name, $this->_propiedades)) {
            return $this->_propiedades[$name];
        }

        if ($name === '_propPrivada') {
            return $this->_propPrivada;
        }

    
    }

    /**
     * Métodos de la interfaz Iterator
     */
    public function rewind(): void
    {
        $this->_keys = [];
        $this->_values = [];

        // Añadimos las propiedades dinámicas 'oi_'
        foreach ($this->_propiedades as $key => $value) {
            $this->_keys[] = 'oi_' . $key;
            $this->_values[] = $value;
        }

        // Añadimos propPublica al final
        $this->_keys[] = 'propPublica';
        $this->_values[] = $this->propPublica;

        // Añadimos _propPrivada al final
        $this->_keys[] = '_propPrivada';
        $this->_values[] = $this->_propPrivada;

        $this->_position = 0;
    }

    public function current(): mixed
    {
        return $this->_values[$this->_position];
    }

    public function key(): mixed
    {
        return $this->_keys[$this->_position];
    }

    public function next(): void
    {
        $this->_position++;
    }

    public function valid(): bool
    {
        return isset($this->_keys[$this->_position]);
    }
}
