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
   

];


$fecha="1/11/2003";

validaFecha($fecha,$fecha);





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
