<?php

include("../../bd.php");



if(isset($_GET['txtID'])){

    $txtID=(isset($_GET["txtID"])) ? $_GET["txtID"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM `tbl_testimonios` WHERE ID=:id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);
    
    $opinion=$registro["opinion"];
    $nombre=$registro["nombre"];
    

}

if($_POST){

    $opinion=(isset($_POST["opinion"]))?$_POST["opinion"]:"";
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";
    $txtID=(isset($_POST["txtID"])) ? $_POST["txtID"]:"";

    $sentencia=$conexion->prepare(" UPDATE `tbl_testimonios`
    SET opinion=:opinion,  nombre=:nombre
    WHERE ID=:id");

    $sentencia->bindParam(":opinion",$opinion);
    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    header("Locatioon:index.php");


}




include("../../templates/header.php");


?>

<br>

<div class="card">
    <div class="card-header"> 
        
    Testimonios

    </div>
    <div class="card-body">
        
    <!--metodo form post-->
    <form action="" method="post">

    <div class="mb-3">
        <label for="" class="form-label">ID:</label>
        <input
            type="text"
            value="<?php echo $txtID;?>";
            class="form-control"
            name="txtID"
            id="txtID"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    

    <!--bs5-form-input-->
    <div class="mb-3">
        <label for="" class="form-label">Opinión:</label>
        <input
            type="text"
            value="<?php echo $opinion;?>"
            class="form-control"
            name="opinion"
            id="opinion"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Nombre:</label>
        <input
            type="text"
             value="<?php echo $nombre;?>"
            class="form-control"
            name="nombre"
            id="nombre"
            aria-describedby="helpId"
            placeholder=""
        />
    </div>
    
    <button
    type="submit"
    class="btn btn-success"
   >
    Editar testimonios
   </button>

   <a
    name=""
    id=""
    class="btn btn-primary"
    href="index.php"
    role="button"
    >Cancelar</a
   >

    </form> 

    </div>

    <div class="card-footer text-muted"></div>
</div>


<?php

include("../../templates/footer.php");

?>