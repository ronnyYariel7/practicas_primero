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
inicioCuerpo("Ejercicio 1",$barra);
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
<h1>Ejercicio 1 .Función cuentaVeces(). A esta función se le pasan cuatro parámetros: un array, una cadena y dos 
números. La función se encargará de añadir en el array el primer número a la posición asociativa 
indicada por la cadena. Hay que tener en cuenta que el array debe quedar actualizado cuando se 
salga de la función. Además, cada vez que se llama a la función, se devuelve en el segundo número 
un valor que corresponde con el número de llamada actual (1 para la primera, 2 para la segunda 
llamada, etc). Se devolverá true si todo ha ido bien y false si se ha detectado algún error. (se debe 
dar error si se indica como posición“2daw”o “primera”)</h1>
  
<?php

        $vector = array(); 
        $numero = 0;       

    echo "<h3>Primera llamada:</h3>";
    cuantasVeces($vector, "1osición", 7, $numero); 
    echo "Valor de numero: " . $numero . "<br>";
    echo "Contenido de vector: ";
    print_r($vector);

     echo "<h3>Segunda llamada:</h3>";
    cuantasVeces($vector, "2osición", 11, $numero); 
    echo "Valor de numero: " . $numero . "<br>";
    echo "Contenido de vector: ";
    print_r($vector);



  
  
}
