<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$cadena1="Carro Nuevo "; // cadena con ""
// texto HEREDOC
$texto1=<<<fin
Su mamá &lt;br&gt;
se compre un &lt;br&gt;
"¡$cadena1!" 
fin;

$cadena2='Pelota Nueva'; // cadena con ''

//texto NOWDOC
$texto2=<<<'fin'
El niño &lt;br&gt;
se compro una &lt;br&gt;
'¡$cadena2!' 
fin;

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
inicioCuerpo("Ejercicio 1",$barra);
cuerpo($texto1,$texto2);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($txt,$txt2)
{

?>
<h1>Ejercicio 1 . Escribe distintas cadenas usando “, ‘, HEREDOC y NOWDOC.</h1>
  
<?php

    // usamos srt_replace 
    $cadena1=str_replace("\n", "<br>", $txt);
    $cadena2=str_replace("\n", "<br>", $txt2);

    echo $cadena1.PHP_EOL;
    echo  $cadena2.PHP_EOL;

  
  
}
