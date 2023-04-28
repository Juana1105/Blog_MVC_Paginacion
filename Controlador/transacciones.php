
<?php

include_once("../Modelo/objeto_blog.php");

include_once("../Modelo/manipular_blog.php");

include_once("../Modelo/conexion.php");

include_once("../Modelo/paginacion.php");


if(isset($_POST['subir'])){

  date_default_timezone_set('Europe/Madrid');

  if ($_FILES["imagen"]["error"] != 0) {
  
    switch ($_FILES["imagen"]["error"]) { //antes de evaluar los casos, HAY QUE EVALUAR LA CONDICION
  
      case 1: //Error exceso tamaño del archivo respecto del maximo permitido en el PHP(2MB)
        echo "El tamaño del archivo excede el límite máximo permitido por el SERVIDOR de 2MB.";
        break;
  
      case 2: //Error exceso tamaño del archivo en el formulario(2MB)
        echo "El tamaño del archivo excede el límite máximo del FORMULARIO de 2MB.";
        break;
  
      case 3: //Archivo subido parcialmente
        echo "Se ha interrumpido la subida del archivo. Inténtelo de nuevo.";
        break;
  
      case 4: //No se ha subido ningun fichero
        echo "No se ha subido ningún archivo.";
        break;
  
      case 6: //No hay carpeta temporal
        echo "Ha ocurrido un error interno. Inténtelo más tarde.";
        break;
  
      case 7: //No se ha podido escribir el fichero en el disco
        echo "Ha ocurrido un error interno. Inténtelo más tarde.";
        break;
  
      case 8: //La extension no es válida
        echo "Este tipo de extensión no está permitida.";
        break;
    }
  
  
  
  //-------------AQUI CONTINUA EL CODIGO SI NO HAY ERROR Y SUBIMOS UNA FOTO-------------
  } else {
  
    if (is_uploaded_file($_FILES["imagen"]["tmp_name"]) && ($_FILES["imagen"]["error"] == UPLOAD_ERR_OK)) {
  
      $tam_imagen = $_FILES["imagen"]["size"];
  
      $tipo = $_FILES["imagen"]["type"];
      
      $imagen=$_FILES["imagen"]["name"];
  
      // $nombre = date("Ymd Gis") . "_" . $imagen;
  
      if ($tam_imagen < 2000000) {
  
        if ($tipo == "image/jpeg" || $tipo == "image/jpg" || $tipo == "image/png" || $tipo == "image/gif") {
  
          $carpeta_destino = $_SERVER["DOCUMENT_ROOT"] . "/0_Subidas/images/";
          move_uploaded_file($_FILES["imagen"]["tmp_name"], $carpeta_destino . $imagen);


        } else {
          echo "<p>Solo se permite subir imagenes con los formatos jpeg, jpg, png y gif";
        }
      } else {
        echo "<p>El tamaño de la imagen es mayor que 2MB</p>";
      }
    }
  }
  
  
  //------------AQUI CONTINUA EL CODIGO SI NO HAY ERROR Y NO HEMOS SUBIDO NINGUNA FOTO----------
  
  // $conectar=Conectar::conexion();
  
  $maneja_objetos= new Manejo_post("blog", 3);

  $titulo=$_POST["titulo"];//titulo el name del formulario
  $comentario=$_POST["comentario"];
  $imagen=$_FILES["imagen"]["name"];

  $post=new Post($titulo, $comentario, $imagen);

  $maneja_objetos->insertar($post);



  header("Location:../Vista/formulario_blog.php?subir=ok");
  
}
  


//-------------------MOSTRAR CONTENIDO DEL ARCHIVO RECUPERAR------------------------

if(isset($_GET["enviar"])){

  $titulo=$_GET["buscar"];

  // $conectar=Conectar::conexion();
  
  $maneja_otro= new Manejo_post("blog", 3);
  
  $registros=$maneja_otro->getContenidoFecha($titulo);

  require("../Vista/recuperar.php");

}



//------------------------PAGINACION---------------------------


  // $paginacion=new Paginacion("blog",3);
              
  // $registros=$paginacion->mostrar_resultados("blog",3);
 
  // $array_links=$paginacion->mostrar_links();



  
?>