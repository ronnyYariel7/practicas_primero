<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador

//Primera forma
$array=[];
$array[1]="cadena";
$array[16]=true;
$array[54]=104;
$array[]=34;

$array["uno"]="cadena";
$array["dos"]=true;
$array["tres"]=1.345;
$array["ultima"]=[1,34,"nueva"];

//Segunda Forma
$array2=array(1=>"cadena",16=>true,54=>104,34,"uno"=>"cadena",
                "dos"=>true,"tres"=>1.345,"ultima"=>array(1,34,"nueva"));

//Tercera Forma
$array3=[1=>"cadena",16=>true,54=>104,34,"uno"=>"cadena",
                "dos"=>true,"tres"=>1.345,"ultima"=>[1,34,"nueva"]];

// Fubcion para leer los tres arrays

function mostrarArrayVista(array $array){

    $cadena="";
  foreach($array as $ind=>$elem){
        if(gettype($elem)=="array"){
            foreach($elem as $valor){
                 $cadena.="Valor en ".$ind.": ".(($valor===true)?"true":$valor)."<br>";
              
            }
        }else
              $cadena.="Valor en ".$ind.": ".(($elem===true)?"true":$elem)."<br>";
            
    }

    return $cadena;

}



$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 3");
cuerpo($array,$array2,$array3);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($array,$array2,$array3)
{
   
?>
   <h1>Ejercicio 3 . Rellenar posiciones de arrays.</h1>
   <?php

    echo "Primera Forma <br>" ;
    echo mostrarArrayVista($array);
    echo "<br> Segunda Forma <br>" ;
    echo mostrarArrayVista($array2);
    echo "<br> Tercera Forma <br>" ;
    echo mostrarArrayVista($array3);

}
