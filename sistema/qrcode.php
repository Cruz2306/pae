
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                                                                                        
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<div class="entrada">
<?php

require_once '../conexion.php';
require_once 'phpqrcode/qrlib.php';
$path = 'images/';
$qrcodee = $path . time() . ".png";
$qrimage = time() . ".png";

if (isset($_REQUEST['sbt-btn'])) {

  $idEstudiante = $_POST['idEstudiante'];
  $tipo_documento = $_POST['document_tip'];
  $nombre1 = $_POST['nombre1'];
  $nombre2 = $_POST['nombre2'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $grado = $_POST['grado'];
  $jornada = $_POST['jornada'];
  $id_sede = $_POST['sede'];

    // Corrige la consulta SQL para insertar datos en la tabla 'qrcodee'
    $query = mysqli_query($conexion, "INSERT INTO estudiante (idEstudiante, documento, nombre1, nombre2, apellido1, apellido2, grado, jornada, id_sede, qrimage) VALUES ('$idEstudiante', '$tipo_documento', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$grado', '$jornada', '$id_sede', '$qrimage')");


    if ($query) {
        // Los datos se guardaron con éxito 
        echo "<script>alert('Datos guardados exitosamente');</script>";
    } else {
        // Si hay un error en la consulta SQL
        echo "<script>alert('Error al guardar los datos en la base de datos');</script>";
    }

 

    // Generamos el código QR después de definir $nombre1
    QRcode::png("Tipo documento: $tipo_documento \n Documento: $idEstudiante \n Nombre1: $nombre1 \n Nombre2: $nombre2 \n Apellido1: $apellido1 \n Apellido2: $apellido2 \n Grado: $grado \n Jornada: $jornada \n sede: $id_sede ", $qrcodee, 'H', 4, 4);

    
    echo "<img src='" . $qrcodee . "'>";
  





    ?>
    <a href="login-usuario.php" class="btn btn-success" >Entrada</a> 
    <?php
} else {
}
?>
</div>







