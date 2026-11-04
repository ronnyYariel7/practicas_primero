<?php

/**
 *Esta función
*comprueba que $var contiene un entero cuyo valor está entre $min y $max. En $var se
*devuelve el entero saneado (en caso de no cumplir las condiciones asigna a $var el valor
*$defecto). La función devuelve true si es correcto y false en caso contrario.
* 
* 
* @return bool
*
 */

function validaEntero(int &$var, int $min, int $max, int $defecto):bool {

    if(is_integer($var) && $var>=$min && $var<=$max)return false;

    $var=$defecto;

    return true;

}