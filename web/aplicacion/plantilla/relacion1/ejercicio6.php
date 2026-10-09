<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");

/**
 * 6.- Con el array $vector=array("primera" =>12.56, 24=>true, 67 =>23.76); - Simular el funcionamiento de foreach ($array as $indice => $valor) usando las funciones de 
*recorrido para mostrar tanto los índices como los valores del array anterior. - Simular el funcionamiento de foreach usando las funciones array_keys y array_values para 
*mostrar tanto los índices como los valores del array anterior. 
 *El array se definirá en el controlador y se realizarán las operaciones en la vista. 
 */

//controlador
$vector=array("primera" =>12.56, 24=>true, 67 =>23.76);



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3");
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($vector)
{
   
?>
   <h1>Ejercicio 6 .Simular el funcionamiento de foreach.</h1>
   <?php

   while(key($vector)!=NULL){
        echo "<br>Indice: ".key($vector)."<br>Valor: ".current($vector);
        next($vector); 
   }

   ?>
    <h4>Array_keys y Array_values</h4>
   <?php

   $keys=array_keys($vector);
   $valores=array_values($vector);

   $cont=0;

   while($cont<count($keys)){
    echo "<br>Indice: ".$keys[$cont]."<br>Valor: ".$valores[$cont];
    $cont+=1;
   }
   

}
