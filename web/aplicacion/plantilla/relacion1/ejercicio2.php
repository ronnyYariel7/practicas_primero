<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
const N = 6; //Lanzamientos 
const LONG =1000;
//array
$datos=[];

//generamos los lanzamientos
for($i=0;$i<N;$i++){
    $datos[$i]=mt_rand(1,6);
}

//número de veces que aparce una cara en derterminado numero de lanzamientos

$cont=0;
$resultados=[];
$numVeces=array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);
$num=0;

while($cont<LONG){
    $num=(mt_rand()%6)+1;
    $resultados[$cont]=$num;
    $numVeces[$num]+=1;
    
    $cont++;
}



function porcentaje($apa,$lan){
    
return ($apa/$lan)*100;
}


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2");
cuerpo($datos,$numVeces);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($datos,$numVeces)
{
   
?>
   <h1>Ejercicio 2 . Simular el lanzamiento de un dado.</h1>
   <?php

   foreach($datos as $index=>$valor){
    echo "Lanzamiento ".($index+1).": ".$valor."<br>";
   }
  
    echo "<br>Lanzando el dado ". LONG." veces <br>";
   foreach($numVeces as $index=>$valor){
    echo "<br>El ".$index." ha salido ".$valor." veces con un porcentaje de: ".porcentaje($valor,LONG)."%";
   }
}
