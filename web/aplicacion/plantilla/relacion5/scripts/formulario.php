<?php 
include_once(dirname(__FILE__) . "/../../../../cabecera.php");
//Importar Clases
include("./librerias/validacion.php");
//controlador

$barra=[
    [
    "TEXTO"=> "inicio",
    "ENLACE"=>"/index.php",
    ],
    [
    "TEXTO"=> "Formulario",
    "ENLACE" => "formulario.php",
    ]
   

];

// array donde tendremos los datos del formulario
$datos=[
   "nombre" => $_POST["nombre"]??"",
    "contraseña" => $_POST["contraseña"]??"",
    "fechaNacimiento" => $_POST["fechaNacimiento"]??"",
    "dia" => $_POST["dia"]??"",
    "mes" => $_POST["mes"]??"",
    "año" => $_POST["año"]??"",
    "horaLevantarse" => $_POST["horaLevantarse"]??"",
    "estado" => $_POST["estado"]??"",
    "estudios" => $_POST["estudios"]??[],
    "hermanos" => $_POST["hermanos"]?? "",
    "sueldo" => $_POST["sueldo"] ?? ""
];

//array donde estara los errores
$errores=[];

//Empezamos a recoger Los Datos del Formulario
if(isset($_POST["enviar"]))
    {
        //vamos a verificar los datos

       
        $nombre="";
        $contraseña="";
        $fechaNacimiento="";
        try{
        $dia = $_POST["dia"];
        $mes = $_POST["mes"];
        $anio = $_POST["año"];
        $fechaCarnet=new DateTime("$dia-$mes-$anio");
        $fechaCarnet=$fechaCarnet->format("d/m/Y");
        }
        catch(Exception $e){
            $fechaCarnet = "";
        }
        $horaLevantarse="";
        $estado="";
        $hermanos="";
        $estudios=[];
        $sueldo="";

        if(isset($_POST["nombre"])){
            $nombre=$_POST["nombre"];
            $nombre = mb_strtoupper(mb_trim($nombre));
        }
        // si nombre está vacío lanzara error
        if($nombre==""){
            $errores["nombre"][]="Debe introducir un nombre";
            
        }
        else if(mb_substr($nombre,0,1)==="H"){
            $errores["nombre"][]="El nombre no puede empezar por H";
        }

        //Contraseña
        if(isset($_POST["contraseña"])){
            $contraseña=$_POST["contraseña"];
            //Expresion regular para la contraseña
            if(!(preg_match('/[A-Z]{1,}/',$contraseña)))
                {
                    $errores["contraseña"][]="La contraseña debe contener almenos una letra Mayúscula.";
                }
            if(!(preg_match('/[a-z]{1,}/',$contraseña)))
                {
                     $errores["contraseña"][]="La contraseña debe contener almenos una letra Minuscula.";
                }
            if(!(preg_match('/[_\-;<>@]/',$contraseña)))
                {
                    $errores["contraseña"][]="La contraseña debe contener almenos uno de estos caracteres (\$_-;<>@)";
                }

        }
            // Fecha de nacimiento 
        if(isset($_POST["fechaNacimiento"])){
            $fechaNacimiento=$_POST["fechaNacimiento"];
            if(!(validaFecha($fechaNacimiento,""))){
                $errores["fechaNacimiento"][]="Debe introducir una fecha Valida";
            }

        }

        // FechaCarnet
        if(!validaFecha($fechaCarnet,""))
            $errores["fechaCarnet"][]="Debe introducir una fecha Valida";

        // Comprovamos que la fechaCarnet no sea anterior a la fechaNacimiento
        $intervalo=new DateInterval("P18Y");
        $fechaCarnetAux=DateTime::createFromFormat('d/m/Y', $fechaCarnet);
        $fechaCarnetAux->sub($intervalo);
        $fechaNacimientoAux=DateTime::createFromFormat('d/m/Y', $fechaNacimiento);

        if($fechaNacimientoAux>$fechaCarnetAux)
             $errores["fechaCarnet"][]="Debe Tener 18 años para conseguir el Carnet de Conducir";
        
        //HoraLevantarse
        $horaLevantarse=$_POST["horaLevantarse"];
        if(!validaHora($horaLevantarse,""))
            $errores["horaLevantarse"][]="Debe Ingresar una Hora Valida";

        //Estado 
        $estado=$_POST["estado"];
        if($estado=="")
            $errores["estado"][]="Debe Selecionar una opción del Campo Estado";

        //Estudios
        $estudios=$_POST["estudios"];
        if(count($estudios)==0)
            $errores["estudios"][]="Debe selecionar almenos una Opción en el Campo Estudios";
        if (in_array("0", $estudios) && count($estudios) > 1) {
        $errores["estudios"][] = "Si selecciona 'Sin estudios', no puede marcar otras opciones.";
    }

        //Hermano
        $hermanos=$_POST["hermanos"];
        if(intval($hermanos)<0 || intval($hermanos)>20)
            $errores["hermanos"][]="El campo hermanos el Valor debe estar entre 0 y 20";

        //Sueldo 
        $sueldo=$_POST["sueldo"];
        if(floatval($sueldo)<1000 || floatval($sueldo)>150000)
             $errores["sueldo"][]="El campo sueldo el Valor debe estar entre 1000 y 150000";

    }



