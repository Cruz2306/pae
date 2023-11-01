<?php
include("../conexion.php");


?>





<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/login.css">
<title>Inicio de Sesión</title>
</head>
<body>
  <div class="container">
    <h2>Iniciar Sesión</h2>

<form action= "login-usuario.php" method ="POST" >
<section class = "login_estudiante">

       <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
       </div>

       <div class="form-group">
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required>
       </div>

       <div class="form-group">
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contraseña" required>
       </div>

       <div class="form-group">
        <input type="submit" value="Iniciar Sesión" name='iniciarsesion'>
       </div>

</section>
    <?php
if(isset($_POST['iniciarsesion'])){
  if (empty($_POST['nombre'])  || empty($_POST['apellido']) || empty($_POST['contraseña'])){
        echo"error rellenar los campos nececesarios";
  }else{
     $nombre = $_POST['nombre'];
     $apellido = $_POST['apellido'];
     $contraseña = $_POST['contraseña'];
     $consulta = $conexion -> query("SELECT * FROM usuarios WHERE nomUsuario='$nombre' and apeUsuario='$apellido' and passUsuario='$contraseña' ");
     $result = mysqli_fetch_assoc($consulta);
      $admin=1234;
      $docente=2323;
      if($result < 0){
         echo"error";
      }else{
        if($contraseña == $admin){
             header('location:admins.php');
            }else{
              if($contraseña==$docente){
                header('location:docente.php'); 
              }          
              
            }
        } 
    }
}



    
    ?>
</form>
     

  </div>
</body>
</html>



















