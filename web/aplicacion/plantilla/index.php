<?php 
include_once(dirname(__FILE__) . "/../../cabecera.php");
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
        "TEXTO"=> "Pruebas"
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

        if(isset($cadena2))
            echo $cadena2;

    
        echo "<br>el número es $var1 <br>".PHP_EOL;
        echo 'el número es $var1 <br>'.PHP_EOL;

        $real=null;
        echo $real;

        $var=125;
        $tipo=gettype($var);
         $var=(string)$var;
        $tipo=gettype($var);
        $var=settype($var,"float");
        $tipo=gettype($var);

        $var = "0";
        if($var){
            $cadena="var no vale false";
        }

        $var=1+true;
        $var=1+1.5;
       // $var=1+"1.5hola";
       // $var =1+"hola";
        //$var = 1+[];


        $aux=125;
        $var="hola ".$aux;
        $aux=true;
        $var="hola ".$aux;
        $aux=[];
       // $var="hola ".$aux;
        $aux="adios";
        $var="hola ".$aux;


        //referencia

        $var1=100;
        $var2=$var1;
        $var3=&$var1;
        $var2=150;
        $var3=200;

        unset($var3);

        define("NUME",25);
        $var1+=NUME;

        if("25"==25){
            $var="distintos";
        }

        if("25"!=25){
            $var="distintos";
        }

        $var=14>25;
        $var=14<25;
        $var=14<=>25;

        if(isset($var3))
            $var=$var3;
        elseif(isset($mivar))
            $var=$mivar;
            else
                $var=27;

        $var=$var3??$mivar??27;

        $var=0b11111;
        $var=$var>>1;
        $var=$var<<1;

        $var=0b1010 & 0b0101;
        $var=0b1010 | 0b0101;
 
        $var=7;
        if($var==1)
            $cadena="uno";
        elseif($var==2)
            $cadena="dos";
         else
            $cadena="otro";

    ?>
<?php
}