//dibuja la plantilla de la vista
inicioCabecera("APLICACION PRIMER TRIMESTRE");
cabecera();
finCabecera();
inicioCuerpo("2DAW APLICACION",$barra);
cuerpo($datos,$errores);  //llamo a la vista
finCuerpo();
// **********************************************************

//vista
function cabecera() 
{}

function formulario(array $datos, array $errores){

    if ($errores) { //mostramos los errores
        echo "<div class='error'>";
        foreach ($errores as $clave => $valor) {
            foreach ($valor as $error)
                echo "$clave => $error<br>" . PHP_EOL;
        }
        echo "</div><br><br>";
    }



    ?>
        <form action="formulario.php" method="post" class="mi-formulario">
            <!--Nombre -->
            <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre"
                value="<?=$datos["nombre"]?>" size="21" maxlength="25">
            <br>
            <?php
             if (isset($errores["nombre"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["nombre"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
            <!--Contraseña-->
            <label for="contraseña">Contraseña:</label>
                <input type="password" name="contraseña" id="contraseña"
                value="<?=$datos["contraseña"]?>" size="21" maxlength="15" minlength="8">
            <br>
            <?php
             if (isset($errores["contraseña"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["contraseña"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
            <!--Fecha Nacimiento -->
            <label for="fechaNacimiento">Fecha de nacimiento:</label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento" 
                    value="<?=$datos["fechaNacimiento"] ?>" placeholder="11/05/2002">
        <br>
            <?php
             if (isset($errores["fechaNacimiento"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["fechaNacimiento"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        
    <!--Fecha Carnet -->
        <fieldset>
            <legend>Fecha de carnet:</legend>
            <label for="dia">Día:</label>
            <input type="text" name="dia" id="dia" size="2" value="<?=$datos["dia"]?>">
            
            <label for="mes">Mes:</label>
            <input type="text" name="mes" id="mes" size="2" value="<?=$datos["mes"]?>">
            
            <label for="año">Año:</label>
            <input type="text" name="año" id="año" size="4" value="<?=$datos["año"]?>">
        </fieldset>
        <br>

             <?php
             if (isset($errores["fechaCarnet"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["fechaCarnet"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        
          <!--Hora de Levantarse -->
        <label for="horaLevantarse">HoraLevantarse: </label>
        <input type="text" name="horaLevantarse" id="horaLevantarse" value="<?=$datos["horaLevantarse"]?>" size="5" maxlength="15">
        <br>
                <?php
             if (isset($errores["horaLevantarse"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["horaLevantarse"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <!--Estado -->
        <fieldset>
            <legend>Estado</legend>
            
            <label>
                <input type="radio" name="estado" value="1"> Estudiante
            </label><br>

            <label>
                <input type="radio" name="estado" value="2"> En paro
            </label><br>

            <label>
                <input type="radio" name="estado" value="3"> Trabajando
            </label><br>

            <label>
                <input type="radio" name="estado" value="4"> Jubilado
            </label><br>

        </fieldset>

              <?php
             if (isset($errores["estado"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["estado"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <!--Estudios-->
        <fieldset>
        <legend>Estudios</legend>
        <label>
            <input type="checkbox" name="estudios[]" value="0">Sin estudios
        </label><br>

        <label>
            <input type="checkbox" name="estudios[]" value="1">Primaria
        </label><br>

        <label>
            <input type="checkbox" name="estudios[]" value="2">Secundaria
        </label><br>

        <label>
            <input type="checkbox" name="estudios[]" value="3">Bachillerato
        </label><br>

        <label>
            <input type="checkbox" name="estudios[]" value="4">Ciclo formativo
        </label><br>

        <label>
            <input type="checkbox" name="estudios[]" value="5">Universitarios
        </label><br>
    </fieldset>
         <?php
             if (isset($errores["estudios"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["estudios"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>

        <!--Hermanos -->
        <label for="hermanos">Hermanos: </label>
        <input type="number" name="hermanos" id="hermanos" value="<?=$datos["hermanos"]?>" size="5" maxlength="2">
        <br>
         <?php
             if (isset($errores["hermanos"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["hermanos"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <!--Sueldo -->
        <label for="sueldo">Sueldo (€): </label>
        <input type="number" name="sueldo" id="sueldo" value="<?=$datos["sueldo"]?>" size="8" maxlength="8">
        <br>
        <?php
             if (isset($errores["sueldo"]))
                {
                    echo "<div class='error'>";
                    foreach ($errores["sueldo"] as $error)
                        {
                            echo "$error<br>".PHP_EOL;
                        }
                    echo "</div>";
                }?>
        <!-- Botón-->
        <input type="submit" name="enviar" value="Enviar">
        </form>

    <?php
}

//vista
function cuerpo($datos,$errores)
{
?>
    <?php
    if (isset($_POST["enviar"]) && empty($errores)) {
    resumen($datos);
} else {
    formulario($datos, $errores);
}
    
}

function resumen(array $datos) {

// Estado 
    $textoEstado = "";
    switch ($datos["estado"]) {
        case "1": $textoEstado = "Estudiante"; break;
        case "2": $textoEstado = "En paro"; break;
        case "3": $textoEstado = "Trabajando"; break;
        case "4": $textoEstado = "Jubilado"; break;
    }

    // Estudios 
    $nombresEstudios = [];
    foreach ($datos["estudios"] as $codigo) {
        switch ($codigo) {
            case "0": $nombresEstudios[] = "Sin estudios"; break;
            case "1": $nombresEstudios[] = "Primaria"; break;
            case "2": $nombresEstudios[] = "Secundaria"; break;
            case "3": $nombresEstudios[] = "Bachillerato"; break;
            case "4": $nombresEstudios[] = "Ciclo formativo"; break;
            case "5": $nombresEstudios[] = "Universitarios"; break;
        }
    }
    $textoEstudios = implode(", ", $nombresEstudios);

echo "<h2>Datos enviados correctamente</h2>";
    echo "<ul>";
    echo "<li><strong>Nombre:</strong> " . $datos["nombre"] . "</li>";
    echo "<li><strong>Correo / Contraseña:</strong> " . $datos["contraseña"] . "</li>";
    echo "<li><strong>Fecha de Nacimiento:</strong> " . $datos["fechaNacimiento"] . "</li>";
    echo "<li><strong>Fecha del Carné:</strong> " . $datos["dia"] . "/" . $datos["mes"] . "/" . $datos["año"] . "</li>";
    echo "<li><strong>Hora de Levantarse:</strong> " . $datos["horaLevantarse"] . "</li>";
    echo "<li><strong>Estado:</strong> " . $textoEstado . "</li>";
    echo "<li><strong>Estudios:</strong> " . $textoEstudios . "</li>";
    echo "<li><strong>Hermanos:</strong> " . $datos["hermanos"] . "</li>";
    echo "<li><strong>Sueldo:</strong> " . $datos["sueldo"] . " €</li>";
    echo "</ul>";

}