<?php 

include_once "script/clases/Punto.php";
include("script/funciones.php");
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
$puntos=[];

//Leemos el fichero
leerFichero($puntos);
if(isset($_POST["crearPunto"]))
{
  $cordenadaX=intval($_POST["cordenadaX"]);
  $cordenadaY=intval($_POST["cordenadaY"]); 
  $color=$_POST["selectColores"];
  $grosor=intval($_POST["grosor"]);

  $puntos[]=new Punto($cordenadaX,$cordenadaY,$color,$grosor);
  escribirFichero($puntos);
  header("Location: " . $_SERVER["PHP_SELF"]); exit;
}

//Al precionar el Botón del formulario se eliminara el Punto
//que seleciono el usuario
if(isset($_POST["btEliminar"]))
{
    $punto=$_POST["borrarPunto"];
    leerFichero($puntos,$punto);
    escribirFichero($puntos);

}
include_once(dirname(__FILE__) . "../../../../cabecera.php");




//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
cuerpo($puntos);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo(array $puntos)
{
?>
    <h2>Agregar las Cordenadas X y Y en el Formulario</h2><br> 
    <?php 
         cordenandasFormulario();
    ?><h2>Eliminar Punto</h2><?php
        borrarPunto($puntos);
    ?><h2>Puntos Registrados</h2><?php
         visualizarPuntos($puntos);
    ?><h2>Imagen Puntos</h2><?php
        agregarImagen($puntos);


}

