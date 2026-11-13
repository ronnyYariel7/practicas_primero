<?php

include("./scripts/libreria/validacion.php");

abstract class MuebleBase {

   public const MAXIMO_MUEBLES=5; //Representa el número máximo de muebles que sepueden crear
   private static int $_mueblesCreados=0; //Número de muebles (instancias) creados hasta el momento.
   


   //Propiedades
    private string $_nombre="";
    private string $_fabricante="FaMu:";
    private string $_pais="ESPAÑA";
    private int $_anio=2020;
    private string $_fechaIniVenta="01/01/2020";
    private string $_fechaFinVenta="31/12/2040";
    private float $_precio=30;
    private Caracteristicas $_caracteristicas;

    //Constructor
    public function __construct(string $nombre,string $fabricante,string $pais,int $anio,
        string $fechaIniVenta,string $fechaFinVenta,float $precio ,Caracteristicas $caracteristicas)
    {
        try{
            if(!($this->setNombre($nombre))) throw new Error("El Campo Nombre es Obligatorio");
            $this->setFabircante($fabricante);
            $this->setPais($pais);
            $this->setAnio($anio);
            $this->setFechaIniVenta($fechaIniVenta);
            $this->setFechaFinVenta($fechaFinVenta);
            $this->setPrecio($precio);
            $this->_caracteristicas=$caracteristicas;
            $this->_mueblesCreados++;
        }
        catch(Exception $e){
            echo "Error:". $e->getMessage();
        }
       
    }



    //Cambia Nombre (cadena de máximo 40, no puede estar vacía, a mayúscula,obligatorio)
    public function setNombre(string $nombre):bool{
        $estado=true;
        $nombre=mb_trim(mb_strtoupper($nombre));

        if(mb_strlen($nombre)>40 || $nombre==="")$estado=false;

        if($estado)$this->_nombre=$nombre;

        return $estado;
        
    }

    // (cadena de máximo 30, por defecto ‘FaMu:’, siempre se añade al principio FaMu: si no lo tiene ya - se recorta a 30 caracteres-)
    public function setFabircante(string $fabricante):bool{
        $estado=true;
        $fabricante=mb_trim($fabricante);


        //Lo puse a 25 por que la propiedad fabricante ya tiene 5 carcateres "FaMu:"
        if(mb_strlen($fabricante)>25)$estado=false;

        if($estado)$this->_fabricante.=$fabricante;

        return $estado;

    }

    //Cambia valor Pais (cadena, máximo 20 caracteres, por defecto ‘ESPAÑA’)
    public function setPais(string $pais):bool{

     $estado=true;

        if(mb_strlen($pais)>20)$estado=false;
        else  $this->_pais=mb_trim(mb_strtoupper($pais));
        
        return $estado;
        
    } 

      //Cambia valor Anio  (entero, año de inicio de fabricación, valor entre 2020 y el año actual, por defecto 2020)
    public function setAnio(int $anio):bool {
        $estado=true;
         $hoy=new DateTime();
         $anioActual=intval(date('Y',strtotime($hoy->format('d-m-Y'))));


         if($anio<2020 || $anio>$anioActual)$estado=false;
         else $this->_anio=$anio;
   
         return $estado;
    }

    /**
     * Cambia FechaIniVenta(cadena, fecha en la que
     *se empieza a vender el mueble, no puede ser anterior al uno de enero del Anio de inicio
     *de fabricación, en caso de fallo se asigna “01/01/anio”, por defecto ‘01/01/2020’ aunque
     *se usará lo anterior)
     *
     * @param string $fecha
     * @return boolean
     */
    public function setFechaIniVenta(string $fecha):bool{
      
        $estado=true;
        $fechaFabricacion=new DateTime('01/01/'.$this->_anio);
      try{
         $fechaNueva=new DateTime(str_replace("/","-",$fecha));

        if($fechaNueva<$fechaFabricacion)$estado=false;
        else $this->_fechaIniVenta=$fechaNueva->format("d/m/Y");
      }
     catch(Exception $e){
        $this->_fechaIniVenta=$fechaFabricacion->format("d/m/Y");
     }

        return $estado;

     }

    //Cambiar FechaFinVenta cadena-fecha, fecha en la que dejará de venderse,
    //no puede ser anterior a la FechaIniVenta, por defecto 31/12/2040’) 
    public function setFechaFinVenta(string $fechaFin):bool{
            $estado=true;
            $fechaFin=mb_trim($fechaFin);
            $fechaIn=new DateTime($this->_fechaIniVenta);
            $fechaFinal=new DateTime(str_replace("/","-",$fechaFin));

            if($fechaIn>$fechaFinal){
                $estado=false;
                $this->_fechaIniVenta="31/12/2040";
            }
            else   $this->_fechaIniVenta=$fechaFin;

            return $estado;
            
    }

    //Cambiar Precio (real, por defecto 30, no puede ser menor de 30).

    public function setPrecio(float $precio):bool {
        $estado=true;

        if($precio<30)$estado=false;
        else $this->_precio=$precio;

        return $estado;
    }

    /**
     * Será redefinido en las clases hijas y devolverá
     *un array con el nombre de las propiedades adicionales a la clase base. 
     *
     * @return array
     */
    public function damePropiedadesAdicionales():array
        {
            return [];
        }

        /**
         *  devuelve true si se pueden crear más instancias de la
         * clase y false en caso contrario. Además, devuelve en el parámetro Número el número de
         *muebles que aún se pueden crear de la clase.
         *
         * @param integer $numero
         * @return boolean
         */
    public static function puedeCrear(int &$numero):bool
    {
        $puedeCrear=self::MAXIMO_MUEBLES-self::$_mueblesCreados;

        if($puedeCrear==0){
            $numero=$puedeCrear;
            return false;
        }

        $numero=$puedeCrear;
        return true;

    }

    /**
     * Método toString
     *
     * @return string
     */
    public function __toString()
    {
       return "MUEBLE de clase ".
                 $this::class ."con nombre {$this->_nombre}, fabricante {$this->_fabricante}, fabricado en {$this->_pais} 
                 a partir del año {$this->_anio}, vendido desde {$this->_fechaIniVenta} hasta 
                 {$this->_fechaFinVenta}, precio {$this->_precio}.";
    }


    /**
     * Método para agregar Caracteristicas
     */
    public function anadirCaracteristica(...$parametros){

        $carac=[];
        for($i=0;$i<count($parametros);$i+=2){
           $clave=$parametros[$i];
           $valor=$parametros[$i+1];

           $carac[$clave]=$valor; 
        }

        $this->_caracteristicas->agregarCaracteriticas($carac);
    }

    }

?>