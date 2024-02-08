<?php

include("../../bd.php");

if($_POST){
    print_r($_POST);
    //recoge los datos del input post
    $nombredelpuesto=(isset($_POST["nombredelpuesto"])?$_POST["nombredelpuesto"]:"");
    // preparar inserccion
    $sentencia=$conexion->prepare("INSERT INTO tbl_puestos(id,nombredelpuesto)
             VALUES (null, :nombredelpuesto)");
    //aigando los valores que vienen del metodo post
    $sentencia->bindParam(":nombredelpuesto",$nombredelpuesto);
    $sentencia->execute();
    header("location:index.php");
}
?>

<?php include("../../templates/header.php"); ?>
<br>


<?php include("../../templates/header.php"); ?>

<br>
<div class="card">
    <div class="card-header">puestos</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="nombredelpuesto" class="form-label">nombre del puesto</label>
                <input type="text" class="form-control" name="nombredelpuesto" id="nombredelpuesto" aria-describedby="helpId" placeholder="nombre del puesto" />

            </div>

            <button type="submit" class="btn btn-success">
                agregar
            </button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>


<?php include("../../templates/footer.php"); ?>