<?php

include("./scripts/libreria/validacion.php");

abstract class MuebleBase {

   public const MAXIMO_MUEBLES=0; //Representa el número máximo de muebles que sepueden crear
   private int $_mueblesCreados=0; //Número de muebles (instancias) creados hasta el momento.

   //Propiedades
    public string $_nombre="";
    public string $_fabricante="FaMu:";
    public string $_pais="ESPAÑA";
    public int $_anio=2020;
    public string $_fechaIniVenta="01/01/2020";
    public string $_fechaFinVenta="31/12/2040";
    public float $_precio=30;



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
         $fechaNueva=new DateTime($fecha);

        if($fechaNueva<$fechaFabricacion)$estado=false;
        else $this->_fechaIniVenta=$fechaNueva->format("d/m/Y");
      }
     catch(error){
        $this->_fechaIniVenta=$fechaFabricacion->format("d/m/Y");
     }

        return $estado;

        }
    }





?>