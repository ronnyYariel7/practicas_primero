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
