<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador

$caracteres=[];

// ASCII a-z
for ($i=97;$i<=122;$i++) {
    $caracteres[]=chr($i);
}

// ASCII A-Z
for ($i=65;$i<=90;$i++) {
    $caracteres[]=chr($i);
}

// 3.  ASCII 0-9
for ($i=48;$i<=57;$i++) {
    $caracteres[]=chr($i);
}

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
inicioCuerpo("Ejercicio 3",$barra);
cuerpo($caracteres);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($caracteres)
{

?>
<h1>Ejercicio 3 .Genera una cadena aleatoria de 20 caracteres (los caracteres permitidos son letras
minúsculas, letras mayúsculas y números)
</h1>
  
<?php

$longitud=count($caracteres);
    $cadena="";
    $index=0;

    for($i=0;$i<20;$i++){
        $index=mt_rand(0,$longitud-1);
        $cadena.=$caracteres[$index];
    }

  echo $cadena.PHP_EOL;

  
  
}
