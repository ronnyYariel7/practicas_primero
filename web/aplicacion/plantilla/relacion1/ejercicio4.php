<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
const FILAS=5;


function rellenarArray(){

    $array=[FILAS];
   for($i=0;$i<FILAS;$i++){
    $array2=[];
    for($a=0;$a<=$i;$a++){
        $array2[$a]=($i+1);
    }
     $array[$i]=$array2;
   
}

return $array;
    
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
   <h1>Ejercicio 4 .Generar un array con los siguientes valores mostrándolos posteriormente con foreach. El array se
debe generar usando bucles for.</h1>
   <?php

     $array=rellenarArray();

     foreach($array as $elem){
        
        foreach($elem as $valor){
              echo $valor;
        }
            echo "<br>";
   
   
     }
   

}
