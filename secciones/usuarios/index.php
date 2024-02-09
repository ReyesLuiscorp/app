<?php

include("../../bd.php");


if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("location:index.php");
}


$sentencia = $conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
$lista_tbl_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>
<?php include("../../templates/header.php");?>

<br>




<div class="card">
<div class="card-header">
<h4>usuario</h4>
<a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar usuario</a>
</div>
    <div class="card-body">
 
        <div class="table-responsive-sm">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">nombre del usuario</th>
                        <th scope="col">contraseña</th>
                        <th scope="col">correo</th>
                        <th scope="col">acciones</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach ($lista_tbl_usuarios as $registro) { ?>

                    <tr class="">
                        <td scope="row"><?php echo $registro['id']; ?></td>
                        <td><?php echo $registro['usuario']; ?></td>
                        <td><?php echo $registro['password']; ?></td>
                        <td><?php echo $registro['correo']; ?></td>
                        <td>
                        <a  class="btn btn-info" href="editar.php?txtID=<?php echo $registro['id'];?>" role="button">editar</a>

|
<a  class="btn btn-danger" href="index.php?txtID=<?php echo $registro['id'];?>" role="button">eliminar</a>     
                        </td>
                    </tr>
                    
                    <?php } ?>

                </tbody>


            </table>
        </div>
        <div class="card-footer text-muted"></div>
    </div>


</div>

<?php include("../../templates/footer.php");?>  