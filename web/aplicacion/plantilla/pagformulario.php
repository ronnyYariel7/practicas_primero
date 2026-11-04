<?php 
include_once(dirname(__FILE__) . "/../../cabecera.php");


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

$o=[
    "opcione"=>[
        "min_range"=>100,
        "max_range"<=100
    ]
    
];

$datos=[
    "nombre"=>"Ronny",
    "precio"=>23
];

$errores=[];

if(isset($_POST["cr"]))
    {
        //verifico nombre
        $nombre=" ";
        if(isset($_POST["nombre"])){
            $nombre= $_POST["nombre"];
            $nombre = mb_strtolower((mb_trim($nombre)));
        }
        if($nombre=="")
            {
                $errores["nombre"][]="Debe Indicarse el Nombre ";
            }
    }

$res=filter_var('0x81',FILTER_VALIDATE_INT,$o);


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
