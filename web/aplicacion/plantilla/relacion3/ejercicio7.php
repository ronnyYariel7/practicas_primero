<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
include("./Libreria.php");
//controlador


$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "Relación 3",
        "ENLACE"=> "/aplicacion\plantilla/relacion3"
    ],

];


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 7",$barra);
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
<h3>Ejercicio 7. Función ordenar(): A esta función se le pasa un array y lo ordena mediante una llamada a usort, 
al que se indicará como función callback una función anónima que ordenará en orden descendente 
según el número de caracteres de cada elemento.</h3>
  
<?php
   
   $vector=["a","caminos","grande","uno"]; 
   echo "Array Normal: ".print_r($vector)."<br>";   
    ordenar($vector,fn($a,$b)=>$b<=>$a);
  echo "Array Ordenado Descendente: ".print_r($vector)."<br>";      


  
}

