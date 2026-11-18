<?php 
include_once(dirname(__FILE__) . "../../../../cabecera.php");
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
    <h2>Agregar las Cordenadas X y Y en el Formulario</h2><br> 
    <?php 
         cordenandasFormulario();

    ?>
<?php


}

function cordenandasFormulario(){
    ?>
    <form action="" method="post">
        <label for="">Cordenada X:</label>
        <input type="number" id="cordenaX">
        <br>
        <label for="">Cordenada Y: </label>
        <input type="number" id="cordenadaY">
    </form>

    <?php
}
