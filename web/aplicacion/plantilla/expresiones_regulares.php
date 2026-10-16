<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador


$cadena="tienes 25 años";
// buscar expresion
$exp='/años/';
$resultado=[];

preg_match($exp,$cadena,$resultado,PREG_OFFSET_CAPTURE); 

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
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
  
<?php

}
