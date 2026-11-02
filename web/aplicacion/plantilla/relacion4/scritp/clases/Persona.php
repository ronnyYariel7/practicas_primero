<?php

/**
 * Definir la clase Persona que tendrá:
*- propiedades nombre (string), fecha_nacimiento (string), domicilio (string), localidad (string)
*y estado (EstadoCivil). Todas las propiedades son privadas.
*- Un conjunto de sentencias get/set para devolver/poner su valor.
*- Constructor privado al que no se indica ningún parámetro y que rellena las propiedades con
*valores nombre “prueba”, fecha_nacimiento “01/01/2000”, domicilio “carrera 12”, localidad
*“antequera” y estado “soltero”.
*- Constructor estático registrarPersona, que recibe parámetros para todas las propiedades
*- Método toString que devuelve la cadena “Nombre es una persona estado nacida en
*fecha_nacimiento y que vive en localidad”
*
 */
class Persona
{

    /**
     * Variables
     */

    private string $_nombre;
    private string $_fecha_nacimiento;
    private string $_domicilio;
    private string $_localidad;
    private EstadoCivil $_estado;

    /** Constructor privado */
    private function __construct()
    {
        $this->_nombre = 'prueba';
        $this->_fecha_nacimiento = '01/01/2000';
        $this->_domicilio = 'carrera 12';
        $this->_localidad = 'antequera';
        $this->_estado = EstadoCivil::Soltero;
    }

    /** Constructor estático. */
    public static function registrarPersona(
        string $nombre,
        string $fechaNacimiento,
        string $domicilio,
        string $localidad,
        EstadoCivil $estado
    ): static {
        $persona = new static();
        $persona->setNombre($nombre);
        $persona->setFechaNacimiento($fechaNacimiento);
        $persona->setDomicilio($domicilio);
        $persona->setLocalidad($localidad);
        $persona->setEstado($estado);
        return $persona;
    }

    /**
     * Métodos Get y Set
     *
     * @return string
     */
    public function getNombre(): string
    {
        return $this->_nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->_nombre = $nombre;
    }

    public function getFechaNacimiento(): string
    {
        return $this->_fecha_nacimiento;
    }

    public function setFechaNacimiento(string $fecha): void
    {
        $fecha = trim($fecha);
        $this->_fecha_nacimiento = $fecha;
    }

    public function getDomicilio(): string
    {
        return $this->_domicilio;
    }

    public function setDomicilio(string $domicilio): void
    {
        $this->_domicilio = $domicilio;
    }

    public function getLocalidad(): string
    {
        return $this->_localidad;
    }

    public function setLocalidad(string $localidad): void
    {
        $this->_localidad = $localidad;
    }

    public function getEstado(): EstadoCivil
    {
        return $this->_estado;
    }

    public function setEstado(EstadoCivil $estado): void
    {
        $this->_estado = $estado;
    }

        /** "Método ToString */
    public function toString(): string
    {
        $estadoDesc = mb_strtolower($this->_estado->descripcion());
        
        return "{$this->_nombre} es una persona {$estadoDesc}
                nacida en {$this->_fecha_nacimiento} y 
                        que vive en {$this->_localidad}";
    }
}