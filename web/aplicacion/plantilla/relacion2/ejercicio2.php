<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($txt,$txt2)
{

?>
  
<?php

    echo $txt.PHP_EOL;
    echo $txt2.PHP_EOL;

  
  
}
