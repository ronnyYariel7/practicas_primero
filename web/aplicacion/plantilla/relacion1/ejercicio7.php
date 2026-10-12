<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");

/**
*7.- Mostrar el funcionamiento de las fechas. Se harán todos los apartados usando la serie de funciones 
*para gestión de fecha. Se repetirán todos los ejercicios usando la clase DateTime. - Mostrar la fecha actual en el formato “d/m/Y” - Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd”. - Mostrar la hora actual en el formato “hh:mm:ss” - Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45. - Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas 
*Se definirán las fechas y se visualizarán directamente en la vista. ( no se definirán en el 
*controlador)
 */

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


function restarDiferenteFormato($dia,$form){
     
    $fecha_nueva=date($form,strtotime($dia.'- 12 years -4 horus')) ;  

    $cadena="<br>Fecha de hace 12 años y 4 horas menos 'd/m/y H:i:s': ".$fecha_nueva;

    return $cadena;
}


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
   <h1>Ejercicio 7 .Mostrar el funcionamiento de las fechas.</h1>
   <?php
    ?>
     <h4> Mostrar la fecha actual en el formato “d/m/Y” </h4>
    <?php
     $hoy=new DateTime();
    $cadena="Fecha Actual 'd/m/Y' : ".$hoy->format('d/m/Y');
    echo $cadena;

     ?>
     <h4> Mostrar la fecha actual en el formato “dia d, mes mmmm, año yyyy, dia de la semana dd” </h4>
    <?php

    $cadena="Fecha actual formato 'd/m/y/w' : ".$hoy->format('d/m/y/w');

    echo $cadena;

       ?>
     <h4> Mostrar la hora actual en el formato “hh:mm:ss” ” </h4>
    <?php
    $cadena="Hora Actual  formato 'h:m:s' : ".$hoy->format('h:m:s');
    echo $cadena;

    ?>
     <h4> Mostrar los tres apartados anteriores para la fecha 29/3/2024 a 12:45. </h4>
    <?php
    $dia=new DateTime("29-03-2024 12:45");

    $cadena="Fecha actual 'd/m/y ': ".$dia->format('d/m/y');

    
    $cadena.="<br>Fecha actual y Hora actual formato 'd/m/y/w H:i:s': ".$dia->format('d/m/y/w H:i');

    $cadena.="<br>Fecha actual y Hora actual formato 'd/m/y/w H:i:s': ".$dia->format('d/m/y/w H:i:s');

    echo $cadena;

    ?>
     <h4>Mostrar los tres apartados anteriores para la fecha actual menos 12 días y 4 horas</h4>
    <?php

       $dia=date("d/m/Y H:i:s");

    echo restarDiferenteFormato($dia,"d/m/Y ").PHP_EOL;

   echo restarDiferenteFormato($dia,"d/m/y/w H:i").PHP_EOL;

   echo restarDiferenteFormato($dia,"d/m/y/w H:i:s").PHP_EOL;

}
