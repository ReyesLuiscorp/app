<?php
include("../../bd.php");


if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_puestos WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    $nombredelpuesto=$registro["nombredelpuesto"];


}

if($_POST){
   // print_r($_POST);
    //recoge los datos del input post
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";

    $nombredelpuesto=(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
    // preparar inserccion
    $sentencia=$conexion->prepare("UPDATE  tbl_puestos 
    SET nombredelpuesto=:nombredelpuesto
             WHERE id=:id ");
    //aigando los valores que vienen del metodo post
    $sentencia->bindParam(":nombredelpuesto",$nombredelpuesto);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    header("location:index.php");
}

?>

<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">editar puestos</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID;?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />

            </div>


            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">nombre del puesto</label>
                <input type="text"  value="<?php echo $nombredelpuesto;?>"class="form-control"  name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="nombre del puesto" />

            </div>

            <button type="submit" class="btn btn-success">
               actualizar
            </button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php"); ?>