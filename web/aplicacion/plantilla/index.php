<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador


//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION");
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
    hola estamos en el Index, Index expresion
    


    <?php 
        // esto es un comentario 

        echo "Hola esto es PHP";

        $var1=25;
        $cadena="Esto es una Cadena";

        $var1+=12;
        echo $var1;

        $una_cadena="hola";
        $unaCadena="adios";

        $var1-=17;
        echo "$var1";

        $unaCadena=45;
        echo $unaCadena;     
        
        echo $cadena;
    ?>
<?php
}
