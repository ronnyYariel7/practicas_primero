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
    $opciones=["options" => [
        "min_range" => $min,
        "max_range" => $max
    ]];

    if(filter_var($var,FILTER_VALIDATE_INT,$opciones)=== false)return true;

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

 $opciones=["options" => [
        "min_range" => $min,
        "max_range" => $max
    ]];

     if(filter_var($var,FILTER_VALIDATE_FLOAT,$opciones)=== false)return true;

    $var=$defecto;

    return false;


}

/**
 * function validaFecha(string &$var, string $defecto):bool Esta función comprueba que $var
*contiene una fecha correcta en el formato dd/mm/aaaa. En $var se devuelve la fecha saneada
*(2 cifras para dia y mes y cuatro para año- ej fecha 1/2/2023 es válida aunque se sanea y se
*convierte en 01/02/2023). En caso de no cumplir las condiciones devuelve $defecto en
*$var. La función devuelve true si es correcta y false en caso contrario.
*@return bool
 */

 
function validaFecha(string &$var, string $defecto):bool{
     $var=trim($var); 
    $sw=false;
    if(preg_match('/^(\d{1,2})\/(\d{1,2})\/(\d{4})$/',$var,$datosFecha,PREG_OFFSET_CAPTURE)){


        $dia=$datosFecha[1][0];
        $mes=$datosFecha[2][0];
        $año=$datosFecha[3][0];
       
    
        if(checkdate($mes,$dia,$año)){
            $var=sprintf("%02d/%02d/%04d",$dia,$mes,$año);
             $sw=true;
        }

        if(!$sw)$var=$defecto;

        
    }
    
    return $sw;
    
}

/**
 *Esta función comprueba que $var
*contiene una hora correcta en el formato hh:mm:ss . En $var se devuelve la hora saneada (2
*cifras para hora, min, segundos - Ej 0:5:1, hora valida aunque se sanea y se convierte a
*00:05:01). En caso de no cumplir las condiciones devuelve $defecto en $var. La función
*devuelve true si es correcta y false en caso contrario
*@return bool
 */

function validaHora(string &$var, string $defecto):bool{
     $var=trim($var); 

    $sw=false;
    if(preg_match('/^(\d{1,2}):(\d{1,2}):(\d{1,2})$/',$var,$datosHora,PREG_OFFSET_CAPTURE))
        {
            $hora=$datosHora[1][0];
            $minuto=$datosHora[2][0];
            $segundos=$datosHora[3][0];


            if ($hora >=0 && $hora <=12 && $minuto >=0 && $minuto<=59 && $segundos>=0 && $segundos<=59){
                $var=sprintf("%02d:%02d:%02d",$hora,$minuto,$segundos);
                 if(!(DateTime::createFromFormat("h:i:s",$var))){$var=$defecto;}
            else $sw=true;
                
            }
           
        }


    return $sw;

}

/**
 *Esta función comprueba que $var
 *contiene un email correcto en el formato aaaaa@bbbb.ccc. En $var se devuelve el email
 *saneado (en caso de no cumplir las condiciones devuelve $defecto). La función devuelve
 *true si es correcto y false en caso contrario.
 *
 * @return bool
 */


function validaEmail(string &$var, string $defecto):bool{

    $var=trim($var); 
    if(filter_var($var,FILTER_VALIDATE_EMAIL))return true;

    $var=$defecto;
    return false;
    
} 

/**
 *Esta función
*comprueba que $var contiene una cadena de longitud máxima $longitud. En caso de no
*cumplir las condiciones se asigna a $var el valor $defecto. La función devuelve true si es
*correcto y false en caso contrario.
* @return  bool
 */

function validaCadena(string &$var, int $longitud, string $defecto):bool{

        $var=trim($var); 
        if(mb_strlen($var)==$longitud)return true;

        $var=$defecto;
        return false;
}

/**
 *  Esta función
*comprueba que $var cumple con la expresión regular $expresion. En caso de no cumplir las
*condiciones se asigna a $var el valor por $defecto. La función devuelve true si es correcto y
*false en caso contrario
 * @return bool
 */
function validaExpresion(string &$var, string $expresion, string $defecto):bool{
    $var=trim($var); 

    if(preg_match($expresion,$var))return true;

    $var=$defecto;
    return false;

}


/**
 *Esta función comprueba
*que $var sea igual a uno de los elementos del array $posibles ($tipo=1) o a una de las claves
*del array $posibles ($tipo=2). La función devuelve true si es correcta y false en caso contrario.
 */

function validaRango(mixed $var, array $posibles, int $tipo=1):bool {

    $sw=false;
    
    if($tipo==1){
        if((array_search($var,$posibles)))$sw=true;
    } 
    else if($tipo==2){
        if(array_key_exists($var,$posibles))$sw=true;
    }

    return $sw;
}