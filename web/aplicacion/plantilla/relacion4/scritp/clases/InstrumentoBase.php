<?php

/**
 * Clase abstracta InstrumentoBase 
 */
abstract class InstrumentoBase
{
   /**
    *Variables
    */
    protected static int $_totalInstancias = 0;
    private string $_descripcion = 'sin descripción';
    protected int $_edad = 10;
    private int $_numeroInstancia = 0;

    /**
     * Constructor
     *
     * @param string $descripcion
     * @param integer $edad
     */
    public function __construct(string $descripcion = 'sin descripción', int $edad = 10)
    {
        $this->_descripcion = $descripcion;
        $this->_edad = $edad;
        $this->registrarInstancia();
    }

    /**
     * Devuelve frase que representa a el sonido del instrumento
     *
     * @return string
     */
    abstract public function sonido(): string;

    /**
     * Devuel pasos para afinar instrumento
     *
     * @return string
     */
    abstract public function afinar(): string;

    /**
     * Métodos get y set
     */

    public function getDescripcion(): string
    {
        return $this->_descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->_descripcion = $descripcion;
    }

    public function getEdad(): int
    {
        return $this->_edad;
    }

    /** 
     * Aumenta la edad del instrumento en un año.
     */
    public function envejecer(): void
    {
        $this->_edad++;
    }

    /**
     * Asigna a la instancia su número de orden y 
     * aumenta el contador de la clase.
    *
     */
    protected function registrarInstancia(): void
    {
        self::$_totalInstancias++;
        $this->_numeroInstancia = self::$_totalInstancias;
    }

    /**
     * Método toString
     *
     * @return string
     */
    public function __toString(): string
    {
        return "instrumento con descripción {$this->_descripcion}, 
                 instancia {$this->_numeroInstancia} de un total de " . self::$_totalInstancias . ".
                 Tiene {$this->_edad} años. La clase es " . get_class($this);

    }
}
