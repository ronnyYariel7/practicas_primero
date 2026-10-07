<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
const FILAS=6;

$array=[];
function cadena(){
    $cadena="";
   for($i=0;$i<FILAS;$i++){
     $array[$i]=($i);
    for($a=0;$a<$i;$a++){
        $cadena.=$array[$i]."&nbsp";
    }
    $cadena.="<br>";
}
    return $cadena;
}



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
   
?>
   <h1>Ejercicio 3 . Rellenar posiciones de arrays.</h1>
   <?php

    echo cadena();
   

}
