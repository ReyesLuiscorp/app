
<?php

include("../../bd.php");

if(isset($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']))?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT * FROM tbl_usuarios WHERE id=:id  ");
    $sentencia->bindParam(":id",$txtID);
   
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
   
    $usuario=$registro["usuario"];
    $password=$registro["password"];
    $correo=$registro["correo"];



}

if($_POST){
    // print_r($_POST);
     //recoge los datos del input post 0
     $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
     $usuario=(isset($_POST["usuario"])?$_POST["usuario"]:"");
     $password=(isset($_POST["password"])?$_POST["password"]:"");
     $correo=(isset($_POST["correo"])?$_POST["correo"]:"");

     // preparar inserccion
     $sentencia=$conexion->prepare("UPDATE  tbl_usuarios SET 
        usuario=:usuario,
        password=:password,
        correo=:correo
              WHERE id=:id ");
     //aigando los valores que vienen del metodo post
     $sentencia->bindParam(":usuario",$usuario);
     $sentencia->bindParam(":password",$password);
     $sentencia->bindParam(":correo",$correo);
     $sentencia->bindParam(":id",$txtID);
     $sentencia->execute();
      header("location:index.php");
}

?>

<?php include("../../templates/header.php");?>

<br>
<div class="card">
    <div class="card-header"> editar usuarios</div>
    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            
        <div class="mb-3">
                <label for="txtID" class="form-label">ID:</label>
                <input type="text" value="<?php echo $txtID;?>" class="form-control" readonly name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID" />

            </div>


            <div class="mb-3">
                <label for="usuario" class="form-label">nombre del usuario</label>
                <input   value="<?php echo $registro['usuario']; ?>" type="text" class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="nombre del usuario" />

            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input  value="<?php echo $registro['password']; ?>" type="password" class="form-control" name="password" id="password" aria-describedby="helpId" placeholder="escriba su contraseña" />
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Email</label>
                <input  value="<?php echo $registro['correo']; ?>" type="email" class="form-control" name="correo" id="correo" aria-describedby="helpId" placeholder="escriba su correo" />

            </div>

                

            <button type="submit" class="btn btn-success">
                agregar
            </button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>


        </form>

    </div>
    <div class="card-footer text-muted"></div>
</div>

<?php include("../../templates/footer.php");?>