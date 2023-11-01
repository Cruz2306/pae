<?php include_once "includes/header.php";

?>
 <a href="login-usuario.php" class="btn btn-success" >Entrada</a> 
<!-- Begin Page Content -->
<div class="container-fluid">


    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive container">
                <table id="example" class="table table-striped table-bordered bg-white" >
                    <thead class="table-dark">
                        <tr>
                            <th>Tipo de Documento</th>
                            <th>Documento</th>
                            <th>1er Nombre</th>
                            <th>2do Nombre</th>
                            <th>1er Apellido</th>
                            <th>2do Apellido</th>
                            <th>Grado</th>
                            <th>Jornada</th>
                            <th>sede</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "../conexion.php";

                        $query = mysqli_query($conexion, "SELECT * FROM estudiante ");
                        $result = mysqli_num_rows($query);
                        if ($result > 0) {
                            while ($data = mysqli_fetch_assoc($query)) {
                        ?>

                                <tr>
                                    <td><?php echo $data['documento']; ?></td>
                                    <td><?php echo $data['idEstudiante']; ?></td>
                                    <td><?php echo $data['nombre1']; ?></td>
                                    <td><?php echo $data['nombre2']; ?></td>
                                    <td><?php echo $data['apellido1']; ?></td>
                                    <td><?php echo $data['apellido2']; ?></td>
                                    <td><?php echo $data['grado']; ?></td>
                                    <td><?php echo $data['jornada']; ?></td>
                                    <td><?php echo $data['id_sede']; ?></td>

                                    <td>    
                                      
   
                                        <div>

                                            <a href="editar_usuario.php ?id=<?php echo $data['idEstudiante']; ?>" class="btn btn-success"><i class='fas fa-edit'></i> Editar</a>
                                            <a href="registrar_estudiante.php" class="btn btn-success " >Registro</a>
                                        </div>


										<form action="eliminar_usuario.php?id=<?php echo $data['idEstudiante']; ?>" method="post" class="confirmar d-inline">
											<button class="btn btn-danger" type="submit"><i class='fas fa-trash-alt'></i> Eliminar</button>
										</form>
									</td>


                                <?php } ?>
                                </tr>
                            <?php } ?>

                            </tr>


                    </tbody>

                </table>
            </div>

        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php include_once "includes/footer.php"; ?>
<script>
    new DataTable('#example', {
    responsive: true
});
</script>