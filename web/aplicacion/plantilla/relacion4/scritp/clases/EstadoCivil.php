<?php

/**
* 5.- Definir el tipo enumerado EstadoCivil con las siguientes características:
*- Casos de soltero, casado, pareja y viudo con valores 10, 20, 30 y 40 respectivamente.
*- Método descripcion que devuelve el nombre del caso concreto.
*- Método valor que devuelve el valor del caso concreto.
*- Método estático casos que devuelve un array con todos los casos
 */
enum EstadoCivil: int
{
    case Soltero = 10;
    case Casado = 20;
    case Pareja = 30;
    case Viudo = 40;

    /** Nombre del caso concreto. */
    public function descripcion(): string
    {
        return $this->name;
    }

    /** Valor del caso concreto. */
    public function valor(): int
    {
        return $this->value;
    }

    /** Array con todos los casos. */
    public static function casos(): array
    {
        return self::cases();
    }
}
