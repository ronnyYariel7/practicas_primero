<?php
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador


//datos basicos
$cadenacadena = "Ronny";
$edad=18;

$basico=[
    "nombre"=>"nombre",

];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Paso Parametros");
cuerpo($basico,$cadenacadena);  //llamo a la vista
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
function cuerpo($bas,$ot)
{
?>
   <br> <br>
<?php

echo "Mi nombre es {$bas["nombre"]} de {$bas["edad"]}años".PHP_EOL;
echo "Con otros datos {$ot}";

$miArray[3]=34;
$miArray[7]=1234;
$miArray["nueva"]=54;
$total=0;

    $final=count(($miArray));
    for($i=0;$i<count($miArray);$i++){
        if(!isset($miArray[$i]))
            $total+=$miArray[$i];
            else
                $final++;
    }

    $miArray["nueva"]=24; 

    $total=0;
    $total1=0;
    foreach($miArray as $i=>$valor){

        $total+=$miArray[$i];
        $total1+=$valor;
    }

    
    function prueba($a){
        
    }

}


function rrellenarDatos(){

}