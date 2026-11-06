<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador


$cadena="tienes 25 años";
// buscar expresion
$exp='/años/';
$resultado=[];

preg_match($exp,$cadena,$resultado,PREG_OFFSET_CAPTURE); 

//Busqueda
$expr="/\w+(?=.*;)/";
$cadena=" primera segunda tercera;cuarta quinta";

$expr="/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@!%*?&\-_+])[A-Za-z\d$@!%*?&\-_+]{8,15}$/";
$cadena="1A?A3Abb11%? ";
preg_match($expr,$cadena,$resultado,PREG_OFFSET_CAPTURE);

$expr="/(?<=.*;)\w+/";
$cadena="; primero ;";
preg_match($expr,$cadena,$resultado,PREG_OFFSET_CAPTURE);

$expr="/(?<=;)\w+/";
$cadena="; primero ;";
preg_match($expr,$cadena,$resultado,PREG_OFFSET_CAPTURE);

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
