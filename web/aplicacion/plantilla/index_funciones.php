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

$n1=15;
$otra="n1";
$numero=$$otra;

//variables funcion
$otra="suma";
$numero=$otra(1,2,3,4); 

$s=function (int $a , int $b){
    return $a+$b;
};

$s=fn(int $a,int $b)=>$a+$b;


$numero=$s(3,20);



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
