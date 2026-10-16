<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$cadena1="Carro Nuevo"; // cadena con ""
// texto HEREDOC
$texto1=<<<fin
Su mamá <br />
se compre un <br />
"¡$cadena1!" 
fin;

$cadena2='Pelota Nueva'; // cadena con ''

//texto NOWDOC
$texto2=<<<'fin'
El niño <br />
se compro una <br />
'¡$cadena2!' 
fin;


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
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
  
<?php

    echo $txt.PHP_EOL;
    echo $txt2.PHP_EOL;

  
  
}
