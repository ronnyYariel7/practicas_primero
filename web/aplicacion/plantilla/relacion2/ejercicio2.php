<?php
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//controlador
$cadena="Está la niña en casa";


function cadenaInvertidaMayusculaMinisculas($cadena){

$longitud = strlen($cadena);
$texto_inverso = "";

for ($i=0; $i<=$longitud; $i++) {
  
    $caracter=mb_substr($cadena, -$i, 1, "UTF-8");
    
   
    $posicion_original=$longitud-$i;
    

    if ($posicion_original %2 == 0) {
        $caracter=mb_strtoupper($caracter, "UTF-8");
    } 
    else {
        $caracter=mb_strtolower($caracter, "UTF-8");
    }
    
  
    $texto_inverso.=$caracter."<br>";
    
    for ($a=0; $a<$i; $a++) {
        $texto_inverso.="&nbsp;";
    }
}

    return $texto_inverso;

}

function separarCadena($cadena) {

    $partes=mb_split('a', $cadena);
    $resultado="";
    
  
    foreach ($partes as $parte) {
        if ($resultado!=="") {
            $resultado.="<br>";
        }
        $resultado.=$parte;
    }
    
   
    return $resultado;
}

function cambiarNiña($cadena) {
    $cadena_modificada=str_replace("niña ", "niña/mujer ", $cadena);

    return $cadena_modificada;
}

$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "Relación 2",
        "ENLACE"=> "/aplicacion\plantilla/relacion2"
    ],

];

$usuario=getenv("MYSQL_USER");

//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("Ejercicio 2",$barra);
cuerpo($cadena);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

//vista
function cuerpo($cadena)
{

?>
    <h1>Ejercicio 2.Dada la cadena "Está la niña en casa",
    Mostrar cada carácter en una línea separada y con tantos espacios en blanco como me
    indica la posición del carácter mostrado. </h1>
  
<?php

    $texto="";

    for($i=0;$i<strlen($cadena);$i++){ // strlen para saber la longitud de la cadena

     $texto.=substr($cadena,$i,1)."<br>";  //la $i indica la posicion del caracter 
                                             //y el 1 que solo queremos 1 caracter
        for($a=0;$a<=$i;$a++){
            $texto.="&nbsp";
        }
       
    }

    echo $texto.PHP_EOL; // Con substr no se puede agregar el UF8 y
                            // no nos mpostrara algunos caracteres

    ?>
    <h3>mb_substr</h3>

    <?php
  
    $texto2=" ";

    for($i=0;$i<strlen($cadena);$i++){ 
     $texto2.=mb_substr($cadena,$i,1,"UTF-8")."<br>";  //Asignamos Codificación
        for($a=0;$a<=$i;$a++){
            $texto2.="&nbsp";
        }
       
    }

    echo $texto2.PHP_EOL;

    ?>
     <h3>Cadena Invertida ,Mayuscula,Minuscula</h3>

     <?php

     $texto_inverso=cadenaInvertidaMayusculaMinisculas($cadena);
     echo $texto_inverso.PHP_EOL;

      ?>
     <h3>Separa la cadena en partes usando el carácter a</h3>

     <?php

    $partes=separarCadena($cadena);
    echo $partes.PHP_EOL;

     ?>
     <h3>Cambiar niña por niña/Mujer</h3>

     <?php

    echo cambiarNiña($cadena).PHP_EOL;
}
