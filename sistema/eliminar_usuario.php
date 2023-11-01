<?php
include "includes/header.php";
include "../conexion.php";

if (isset($_GET['id'])) {
    $idEstudiante = $_GET['id'];
    
    // Consulta SQL para eliminar el registro
    $sql_delete = "DELETE FROM estudiante WHERE idEstudiante = ?";
    
    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $sql_delete);
    
    if ($stmt) {
        // Vincular el parámetro
        mysqli_stmt_bind_param($stmt, "i", $idEstudiante);
        
        // Ejecutar la consulta
        if (mysqli_stmt_execute($stmt)) {
            // Eliminación exitosa, redirigir a la lista de estudiantes o mostrar un mensaje de éxito
            header("Location: lista_estudiantes.php");
        } else {
            // Error al ejecutar la consulta de eliminación, mostrar un mensaje de error
            echo "Error al eliminar el estudiante: " . mysqli_error($conexion);
        }
        
        // Cerrar la declaración
        mysqli_stmt_close($stmt);
    } else {
        // Error en la preparación de la consulta, mostrar un mensaje de error
        echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
    }
} else {
    // No se proporcionó un ID válido para eliminar, redirigir a la lista de estudiantes o mostrar un mensaje de error
    header("Location: lista_estudiantes.php");
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
