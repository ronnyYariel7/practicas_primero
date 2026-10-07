<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$arary=[];


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

    echo "" 

}
