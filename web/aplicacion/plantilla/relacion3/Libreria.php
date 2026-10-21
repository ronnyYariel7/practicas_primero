<?php

use LDAP\Result;

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
/**
 * funcion que se le pasa como minimo tres parametros,
 * 1, suma todos los operandos
*2, al primer operando se restan el resto
*3, multiplicación de todos los operandos.
*En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan
*los de las posiciones impares (el primer operando es 1).
 *
 * @param integer $op
 * @param integer $num
 * @param integer $num2
 * @param integer ...$resto
 * @return integer
 */

function operaciones(int $op,int $num,int $num2, int ...$resto): int{
    $resul=array_sum($resto); // función que suma los valores del array

    if($op==1){$resul+=$num+$num2;}
    else if($op==2){
        $num-=$num2;
        $resul=$num-$resul;
    }
    else if($op==3){
         $resul=array_product($resto); //función que multiplica los valores del array
         $resul*=$num;
         $resul*=$num2;
    }
    else {
        $resul=array_merge([$op,$num,$num2],$resto); // función que combina dos arrays
        $sumPares=0;
        $sumImpares=0;

        for($i=0;$i<count($resul);$i++){
            if($i!=0 && $i%2==0){
                $sumPares+=$resul[$i];
            }
            else if($i!=0) $sumImpares+=$resul[$i];
        }

        $resul=$sumPares-$sumImpares;
    }

    return $resul;

}


?>