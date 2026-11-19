<?php 
include_once "script/clases/Punto.php";
include("script/funciones.php");
if(isset($_GET["btDescargar"]))
{
    $puntos=[];
    leerFichero($puntos);

    $img=crearLienzo();

     foreach($puntos as $punto){
        $arrayRgb=$punto->getColores()[$punto->getColor()]["rgb"];
        $r=$arrayRgb[0];$g=$arrayRgb[1];$b=$arrayRgb[2];
        //los puntos se miraban muy pequeños que el grososr que establecimos 
        // en la clase Punto por eso los multiplique x3;
        $grosor=array_search($punto->getGrosor(),$punto->getGrosores())*3; 
         //color punto
         $colorPunto=imagecolorallocate($img,$r,$g,$b);
         //Pintar el Punto en nuestro lienzo
         imagefilledellipse($img,$punto->getX(),$punto->getY(),$grosor,$grosor,$colorPunto);

    }

    $nombreSalida="puntos.jpg";
    header('Content-Type:'.'image/jpeg');
    header('Content-Disposition:attachment;filename="'.$nombreSalida.'"');

    imagejpeg($img,null,90);
 
}
