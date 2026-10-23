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
<h3>Ejercicio 4. Función devuelve(). Esta función recibe como parámetros tres números (enteros) y devuelve la 
suma de los tres valores en el primer parámetro y como resultado de la función el producto de los 
tres valores. Los dos últimos parámetros tendrán definidos valor por defecto (el que queráis). 
$valor=7; 
devuelve($valor,4) //$valor valdrá 7+4+10 y se devuelve 7*4*10 (10 es el valor por defecto que 
le he puesto al tercer parámetro.).  </h3>
  
<?php
   
  
   $num=0;

   echo "Suma de los parametros(3): ".$num."<br>";
   echo "Producto: ".devuelve($num,10,2)."<br>";


   echo "Suma de los parametros(1): ".$num."<br>";
   echo "Producto: ".devuelve($num)."<br>";

    echo "Suma de los parametros(1,2): ".$num."<br>";
    echo "Producto: ".devuelve($num,45)."<br>";

    echo "Suma de los parametros(1,3): ".$num."<br>";
    echo "Producto: ".devuelve($num,34)."<br>";





  
}
