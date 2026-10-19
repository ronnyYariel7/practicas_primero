<?php 
include_once(dirname(__FILE__) . "/../../cabecera.php");

include("./mis_funciones.php");


$numero=doble(3);
//comprobación 
if($numero===false)
    {
        //hay un error lo resulevo
        $numero=5;
    }
if($numero=doble($numero)===false)
    {
        exit;
    }


//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "cadenas",
        "ENLACE"=> "C:/Web/Practicas-Primeros/web/aplicacion/plantilla/cadenas.php"
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
