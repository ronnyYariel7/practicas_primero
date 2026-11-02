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
        "TEXTO"=> "ejercicio 1",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio1.php"
    ],
      [
        "TEXTO"=> "ejercicio 2",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio2.php"
    ],

        [
        "TEXTO"=> "ejercicio 3",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio3.php"
    ],

    [
        "TEXTO"=> "ejercicio 4",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio4.php"
    ],
      [
        "TEXTO"=> "ejercicio 5",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio5.php"
    ],
   [
        "TEXTO"=> "ejercicio 6",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio6.php"
    ],

       [
        "TEXTO"=> "ejercicio 7",
        "ENLACE"=> "/aplicacion\plantilla/relacion3/ejercicio7.php"
    ],






];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2",$barra);
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
<h3>Ejercicio 1 .Función generarCadena(). A esta función se le pasa un parámetro con valor por defecto 10 y se 
encarga de devolver una cadena de longitud la indicada cuyos caracteres son generados de forma 
aleatoria (caracteres válidos: letras mayúsculas, minúsculas y números). Devolverá false si se ha 
indicado un número negativo o igual a 0. </h3>
  
<?php

  
echo "Longitud por defecto (10): <b>" . generarCadenas() ."<br>";


echo "Longitud (7): <b>" . generarCadenas(7) ."<br>";
  
}
