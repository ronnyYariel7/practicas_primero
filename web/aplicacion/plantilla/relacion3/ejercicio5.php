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
inicioCuerpo("Ejercicio 5",$barra);
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
<h3>Ejercicio 5.Tenemos la Función hacerOperacion que recibe tres parámetros. El primero es una cadena 
que puede ser suma, resta o multiplicacion. Los otros dos son los operandos. Esta función se 
encargará de devolver el resultado de ejecutar la “cadena” con los operandos usando una variable
función para llamar a la operación. Hay que comprobar indicando una operación correcta (devuelve 
false si la operación no es válida).  </h3>
  
<?php
   
  echo "Suma (2+3):".hacerOperacion("suma",2,3)."<br>";
  echo "Resta (20-5): ".hacerOperacion("resta",20,5)."<br>";
  echo "Multiplicación (20*5): ".hacerOperacion("multiplicacion",20,5)."<br>";



  
}
