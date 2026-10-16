<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "ejercicio1",
        "ENLACE"=> "C:/Web/Practicas-Primeros/web/aplicacion\plantilla/relacion2/ejercicio1.php"
    ],

];



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
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
    <?php 

    ?>
<?php
}
