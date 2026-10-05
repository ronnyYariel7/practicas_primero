<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador


$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 1");
cuerpo();  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo()
{
   
$numeroBinario = "0b11011";
?>
   <h1>Ejercicio 1 . Mostrar diversas Funciones Matematicas.</h1>

   <h4>Funcion Round</h4>
<?php

   $num=13.725;
   echo "Redondeo de ".$num." a la alta: ".round($num,0)."<br>".PHP_EOL;
   echo "Redondeo ".$num." a la baja : ".round($num,-1)."<br>".PHP_EOL; 
   echo "Redondeo ".$num." parte decimal 7 : ".round($num,1)."<br>".PHP_EOL; 
   echo "Redondeo ".$num." parte decimal 2 : ".round($num,2)."<br>".PHP_EOL; 
   ?>
   <h4>Funcion Floor</h4>
   <?php
   $num2=4.89;
   echo "Redondeo a la baja de ".$num." : ". floor($num)."<br>".PHP_EOL;
   echo "Redondeo a la baja de ".$num2." : ". floor($num2).PHP_EOL;
   ?>
      <h4>Funcion pow</h4>
   <?php
   $num3=2;
   $num4= 5;
   echo $num3." elevado a 4 : ". pow($num3,4)."<br>".PHP_EOL;
   echo $num4. " elevado a 5: ". pow($num4,5)."<br>".PHP_EOL;
   ?>
   <h4>Funcion sqrt</h4>
   <?php
   $num5=16;
   echo "La raíz cuadrada de ".$num5." es: ". sqrt($num5)."<br>".PHP_EOL;
   echo "La raíz cuadrada de ".$num4." es: ".sqrt($num4)."<br>".PHP_EOL;
   ?>
   <h4>De entero a hexadecimal</h4>
   <?php
   $num6=60;
   echo $num5." a Hexadecimal es: ".dechex($num5)."<br> ".PHP_EOL;
   echo $num6." a Hexadecimal es: ".dechex($num6)."<br> ".PHP_EOL;
   ?>
   <h4>Decimal a base 4</h4>
   <?php
   $decimal="0b1011101";
     $decimal=bindec($decimal);
   $numBase4=base_convert($decimal,10,4);
   echo $decimal. " a base 4".$numBase4." <br>";
   

  

 
  
}
