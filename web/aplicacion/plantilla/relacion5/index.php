<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Importar Clases
include("./val_filter.php");
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
    "TEXTO"=> "Formulario",
    "ENLACE" => "scripts/formulario.php",
    ]
   

];


$fecha="1/11/2003";

validaFecha($fecha,$fecha);

$hora="0:5:1";
validaHora($hora,$hora);

$hora="24:5:1";
validaHora($hora,$hora);
 
$email="roonny.juarez2007@gmail.com";
validaEmail($email,"ema.sdeededed");

$email="1029323.com";
validaEmail($email,"ema.sdeededed");

$cadena="hola";
validaCadena($cadena,4,"adios");

validaCadena($cadena,6,"adios"); // cadena cambia de valor

$colores=["rojo","verde","amarillo"];

validaRango("verde",$colores);
validaRango("rosado",$colores);

$fruta=["primera"=>"manzana","segundo"=>"pera","tercero"=>"Piña"];
validaRango("primera",$fruta,2);
validaRango("sexta",$fruta,2);


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
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
