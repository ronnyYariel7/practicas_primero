<?php


/**
 * Funcion que devuelve un número 
 * Si el número es menor de 10 se dara errorñ
 *
 * @param integer $num Numero al que aplicar el doble 
 * @return integer|false Devuelve el doble del argumento o false en caso de error
 */
function doble(int $num): int|false
{
 //$num es menor de 10, consideramos que hay un error
 if ($num<10)
 return false;
 return 2*$num;
}


function varioParametros(int $par1,string $par2="",float $par3=10.0) : int|float
{

    static $cadena="";

    if(is_integer($par2))
        $par2=intval($par2);
    else
        $par2=0;
    $par2=is_integer($par2)?intval($par2):0;


    $par3+=$par1+$par2;

    return $par3;
    
}
        

?>