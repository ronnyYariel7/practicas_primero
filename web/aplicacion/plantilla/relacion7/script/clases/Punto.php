<?php


class Punto{

    // CONSTANTES 
   public  const COLORES = 
   ["black"=>["nombre"=>"negro","rgb"=>[0,0,0]],
    "red"=>["nombre"=>"rojo","rgb"=>[255,0,0]],
    "green"=>["nombre"=>"verde","rgb"=>[0, 255, 0]],
    "blue"=>["nombre"=>"azul","rgb"=>[0,0,255]] ];

   public const GROSORES =[
    1=>"fino",
    2=>"medio",
    3=>"grueso"
   ];

   //PROPIEDADES    
    private int $_x;
    private int $_y;
    private string $_color;
    private int $_grosor;

    //CONSTRUCTOR
    public function __construct(int $x,int $y,string $color,int $grosor)
    {
        try{
            if(!($this->setX($x)))throw new Error("Cordenanda X:entre 0 y 20000");
            if(!($this->setY($y)))throw new Error("Cordenanda Y:entre 0 y 20000");
            if(!($this->setColor($color)))throw new Error("El Color no esta Disponible");
            if(!($this->setGrosor($grosor)))throw new Error("No se ha encontrado el grosor Indicado");

        }
        catch(Exception $e){
            echo $e->getMessage();
        }
        
        
    }


    //Cambia propiedadad $_x entero, entre 0 y 20000
    public function setX(int $x){
        if($x>0 || $x<20000)return false;
        $this->_x=$x;
        return true;
    }

     //Cambia propiedadad $_y entero, entre 0 y 20000
    public function setY(int $y){
        if($y>0 || $y<20000)return false;
        $this->_y=$y;
        return true;
    }

    //Cambia la propiedada $_color , verificando que exita en COLORES
    public function setColor(string $color){
        if(!array_key_exists($color,self::COLORES))return false;
        $this->_color=$color;
        return true;
            
    }

    //Cambia la propiedad $_grosor , verificando que exista en GROSORES
    public function setGrosor(int $grosor){
        if(!(array_key_exists($grosor,self::GROSORES)))return false;
        $this->_grosor=$grosor;
        return true;
    }
}



