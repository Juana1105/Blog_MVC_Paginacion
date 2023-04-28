

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
body{
  background-color: lightskyblue;
  box-sizing: border-box;
  
}
#contenedor{
  width: 50%;
  display: flex;
  flex-direction: column;
  align-content: center;
  align-items: center;
  background-color: lightseagreen;
  border: 2px solid navy;
  border-radius: 15px;
  margin: 0 auto;
  margin-top: 30px;
  margin-bottom: 25px;
}
h1{
  text-align: center;
  color: navy;
  font-size: 4rem;
  margin: 4rem 6rem;
}
h3{
  text-align: center;
  font-weight: bold;
  font-size: 2rem;
  color: black;
  margin-bottom: -1px;
  padding: 15px
}
h4{
  text-align: center;
  color: white;
  font-weight: normal;
}
#comentario{
  width: 70%;
  background-color: lightskyblue;
  border: 1px solid gray;
  border-radius: 5px;
  padding: 10px;
  text-align: center;
  margin-bottom: 2rem;
}
img{
  margin-bottom:2rem;
  width: 300px;
  height: auto;
  border-radius: 7px;
  border: 2px dotted blue;
}

</style>

</head>
<body>
<h1>BLOG DE COSAS CURIOSAS</h1>



<?php


foreach($registros as $fila){

  ?>
  <div id="contenedor">

  <h3><?php echo $fila->get_titulo(); ?></h3>
  <h4><?php echo $fila->get_fecha(); ?></h4>
  <div id="comentario"><?php echo $fila->get_comentario(); ?></div>

  <img src="/../0_Subidas/images/<?php echo $fila->get_imagen();?>" alt="PEO">


</div>
<?php

}



    





?>


</body>
</html>

