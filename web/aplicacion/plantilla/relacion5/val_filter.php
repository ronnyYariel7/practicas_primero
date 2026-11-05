<?php

use function PHPSTORM_META\type;

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

    if($var>=$min && $var<=$max)return true;

    $var=$defecto;

    return false;

}

/**
 * function validaReal(float &$var, float $min, float $max, float $defecto):bool Esta función
*comprueba que $var contiene un real cuyo valor está entre $min y $max. En $var se devuelve
*el real saneado (en caso de no cumplir las condiciones asigna a $var el valor $defecto). La
*función devuelve true si es correcto y false en caso contrario.
 * 
 * @return bool
 */

function validaReal(float &$var, float $min, float $max, float $defecto):bool{

     if($var>=$min && $var<=$max)return true;

    $var=$defecto;

    return false;


}

/**
 * function validaFecha(string &$var, string $defecto):bool Esta función comprueba que $var
*contiene una fecha correcta en el formato dd/mm/aaaa. En $var se devuelve la fecha saneada
*(2 cifras para dia y mes y cuatro para año- ej fecha 1/2/2023 es válida aunque se sanea y se
*convierte en 01/02/2023). En caso de no cumplir las condiciones devuelve $defecto en
*$var. La función devuelve true si es correcta y false en caso contrario.
 */

 
function validaFecha(string &$var, string $defecto):bool{
    $sw=false;
    if(preg_match('/^\d{1,2}\/\d{1,2}\/{4}$/',$var)){

        $var=date("d/m/Y",strtotime($var));
        $datosFecha=mb_split('/^\/$/',$var);

        if(checkdate($datosFecha[0],$datosFecha[1],$datosFecha[2]))$sw=true;

        if(!$sw)$var=$defecto;

        
    }
    
    return $sw;
   
    
}