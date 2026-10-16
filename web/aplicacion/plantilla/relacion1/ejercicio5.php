<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php"],
    [
        "TEXTO"=> "ejercicio1",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio1.php"
    ],
    [
        "TEXTO"=> "ejercicio2",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio2.php"
    ],
    [
        "TEXTO"=> "ejercicio3",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio3.php"
    ] ,
    [
        "TEXTO"=> "ejercicio4",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio4.php"
    ],
    [
        "TEXTO"=> "ejercicio5",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio5.php"
    ] ,
    [
        "TEXTO"=> "ejercicio6",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio6.php"
    ] ,
    [
        "TEXTO"=> "ejercicio7",
        "ENLACE"=>"/aplicacion\plantilla/relacion1/ejercicio7.php"
    ] ,
     
    
];


$vector=array();
$vector[1]="esto es una cadena";
$vector["posi1"]=25.67;
$vector[]=false;
$vector["ultima"]=array(2,5,96);
$vector[56]=23;


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 5",$barra);
cuerpo($vector);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($vector)
{
   
?>
   <h1>Ejercicio 5 .Mostrar mediante bucles foreach el contenido del array segun la salida.</h1>
   <?php
   foreach($vector as $index=>$elem){
    $cadena="<br><br>";
    $cadena.="Posición: ".$index."<br>Contenido: ".gettype($elem);
   
    switch(gettype($elem)){
        case "array":$cadena.="<br>Valores del Array: "; 
                         foreach($elem as $valor)$cadena.=$valor."&nbsp;|"; 
                    break;
        case "boolean": $cadena.="<br>Valor: ".(($elem===true)?"true":"false").
                                    "<br> Opuesto: ".((!$elem===false)?"false":"true");
                    break;
        case "integer": $cadena.="<br>Entero: ".$elem."<br>Binario: ".decbin($elem);
                    break;
        case "double":$cadena.="<br>Valor: ".$elem."<br> Valor al Cuadrado: ".pow($elem,2);
                    break;
        case "string": $cadena.="<br>Valor: ".$elem;break;
    }

    echo $cadena;
   }
}