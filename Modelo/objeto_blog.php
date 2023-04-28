
<?php


class Post{

  //propiedades del objeto post
  private $id;
  private $titulo;
  private $fecha;
  private $comentario;
  private $imagen;


    public function __construct($tit,$com,$img="",$fec="",$Id=0){

      date_default_timezone_set('Europe/Madrid');
      $this->titulo=$tit;

        if($fec==""){
          $this->fecha=date("Y-m-d G:i:s");
        }else{
          $this->fecha=$fec;
        }
     
      $this->comentario=$com;
      $this->imagen=$img;
      $this->id=$Id;
    }
    
      //metodos de acceso getter_para acceder al valor
      public function get_id(){
        return $this->id;
      }
      public function get_titulo(){
        return $this->titulo;
      }
      public function get_fecha(){
        return $this->fecha;
      }
      public function get_comentario(){
        return $this->comentario;
      }
      public function get_imagen(){
        return $this->imagen;
      }

      //metodos de acceso setter_para fijar el valor a un atributo
      public function set_titulo($param_titulo){
        $this->titulo=$param_titulo;
      }
      public function set_fecha($param_fecha){
        $this->fecha=$param_fecha;
      }
      public function set_comentario($param_comentario){
        $this->comentario=$param_comentario;
      }
      public function set_imagen($param_imagen){
        $this->imagen=$param_imagen;
      }
}




?>