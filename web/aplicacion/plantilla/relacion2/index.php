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
        "ENLACE"=> "/aplicacion\plantilla/relacion2/ejercicio1.php"
    ],
     [
        "TEXTO"=> "ejercicio2",
        "ENLACE"=> "/aplicacion\plantilla/relacion2/ejercicio2.php"
    ],
    [
        "TEXTO"=> "ejercicio3",
        "ENLACE"=> "/aplicacion\plantilla/relacion2/ejercicio3.php"
    ],
    [
        "TEXTO"=> "ejercicio4",
        "ENLACE"=> "/aplicacion\plantilla/relacion2/ejercicio4.php"
    ],

     [
        "TEXTO"=> "ejercicio5",
        "ENLACE"=> "/aplicacion\plantilla/relacion2/ejercicio5.php"
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
