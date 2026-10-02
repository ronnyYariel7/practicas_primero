<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador


//datos basicos
$cadenacadena = "Ronny";
$edad=18;

$basico=[
    "nombre"=>"nombre",

];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Paso Parametros");
cuerpo($basico,$cadenacadena);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{
    ?>
    <!-- esto va en el head -->

    <?php

    

}

//vista
function cuerpo($bas,$ot)
{
?>
   <br> <br>
<?php

echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]}años".PHP_EOL;
echo "Con otros datos {$ot}";



}


function rrellenarDatos(){

}