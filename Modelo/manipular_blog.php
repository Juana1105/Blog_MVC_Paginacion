
<?php

include_once("conexion.php");
include_once("objeto_blog.php");
include_once("paginacion.php");

class Manejo_post extends Paginacion{

  // private $base;

  public function __construct($nom_tabla, $reg_pagina){
  // public function __construct($conex){
    // $this->setConexion($conex);
    parent::__construct($nom_tabla, $reg_pagina);

  }

  public function setConexion(PDO $conectar){//no la vamos a usar
    $this->base=$conectar;
  }

  //para que nos muestre los resultados
  public function getContenidoFecha($nombre){

    $matriz=array();

    $contador=0;

    $this->pagina_actual = $pagina;
    
    $this->comienzo = ($this->pagina_actual -1) * $this->tam_pagina;

    // $resultado=$this->base->query("SELECT * FROM blog ORDER BY FECHA");
    $consulta="SELECT * FROM blog WHERE TITULO LIKE concat('%', :nombre, '%') ORDER BY FECHA DESC  LIMIT $this->empezar_desde,$this->tam_paginas";

    $resultado=$this->base->prepare($consulta);

    $resultado->execute(array(":nombre"=>$nombre));

    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){

      $post=new Post($fila['TITULO'], $fila['COMENTARIO'], $fila['IMAGEN'], $fila['FECHA'], $fila['ID']);

      $matriz[$contador]=$post;

      $contador++;
    }

    return $matriz;
  }

  //instanciamos otro nuevo objeto para poder insertar resultados__pide un nuevo objeto de la clase POST
  public function insertar(Post $postin){

    $consulta="INSERT INTO blog (TITULO, FECHA, COMENTARIO, IMAGEN) VALUES (:titulo, :fecha, :comentario, :imagen)";

    $resultado=$this->base->prepare($consulta);
    $resultado->execute(array(":titulo"=>$postin->get_titulo(), ":fecha"=>$postin->get_fecha(),":comentario"=>$postin->get_comentario(),":imagen"=>$postin->get_imagen()));

    if($resultado->rowCount()>0){
      return true;
    }else{
      return false;
    }
  }


}

?>