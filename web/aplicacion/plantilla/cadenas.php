<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador


//datos basicos

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Paso Parametros");
cuerpo();  //llamo a la vista
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
function cuerpo()
{
?>
   El ni&ntilde;o me ha escrito una carta . 
   QUÉ&eacute; &lt;&gt; BONITO 
<?php




}


function rrellenarDatos(){

}