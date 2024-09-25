<?php 


include("../../bd.php");



if(isset($_GET['txtID'])){

    $txtID=(isset($_GET["txtID"])) ? $_GET["txtID"]:"";
    $sentencia = $conexion->prepare("DELETE FROM `banners` WHERE ID = :id");
    $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT);
    $sentencia->execute();
    
    header("Location:index.php");
    exit;

}



$sentencia=$conexion->prepare("SELECT * FROM `banners`");
$sentencia->execute();
$lista_banners=$sentencia->fetchAll(PDO::FETCH_ASSOC);



include ("../../templates/header.php"); 

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
        >Agregar registros</a
    >
        
    </div>
    <div class="card-body">
       
    <div
        class="table-responsive"
    >
        <table
            class="table table-primary"
        >
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Enlace</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>

            <tbody>
                
                <?php foreach ($lista_banners as $key=> $value) { ?> 

                     <tr class=""> <!--debe estar dentro -->
                    <td scope="row"><?php echo ($value['ID']); ?></td>
                    <td><?php echo ($value['titulo']); ?></td>
                    <td><?php echo($value['descripcion']); ?></td>
                    <td><?php echo($value['link']) ?></td>


                    <td>
                    <a
                        name=""
                        id=""
                        class="btn btn-info"
                        href="editar.php?txtID=<?php echo ($value['ID']); ?>"
                        role="button"
                        >Editar</a
                    >

                    <a
                        name=""
                        id=""
                        class="btn btn-danger"
                        href="index.php?txtID=<?php echo ($value['ID']); ?>" 
                        role="button"
                        >Borrar</a
                    >
                    <!--- faltaba el "=" en index.php?txtID = "<"?php echo ($value['ID']); ?> -->
                    
                    </td>

                <?php } ?>


                </tr>
            </tbody>
        </table>
    </div>
    

    </div>
    <div class="card-footer text-muted"></div>
</div>



<?php include ("../../templates/footer.php"); ?>