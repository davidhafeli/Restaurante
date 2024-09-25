<?php

include("../../bd.php");

// recepcionar los datos y enviarlos a la base de datos

if($_POST){

    $opinion=(isset($_POST["opinion"]))?$_POST["opinion"]:"";
    $nombre=(isset($_POST["nombre"]))?$_POST["nombre"]:"";

    $sentencia=$conexion->prepare("INSERT INTO 
    `tbl_testimonios` (`ID`, `opinion`, `nombre`) 
    VALUES (NULL, :opinion, :nombre);");

    $sentencia->bindParam(":opinion", $opinion);
    $sentencia->bindParam(":nombre", $nombre);

    $sentencia->execute();
    header("Location:index.php");

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

    <!--bs5-form-input-->
    <div class="mb-3">
        <label for="" class="form-label">Opinión:</label>
        <input
            type="text"
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
    Agregar testimonios
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