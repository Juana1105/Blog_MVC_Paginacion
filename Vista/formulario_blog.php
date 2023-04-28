<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>


  <script>

    


  </script>

<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body{
  background-color: rgb(165,42,42, 0.288);
}
h1{
  text-align: center;
  margin: 20px;
  color: rgb(150, 10, 10);
  margin-top: 2rem;
  margin-bottom: 2rem;
}
form{
  width: 32%;
  margin: 0 auto;
  text-align: center;
  border: 2px solid rgb(150, 10, 10);
  padding: 10px;
  border-radius: 12px;
  font-size: 18px;
}
p{
  display: flex;
  justify-content: space-between;
  padding: 7px;
  font-weight: bold;
}
input[type="submit"]{
  width: 60%;
  margin: 0 auto;
  text-align: center;
  margin-top: 20px;
}
#form2{
  margin-top: 2rem;
}


</style>

</head>
<body>

<h1>ENTRADA DE BLOG</h1>


<form action="../Controlador/transacciones.php" method="POST" enctype="multipart/form-data">

  <p><label for="titulo">Título:</label>
  <input type="text" name="titulo"></p>

  <p><label for="comentario">Comentario:</label>
  <textarea name="comentario" id="comentario" cols="26" rows="10"></textarea></p>

  <p><label for="imagen">Imagen:</label>
  <input type="file" name="imagen"></p>
 
  <input type="submit" name="subir" value="Subir blog">


</form>



<form action="../Controlador/transacciones.php" method="GET" id="form2">

  <p><label for="buscar">Buscar por tema:</label>
  <input type="text" name="buscar"></p>

  <input type="submit" value="Buscar blog" name="enviar">

</form>


<?php

if(isset($_GET['subir'])){
  echo "<p style='color:green'>Blog subido correctamente</p>";
}


?>

</body>
</html>