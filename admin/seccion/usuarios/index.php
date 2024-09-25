<?php
include("../../bd.php");

// Borrar usuarios
if(isset($_GET["txtID"])){

    $txtID=(isset($_GET["txtID"]))?$_GET["txtID"]:"";
    $sentencia=$conexion->prepare("DELETE FROM tbl_usuarios WHERE ID=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}


// Conexión a la base de datos

$sentencia=$conexion->prepare("SELECT * FROM `tbl_usuarios`");
$sentencia->execute();
$lista_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");


?>
<br>
<div class="card">
    <div class="card-header">
        
    <a
        name=""
        id=""
        class="btn btn-primary"
        href="crear.php"
        role="button"
        >Agregar usuario</a
    >

    </div>
    <div class="card-body">

    <div
        class="table-responsive"
    >
        <table
            class="table"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Pass</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($lista_usuarios as $registro) { ?>
                <tr class="">
                    <td><?php echo $registro["ID"]; ?></td>
                    <td><?php echo $registro["usuario"]; ?></td>
                    <td>******</td> <!-- solo imprime en el administrador -->
                    <td><?php echo $registro["correo"]; ?></td>
                    <td>


                    <a
                        name=""
                        id=""
                        class="btn btn-danger"
                        href="index.php?txtID=<?php echo ($registro['ID']); ?>" 
                        role="button"
                        >Borrar</a
                    >

                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>








<?php
include("../../templates/footer.php");

?>