<?php
include("../conexion.php");

$sql4=$conexion->query("SELECT * FROM roles");
$sql6=$conexion->query("SELECT * FROM  tipodocumento");


if (isset($_POST['REGISTRARSE'])) {
    if (empty($_POST['nomUsuario'])|| empty($_POST['apeUsuario'])||  empty($_POST['passUsuario'])|| ($_POST['passUsuario']) !== "1234" || empty($_POST['rolUsuario']) ||  empty($_POST['numDocumentoo'])) {
        
    }

    else {
        $tipodocumento = $_POST['tipodocumento'];
        $rolUsuario= $_POST['rolUsuario'];
        $numDocumentoo= $_POST['numDocumentoo'];
        $nomUsuario = $_POST['nomUsuario'];
        $apeUsuario = $_POST['apeUsuario'];
        $passUsuario = $_POST['passUsuario'];
        
        $consultaa = $conexion-> query("INSERT INTO usuarios (nomUsuario,apeUsuario,passUsuario,rolUsuario,numDocumentoo,idDocumento) VALUES('$nomUsuario','$apeUsuario','$passUsuario','$rolUsuario','$numDocumentoo','$tipodocumento')");


        if ($consultaa) {
            echo "<h5> tu registro a sido un exito</h5>";
        }

        else{
            echo "<h5> tu registro no se realizo con exito</h5>";
        }







    }


    
}


?>
