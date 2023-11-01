<?php
include("../conexion.php");
include("registro-usuarios.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Document</title>
</head>
<body>

    <form method="POST" action="usuario.php">
        <section class="form-register">

        <?php

        if(isset($_POST ['numDocumentoo'])){
            $numDocumentoo= $_POST['numDocumentoo'];
            $nomUsuario = $_POST['nomUsuario'];
            $apeUsuario = $_POST['apeUsuario'];
            $passUsuario = $_POST['passUsuario'];

            $espacio= array();

            if($numDocumentoo == ""|| strlen ($numDocumentoo) <9){
            array_push($espacio,"llene el espacio o digite un documento valido");

            }

            if($nomUsuario ==""){
                array_push($espacio, "ingrese su nombre");
            }

            
            if($apeUsuario ==""){
                array_push($espacio, "ingrese su apellido");
            }

            if($passUsuario == ""|| ($passUsuario) !== "1234" ){
                array_push($espacio,"digite una contraseña valida");
            }

                if(count($espacio) > 0 ){
                    echo "error";
                    for($i = 0; $i< count($espacio); $i++){
                      echo "<li>".$espacio[$i];
                    }
        
                  
                   }else{
                      echo "correcto";
                    }
    


                


        }


?>
















        <div class="option">

        <select name="tipodocumento" id="" >
            <option value="" >tipodocumento</option>
            <?php
            while($tipodocumento=$sql6->fetch_array())
            {

                
                
                ?>
                <option value="<?php echo $tipodocumento[0]?>"> <?php echo $tipodocumento[1]?></option>
             <?php
            }
            ?>


         </div>
        </select>

        <input class="controls" type="number" name="numDocumentoo" id="" placeholder="numDocumentoo">



            <input type="text" class="controls" id="" name="nomUsuario" placeholder="nombre">
            
            <input type="text" class="controls" id="" name="apeUsuario" placeholder="apellido">
            
            <input type="password" class="controls" id="" name="passUsuario" placeholder="password">

      

  
                <select name="rolUsuario" id="" require>
                    <option value="roles">roles</option>
                    <?php
                    while($roles=$sql4->fetch_array())
                    {

                    ?>
                    <option value="<?php echo $roles[0]?>"><?php echo $roles[1]?> </option>
                    <?php
                    }
                         
                    ?>



                </select>


           

            


            <input class="botons" type="submit" value="REGISTRARSE" name="REGISTRARSE" onclick="refrescarPagina();">
            





        </section>





    </form>
    
</body>
</html>