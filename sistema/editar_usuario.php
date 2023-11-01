<?php
include "includes/header.php";
include "../conexion.php";

if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre1']) || empty($_POST['apellido1']) || empty($_POST['apellido2']) || empty($_POST['idEstudiante'])) {
        $alert = '<div class="alert alert-primary" role="alert">
                    Todos los campos son obligatorios
                </div>';
    } else {
        $idEstudiante = $_POST['idEstudiante'];
        $tipo_documento = $_POST['document_tip'];
        $nombre1 = $_POST['nombre1'];
        $nombre2 = $_POST['nombre2'];
        $apellido1 = $_POST['apellido1'];
        $apellido2 = $_POST['apellido2'];
        $grado = $_POST['grado'];
        $jornada = $_POST['jornada'];
        $id_sede = $_POST['sede'];

        // Consulta preparada para evitar SQL injection
        $stmt = mysqli_prepare($conexion, "UPDATE estudiante SET 
            `nombre1`=?,
            `nombre2`=?,
            `apellido1`=?,
            `apellido2`=?,
            `grado`=?,
            `jornada`=?,
            `id_sede`=?,
            `documento`=?
            WHERE idEstudiante = ?");
        
        mysqli_stmt_bind_param($stmt, "ssssssssi", $nombre1, $nombre2, $apellido1, $apellido2, $grado, $jornada, $id_sede, $tipo_documento, $idEstudiante);
        
        if (mysqli_stmt_execute($stmt)) {
            $alert = '<div class="alert alert-primary" role="alert">
                        Usuario Actualizado
                    </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al Actualizar
                    </div>';
        }
    }
}

// Mostrar Datos
if (empty($_REQUEST['id'])) {
    header("Location: lista_estudiantes.php");
}
$idusuario = $_REQUEST['id'];
$sql = mysqli_query($conexion, "SELECT * FROM estudiante WHERE idEstudiante = '$idusuario'");
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
    header("Location: lista_estudiantes.php");
} else {
    if ($data = mysqli_fetch_array($sql)) {
        $idEstudiante = $data['idEstudiante'];
        $tipo_documento = $data['documento'];
        $nombre1 = $data['nombre1'];
        $nombre2 = $data['nombre2'];
        $apellido1 = $data['apellido1'];
        $apellido2 = $data['apellido2'];
        $grado = $data['grado'];
        $jornada = $data['jornada'];
        $id_sede = $data['id_sede'];
    }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 m-auto">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    Modificar Usuario
                </div>
                <div class="card-body">
                    <form class="" action="" method="post">
                        <?php echo isset($alert) ? $alert : ''; ?>
                        <input type="hidden" name="idEstudiante" value="<?php echo $idEstudiante; ?>">
                        <div class="form-group">
                            <label for="document_tip">Tipo de Documento</label>
                            <select name="document_tip" id="document_tip" class="form-control">
                                <?php
                                $query_documento = mysqli_query($conexion, "SELECT * FROM tipodocumento");
                                while ($documento_row = mysqli_fetch_assoc($query_documento)) {
                                    $selected = ($documento_row['idDocumento'] == $tipo_documento) ? 'selected' : '';
                                    echo "<option value='{$documento_row['idDocumento']}' $selected>{$documento_row['tipoDocumento']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre1">Primer nombre</label>
                            <input type="text" placeholder="Ingrese su Primer Nombre" class="form-control" name="nombre1" id="nombre1" value="<?php echo $nombre1; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nombre2">Segundo nombre</label>
                            <input type="text" placeholder="Ingrese su Segundo Nombre" class="form-control" name="nombre2" id="nombre2" value="<?php echo $nombre2; ?>">
                        </div>
                        <div class="form-group">
                            <label for="apellido1">Primer Apellido</label>
                            <input type="text" placeholder="Ingrese su Primer Apellido" class="form-control" name="apellido1" id="apellido1" value="<?php echo $apellido1; ?>">
                        </div>
                        <div class="form-group">
                            <label for="apellido2">Segundo Apellido</label>
                            <input type="text" placeholder="Ingrese su Segundo Apellido" class="form-control" name="apellido2" id="apellido2" value="<?php echo $apellido2; ?>">
                        </div>
                        <div class="form-group">
                            <label for="sede">Sede</label>
                            <select name="sede" id="sede" class="form-control">
                                <?php
                                $query_sede = mysqli_query($conexion, "SELECT * FROM sede");
                                while ($sede_row = mysqli_fetch_assoc($query_sede)) {
                                    $selected = ($sede_row['id_sede'] == $id_sede) ? 'selected' : '';
                                    echo "<option value='{$sede_row['id_sede']}' $selected>{$sede_row['nombre_sede']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="grado">Grado</label>
                            <select name="grado" id="grado" class="form-control">
                                <?php
                                $query_grado = mysqli_query($conexion, "SELECT * FROM grados");
                                while ($grado_row = mysqli_fetch_assoc($query_grado)) {
                                    $selected = ($grado_row['idGrado'] == $grado) ? 'selected' : '';
                                    echo "<option value='{$grado_row['idGrado']}' $selected>{$grado_row['nomGrado']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jornada">Jornada</label>
                            <select name="jornada" id="jornada" class="form-control">
                                <?php
                                $query_jornada = mysqli_query($conexion, "SELECT * FROM jornada");
                                while ($jornada_row = mysqli_fetch_assoc($query_jornada)) {
                                    $selected = ($jornada_row['idjornada'] == $jornada) ? 'selected' : '';
                                    echo "<option value='{$jornada_row['idjornada']}' $selected>{$jornada_row['nomjornada']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Editar Usuario</button>
                        <a href="lista_estudiantes.php" class="btn btn-danger">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- End of Main Content -->
<?php include_once "includes/footer.php"; ?>
