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
                    <tr class="">
                        <td scope="row">1</td>
                        <td>jose</td>
                        <td>programador</td>
                        <td>programador</td>
                        <td>
                            <input name="btneditar" id="btneditar" class="btn btn-primary" type="button" value="editar" />
                            <input name="btnborrar" id="btnborrar" class="btn btn-danger" type="button" value="eliminar" />     
                        </td>
                    </tr>
                    
                </tbody>


            </table>
        </div>
        <div class="card-footer text-muted"></div>
    </div>


</div>

<?php include("../../templates/footer.php");?>  