<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador

// cadena  Heredoc
$cadena = <<<TEXTO
<b>Texto etiqueta</b>
Número: 506
Correo: ronny@correo.es
TEXTO;

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
inicioCuerpo("Ejercicio 5",$barra);
cuerpo($cadena);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($cadena)
{

?>
<h1>Ejercicio 5 .Crea una cadena que ocupe varias líneas (usa nowdoc o heredoc). En líneas distintas debe
aparecer: varias etiquetas html (<>), varios números (de 1 o varias cifras) y varias direcciones
de correo electrónico (formato aaaa@aaaa.aa). 
</h1>
  
<?php

// expresiones regulares 
$patron_etiqueta = '/<[^>]+>/';
$patron_numero   = '/\d+/';
$patron_email    = '/\w+@\w+\.\w+/';

// preg_match para comprobar el si cumple la expresion regular
if (preg_match($patron_etiqueta, $cadena, $res, PREG_OFFSET_CAPTURE)) {
    echo "Etiqueta:".$res[0][0].",Posición:".$res[0][1]."<br>";
}
//PREG_OFFSET_CAPTURE dnos devuele un array bidemencional con el elemento y su posición
if (preg_match($patron_numero, $cadena, $res, PREG_OFFSET_CAPTURE)) {
    echo "Número: " .$res[0][0]." , Posición: ".$res[0][1]."<br>";
}

if (preg_match($patron_email, $cadena, $res, PREG_OFFSET_CAPTURE)) {
    echo "Email:" .$res[0][0]." ,Posición: ".$res[0][1]."<br>";
}

  
  
}
