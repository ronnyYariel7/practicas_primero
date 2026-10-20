<?php

/**
 * Funcion que agrega valores usando claves asosiativa
 * y cuenta las veces que la función fue llamada
 *
 * @param array $array
 * @param string $cadena
 * @param integer $num1
 * @param integer $num2
 * @return bool
 */
function cuantasVeces(array $array ,string $cadena,int $num1 ,int $num2): bool
{


    if($cadena==="2daw" || $cadena==="primera")return false;

    static $contador=0; // usamos variable estaticas para contar las veces que se uso 
    $contador++;
    $num2=$contador;

    //agregamos el valor al array
    $array[$cadena]=$num1;

    return true;

}

/**
 * Función que nos permite crear cadenas aleatorias segun la 
 * longitud que se indique , si la longitud es <=0 devuelve false
 *
 * @param integer $longitud
 * @return boolean
 */
function generarCadenas(int $longitud=10): bool{

    if($longitud<=0) return false;

    $caracteres ='abcdefghijKABCDEFGHI12348943';
    $longCadena=mb_strlen($caracteres,'UTF-8');
    $cadena="";

    for($i=0;$i<$longitud;$i++){
        $index=mt_rand(0,$longCadena-1);
        $cadena.=$caracteres[$index];
    }

    return true;

}




?>