<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador

$num1=17.5;
$num2=379987.24;

//usamos number_format
$num1_formateado=number_format($num1, 1, ',', '.'); 
$num2_formateado=number_format($num2, 2, ',', '.'); 

// "el primer valor -0000000000017,5-,
$num1_final = str_pad($num1_formateado, 15, "0", STR_PAD_LEFT);

// el segundo valor -379.987,24-"
$num2_final=str_pad($num2_formateado, 15, " ", STR_PAD_LEFT);

$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "Relación 2",
        "ENLACE"=> "/aplicacion\plantilla/relacion2"
    ],

];


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 4",$barra);
cuerpo($num1_final,$num2_final);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($num1_final,$num2_final)
{

?>
<h1>Ejercicio 4 .Tengo unas variables con valores 17.5 (float), 379987.24 (float)
Mostrarlas de forma que resulte "el primer valor -0000000000017,5-, el segundo valor -
379.987,24-"
</h1>
  
<?php

echo "Valor 1: ". $num1_final."<br>";
echo "Valor 2: ".$num2_final;

  
  
}
