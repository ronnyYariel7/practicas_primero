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
inicioCuerpo("Ejercicio 6",$barra);
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
<h3>Ejercicio 6.Crear la función llamadaAFuncion que recibe tres operandos (entero, entero y callable) y que 
devuelve un entero que es el resultado de llamar al parámetro callback con los otros parámetros. 
Llamar a la función llamadaAFuncion 3 veces pasando como parámetro de callback funciones de 
flecha distintas que tu definas 
llamadaAFuncion(1,2,fn($a,$b)=>$a+$b) .  </h3>
  
<?php
   
    echo "Suma (1,2): ". llamarAfuncion(1,2,fn($a,$b)=>$a+$b)."<br>";
    echo "Resta (30-20): ". llamarAfuncion(30,20,fn($a,$b)=>$a-$b)."<br>";
    echo "Multiplicación (5*5): ". llamarAfuncion(5,5,fn($a,$b)=>$a*$b)."<br>";



  
}


