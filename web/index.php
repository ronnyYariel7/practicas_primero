<?php
include_once(dirname(__FILE__) . "/cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php"],
      [
        "TEXTO"=> "Relación 1",
        "ENLACE"=> "/aplicacion\plantilla/relacion1/index.php"
    ],
      [
        "TEXTO"=> "Relación 2",
        "ENLACE"=> "/aplicacion\plantilla/relacion2/index.php"
    ]
    
];


$usuario=getenv("MYSQL_USER");

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
    <br><br>
    
    Hola, estás en Index.php wecwecw
    <br>
    <a href="/aplicacion/plantilla/index.php">ir a otro index</a>
<?php
}
