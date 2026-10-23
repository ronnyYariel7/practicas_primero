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
inicioCuerpo("Ejercicio 3",$barra);
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
<h3>Ejercicio 3 . Esta función recibe al menos tres parámetros. El primero (entero) es el 
tipo de operación. Los demás son valores numéricos (los operandos). El tipo de operación puede ser 
1, suma todos los operandos 
2, al primer operando se restan el resto 
3, multiplicación de todos los operandos. 
En cualquier otro caso se suman los operandos que ocupan las posiciones pares y se restan 
los de las posiciones impares (el primer operando es 1).  </h3>
  
<?php
   
  
   $resul= operaciones(1,3,4,89,3,4,5);

   echo "Operación sumar: ".$resul."<br>";

   
   $resul= operaciones(2,123,4,35);

   echo "Al primer operando se le restan el resto: ".$resul."<br>";

     $resul= operaciones(3,4,5,2,6,8);

   echo "Multiplica todos los operandos".$resul."<br>";

   $resul= operaciones(113,4,5,2,6,8,2,43,564,6,65,434,3);

   echo "Se suman los pares y luego se resta con la suma de los Impares".$resul;



  
}
