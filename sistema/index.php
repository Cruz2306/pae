<?php
include_once "includes/header.php";
include "../conexion.php";
if (!empty($_POST)) {
    $alert = "";
    if (empty($_POST['nombre1'])  || empty($_POST['apellido1']) || empty($_POST['apellido2']) || empty($_POST['idEstudiante'])) {

        $alert = '<div class="alert alert-primary" role="alert">
                    Todo los campos son obligatorios
                </div>';
    } else {



        if ($query_insert) {
            $alert = '<div class="alert alert-primary" role="alert">
                            Usuario registrado
                        </div>';
        } else {
            $alert = '<div class="alert alert-danger" role="alert">
                        Error al registrar
                    </div>';
        }
    }
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="lista_estudiantes.php" class="btn btn-danger">Regresar</a>
    </div>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6 m-auto">

                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Registrar Usuario
                    </div>
                    <div class="card-body">
                        <form method="post" action="qrcode.php">
                            <?php echo isset($alert) ? $alert : ''; ?>


                            <div class="form-group">
                                <label>idEstudiante</label>
                                <select class="form-control" name="document_tip" id="document_tip" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">


                                    <?php
                                    $query_documento = mysqli_query($conexion, " select * from tipodocumento");

                                    $resultado_documento = mysqli_num_rows($query_documento);
                                    if ($resultado_documento > 0) {
                                        while ($documento = mysqli_fetch_array($query_documento)) {
                                    ?>
                                            <option value="<?php echo $documento["idDocumento"]; ?>"><?php echo $documento["tipoDocumento"] ?></option>
                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="idEstudiante">Documento</label>
                                <input class="form-control" type="number" name="idEstudiante" id="" placeholder="documento" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group">
                                <label for="nombre1">Primer nombre</label>
                                <input type="nombre1" class="form-control" placeholder="Ingrese su Primer Nombre" name="nombre1" id="nombre1" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                            </div>

                            <div class="form-group">
                                <label for="nombre2">segundo nombre</label>
                                <input type="nombre2" class="form-control" placeholder="Ingrese su segundo Nombre" name="nombre2" id="nombre2" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                            </div>

                            <div class="form-group">
                                <label for="apellido1">Primer Apellido</label>
                                <input type="apellido1" class="form-control" placeholder="Ingrese su primer apellido" name="apellido1" id="apellido1" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                            </div>
                            <div class="form-group">
                                <label for="apellido2">Segundo Apellido</label>
                                <input type="apellido2" class="form-control" placeholder="Ingrese su Segundo Apellido" name="apellido2" id="apellido2" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                            </div>

                            <div class="form-group">
                                <label>Sede</label>
                                <select class="form-control" name="sede" id="sede" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                    <?php
                                    $query_sede = mysqli_query($conexion, " select * from sede");

                                    $resultado_sede = mysqli_num_rows($query_sede);
                                    if ($resultado_sede > 0) {
                                        while ($sede = mysqli_fetch_array($query_sede)) {
                                    ?>
                                            <option value="<?php echo $sede["id_sede"]; ?>"><?php echo $sede["nombre_sede"] ?></option>
                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Grado</label>
                                <select name="grado" id="grado" class="form-control" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                    <?php
                                    $query_grado = mysqli_query($conexion, " select * from grados");

                                    $resultado_grado = mysqli_num_rows($query_grado);
                                    if ($resultado_grado > 0) {
                                        while ($grado = mysqli_fetch_array($query_grado)) {
                                    ?>
                                            <option value="<?php echo $grado["idGrado"]; ?>"><?php echo $grado["nomGrado"] ?></option>
                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>jornada</label>
                                <select name="jornada" id="jornada" class="form-control" prequired data-parsley-pattern="^[a-zA-Z]+$" data-parsley-trigger="keyup">
                                    <?php
                                    $query_jornada = mysqli_query($conexion, " select * from jornada");
                                    mysqli_close($conexion);
                                    $resultado_jornada = mysqli_num_rows($query_jornada);
                                    if ($resultado_jornada > 0) {
                                        while ($jornada = mysqli_fetch_array($query_jornada)) {
                                    ?>
                                            <option value="<?php echo $jornada["idjornada"]; ?>"><?php echo $jornada["nomjornada"] ?></option>
                                    <?php

                                        }
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="sbt-btn" value="QR Generate" class="btn btn-success" />
                            </div>


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