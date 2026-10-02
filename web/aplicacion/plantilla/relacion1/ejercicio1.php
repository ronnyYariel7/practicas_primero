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
function cuerpo()
{
?>
   <h1>Ejercicio 1 . Mostrar diversas Funciones Matematicas.</h1>
<?php
     echo "Estas en la plantilla de ejercicios";
}
