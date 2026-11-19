<?php
/**
 * Este archivo  funciones la cree por que las hiba a necesitar en el index y en
 * imagen.php.sobretodo para reutilizar codigo y no tener que copiar y pegar las
 * mismas funciones en dos archivos distintos.
 */


/**
 * Formulario para las Propiedades de la Clase Punto
 *
 * @return void
 */
function cordenandasFormulario(){
    ?>
    <form action="" method="post" class="mi-formulario">
        <label for="">Cordenada X:</label>
        <input type="number" id="cordenaX" name="cordenadaX">
        <br>
        <label for="">Cordenada Y: </label>
        <input type="number" id="cordenadaY" name="cordenadaY">
        <br>
        <select name="selectColores" id="">
        <?php agregarSelect(); ?>
        </select><br>
        <?php agregarRadioButtons();?><br>
        <button type="submit" name="crearPunto" value="bt1">Crear</button>
    </form>
    <?php
}

/**
 * 
 * Para agregar las opciones de colores
 *
 * @return void
 */
function agregarSelect(){
$punto=new Punto(20,30,"black",1);
    foreach(array_keys($punto->getColores()) as $key){
    ?>
        <option value="<?= $key ?>"><?= $key ?></option>
    <?php
    }

}

/**
 * apara agregar el grosor de los puntos
 *
 * @return void
 */
function agregarRadioButtons(){
   $punto=new Punto(20,30,"black",1);
     foreach($punto->getGrosores() as $key=>$valor){
    ?>
        <label for="<?= $key ?>"><?= $valor ?></label>
        <input type="radio" name="grosor" id="<?= $key ?>" value="<?= $key ?>">
    <?php
    }
}

/**
 * Muestra Los puntos en Un textArea
 *
 * @param array $datos
 * @return void
 */
function visualizarPuntos(array $datos){
    echo '<textarea name="textAreaPuntos" id="" class="mi-textarea " readonly>';
    $cont=1;
    foreach($datos as $obj){
      echo "Punto {$cont}: ".$obj. PHP_EOL;
     $cont++;
     }
   echo '</textarea>';
}

/**
 * Función para saber que navegador esta usando el Usuario
 *
 * @return string
 */
function navegadorUsado():string{
    $navegador=""; 
    $cadenaNavegador=mb_strtolower($_SERVER['HTTP_USER_AGENT']);
    
     if(preg_match("/firefox/",$cadenaNavegador)){$navegador="Firefox";}
     else if (preg_match("/edg/",$cadenaNavegador)){$navegador="Edge";}
     else if(preg_match("/chrome/",$cadenaNavegador)){$navegador="Chrome";}

     if($navegador=="")$navegador="Otro";
     return $navegador;
}

/**
 * Función que nos devuelve la Ip del Usuario 
 *
 * @return string
 */
function ipUsuario():string{
    $ip=preg_replace("/[.]/","_",$_SERVER['REMOTE_ADDR']);

    return $ip;
}

/**
 * Creamos las Imagenes de Cada Punto
 *
 * @param array $puntos
 * @return void
 */
function crearImagen(array $puntos){
   
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

    $rutaArchivo="imagenes/puntos/"."imagen_".ipUsuario()."_".navegadorUsado().".jpg";
  
    //creamos la imagen 
    imagejpeg($img,$rutaArchivo,90);

    return $rutaArchivo;
 
}

/**
 * Crea el Lienzo para la Imagen 
 *
 */
function crearLienzo(){
     $ancho=400;$alto=300;
    $img = imagecreatetruecolor($ancho,$alto);

     //color blaco Lienzo
    $blanco=imagecolorallocate($img,255,255,255);
    //color borde
    $borde=imagecolorallocate($img,0,0,0);
    //Creamos un rectangulo en nuestro lienzo
    imagefilledrectangle($img,0,0,$ancho-1,$alto-1,$blanco);
    //Crea un rectangulo sin relleno sobre el lienzo
    imagerectangle($img,0,0,$ancho-1,$alto-1,$borde);

    return $img;
}


/**
 * agrega la Imagen mediante la etiqueta img
 * ádemas contiene un formulario con  el botón de 
 * descargar la imagen
 *
 * @param array $puntos
 * @return void
 */
function agregarImagen(array $puntos){
    $ruta=crearImagen($puntos);
    ?>
        <div class="mi-formulario">
             <img src="<?= $ruta ?>" alt="lienzo"><br>
             <form action="imagen.php" method="get">
                 <button type="submit" name="btDescargar" >Descargar</button>
             </form>
            
        </div>
       
    <?php
    
}

/**
 * Nombre de archivo: $nombre_dirip_navegador.$formato
 *
 * @param string $nombre
 * @param string $formato
 * @return string
 */
function nombreFichero(string $nombre,string $formato):string
{
    return $nombre."_".ipUsuario()."_".navegadorUsado().".".$formato;
}

function escribirFichero(array $datos){

    $ruta="ficheros/";

    if(!file_exists($ruta))mkdir($ruta);

    $ruta.=nombreFichero("puntos","dat");

    $fichero=fopen($ruta,"w");
    if(!$fichero)return false;

    $linea="";
    foreach($datos as $obj){
       $linea=trim($obj->__toString())."\n";

       fputs($fichero,$linea); //escribimos en el Fichero
    }

    //Cerrar el fichero
    fclose($fichero);
    return true;

}

/**
 * lee los archivos se le pasa un array por 
 * referencias para obtener el contenido del fichero
 */

function leerFichero(array &$datos,string $borrar=""){

      $ruta="ficheros/";

    if(!file_exists($ruta))mkdir($ruta);

    $ruta.=nombreFichero("puntos","dat");

    $fichero=fopen($ruta,"r");
    if(!$fichero)return false;

    //borrar el contenido del array
   $datos=[];
    while($linea=fgets($fichero))
        {
            $linea=mb_trim(preg_replace("/[\n]/","",$linea));
            $arrayDatos=explode(";",$linea);

            //comprobamos que linea sea diferende de cadena vacia
            if($linea!=""){

            //recogemos el array grosores para pasar el parametro como entero al crear el Punto
            $arrayGrosor=new Punto(2,3,"black",1)->getGrosores(); 
            $punto=new Punto(intval($arrayDatos[0]),intval($arrayDatos[1]),
                                $arrayDatos[2],array_search($arrayDatos[3],$arrayGrosor));
            
            //Si borrar es igual a punto quiere decir que el usuario quiere borrar un punto
            //y no se agregara al array , si son distintos se agrega a datos[]
            if($borrar!==$punto->__toString()){
                $datos[]=$punto;
            }
         
            }
        }
    
        //cerramos el fichero
        fclose($fichero);
        return true;

}

/**
 * Función que contiene el formulario
 * para borrar Puntos
 *
 * @param array $datos
 * @return void
 */
function borrarPunto(array $datos){
    ?><form action="" method="post" class="mi-formulario">
        <select name="borrarPunto" id="">
        <?php $cont=1;
            foreach($datos as $punto){
        ?>
            <option value="<?=$punto->__toString()?>">Punto<?=$cont?>:<?= $punto->__toString() ?></option>
         <?php $cont++; } ?>
        </select>
        <button type="submit" name="btEliminar">Borrar</button>
    </form>
    <?php
}