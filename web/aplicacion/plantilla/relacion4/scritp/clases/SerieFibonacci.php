<?php

/**
 * 6.- Crear la clase SerieFibonacci que implementa la serie de Fibonacci. Esta serie se basa en la
*fórmula F(x)=F(x-1)+F(x-2) siendo F(0)=0 y F(1)=1. Para obtener el valor F(n) se puede usar la
*fórmula alternativa
 */

class SerieFibonacci implements Iterator
{
    private int $_limite;
    private int $_claveActual = 0;
    
    // Variables auxiliares
    private int $_actual = 0;
    private int $_siguiente = 1;

    /**
     * Constructor: Recibe el límite de elementos a generar.
     */
    public function __construct(int $limite)
    {
        $this->_limite = $limite;
    }

    /**
     * Métodos de la interfaz Iterator
     */

    public function rewind(): void
    {
        $this->_claveActual = 0;
        $this->_actual = 0;
        $this->_siguiente = 1;
    }

    public function current(): mixed
    {
        return $this->_actual;
    }

    public function key(): mixed
    {
        return $this->_claveActual;
    }

    public function next(): void
    {
        // Calculamos el siguiente número de Fibonacci
        $nuevo = $this->_actual + $this->_siguiente;
        $this->_actual = $this->_siguiente;
        $this->_siguiente = $nuevo;
        
        $this->_claveActual++;
    }

    public function valid(): bool
    {
        return $this->_claveActual < $this->_limite;
    }

    /**
     * Función estática usando un generador
     */
    public static function fFibonacci(int $ultimo): Generator
    {
        $a = 0;
        $b = 1;
        
        for ($i = 0; $i < $ultimo; $i++) {
            yield $a;
            $temp = $a;
            $a = $b;
            $b = $temp + $b;
        }
    }
}