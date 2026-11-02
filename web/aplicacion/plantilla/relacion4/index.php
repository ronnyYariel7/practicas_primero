<?php 
include_once(dirname(__FILE__) . "/../../../cabecera.php");
//Importar Clases
require_once 'scritp/clases/InstrumentoBase.php';
require_once 'scritp/clases/InstrumentoViento.php';
require_once 'scritp/clases/IFabricable.php';
require_once 'scritp/clases/Flauta.php';
require_once 'scritp/clases/EstadoCivil.php';
require_once 'scritp/clases/Persona.php';
require_once 'scritp/clases/SerieFibonacci.php';
require_once 'scritp/clases/ClaseMisPropiedades.php';
//controlador
$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
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
    <h3>PRUEBA CLASE INSTRUMENTO VIENTO</h3>
    <?php 
    /** Ejercicio 1: InstrumentoBase (abstracta). Se prueba a través de una clase hija. */

    $flauta = new InstrumentoViento(); 
    $trompeta = new InstrumentoViento('metal', 5);

    // Modificamos la edad de la trompeta
    $trompeta->envejecer();

    echo "1. FLAUTA (Valores por defecto):<br>";
    echo $flauta->__toString() . "<br>";
    echo "Sonido: " . $flauta->sonido() . "<br>";
    echo "Afinación: " . $flauta->afinar() . "<br><br>";

    echo "2. TROMPETA (Material personalizado y envejecida):<br>";
    echo $trompeta->__toString() . "<br>";
    echo "Edad actual : " . $trompeta->getEdad() . " años<br>";
    echo "Sonido: " . $trompeta->sonido() . "<br>";
    echo "Afinación (método final): " . $trompeta->afinar() . "<br>";
    
    ?>
        <h4>PRUEBA DE LA CLASE FLAUTA</h4>
    <?php

    //Crear una flauta usando el constructor estático CrearDesdeArray
    $datos = ["material" => "bambú", "edad" => 3];
    $flauta1 = Flauta::CrearDesdeArray($datos);

    echo "1. Flauta Original:<br>";
    echo $flauta1->__toString() . "<br>";
    echo "Sonido: " . $flauta1->sonido() . "<br>";
    echo "Método de Fabricación: " . $flauta1->metodoFabricacion() . "<br>";
    echo "Método de Reciclado: " . $flauta1->metodoReciclado() . "<br><br>";

    // clonación
    $flautaClonada = clone $flauta1;

    echo "2. Flauta Clonada:<br>";
    echo $flautaClonada->__toString() . "<br>";
    echo "Edad de la copia: " . $flautaClonada->getEdad() . " años<br>";

    ?>
    <h4>PRUEBA DE LA CLASE PERSONA</h4>
     <?php
    
    $estadosPosibles = EstadoCivil::cases();
    $estadoAleatorio = $estadosPosibles[array_rand($estadosPosibles)];

    // constructor estático registrarPersona
    $persona = Persona::registrarPersona(
        "Alejandro",
        "12/08/1998",
        "Calle Real 45",
        "Antequera",
        $estadoAleatorio
    );

    //Mostramos la información usando el método toString()
    echo $persona->toString() . "<br>";
     ?>
    
        <h4>PRUEBA SERIE FIBONACCI</h4>
    <?php
        echo "Prueba de la serie (Iterator):<br>";
    foreach (new SerieFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }

    echo "<br><br>Prueba con el Generador :<br>";
    foreach (SerieFibonacci::fFibonacci(10) as $valor) {
        echo "$valor &nbsp;";
    }
       ?>
            <h4>PRUEBA DE CLASE MIS PROPIEDADES</h4>
       <?php 
     

    $Objeto = new ClaseMisPropiedades();
    $Objeto->propPublica = "publica";


    $Objeto->propiedad1 = 25;
    $Objeto->propiedad2 = "cadena de texto";

    echo "la propiedad 1 vale " . $Objeto->propiedad1 . "<br><br>";

    echo "RECORRIENDO CON FOREACH<br>";
    foreach ($Objeto as $clave => $valor) {
        echo "Clave: <strong>{$clave}</strong> => Valor: {$valor}<br>";
    }
        ?>
<?php
}
