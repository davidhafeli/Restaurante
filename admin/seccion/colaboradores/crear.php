<?php

include("../../bd.php");

if($_POST){

    
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:""; // condicional = valor, si no nada
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $linkfacebook=(isset($_POST['linkfacebook']))?$_POST['linkfacebook']:"";
    $linkinstagram=(isset($_POST['linkinstagram']))?$_POST['linkinstagram']:"";
    $linklinkedin=(isset($_POST['linklinkedin']))?$_POST['linklinkedin']:"";
    

    //Instrucción SQL
    $sentencia=$conexion->prepare("
    INSERT INTO `tbl_colaboradores` (`ID`, `titulo`, `descripcion`, `linkfacebook`, `linkinstagram`, `linklinkedin`, `foto`) 
    VALUES (NULL, :titulo, :descripcion, :linkfacebook, :linkinstagram, :linklinkedin, :foto);
    ");

    //Manejo del archivo subido
    $foto=(isset($_FILES['foto']['name']))?$_FILES['foto']['name']:"";
    $fecha_foto=new DateTime();
    $nombre_foto=$fecha_foto->getTimestamp() . "_" . $foto;
    $tmp_foto=$_FILES['foto']['tmp_name'];
    
    if($tmp_foto!=""){
        move_uploaded_file($tmp_foto,"../../../images/colaboradores/".$nombre_foto);
    }
    

    //envio de parametros
    $sentencia->bindParam(":foto", $nombre_foto);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":linkfacebook", $linkfacebook);
    $sentencia->bindParam(":linkinstagram", $linkinstagram);
    $sentencia->bindParam(":linklinkedin", $linklinkedin);
    
    $sentencia->execute();
    header("Location:index.php");
    exit;

}

include ("../../templates/header.php"); 


?>

<br>

<div class="card">
    <div class="card-header">Colaboradores



    </div>
    <div class="card-body">
       
    
       <form action="" method="post" enctype="multipart/form-data">

<div class="mb-3">
    <label for="foto" class="form-label">Foto:</label>
    <input
        type="file"
        class="form-control"
        name="foto"
        id="foto"
        placeholder=""
        aria-describedby="fileHelpId"
    />
</div>
<div class="mb-3">
    <label for="titulo" class="form-label">Titulo</label>
    <input
        type="text"
        class="form-control"
        name="titulo"
        id="titulo"
        aria-describedby="helpId"
        placeholder="Titulo"
    />
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripcion:</label>
    <input
        type="text"
        class="form-control"
        name="descripcion"
        id="descripcion"
        aria-describedby="helpId"
        placeholder="Descripcion"
    />
</div>

<div class="mb-3">
    <label for="linkfacebook" class="form-label">Facebook:</label>
    <input
        type="text"
        class="form-control"
        name="linkfacebook"
        id="linkfacebook"
        aria-describedby="helpId"
        placeholder="Facebook"
    />
</div>

<div class="mb-3">
    <label for="" class="form-label">Instagram:</label>
    <input
        type="text"
        class="form-control"
        name="linkinstagram"
        id="linkinstagram"
        aria-describedby="helpId"
        placeholder="Instagram"
    />
</div>


<div class="mb-3">
    <label for="linklinkedin" class="form-label">Linkedin:</label>
    <input
        type="text"
        class="form-control"
        name="linklinkedin"
        id="linklinkedin"
        aria-describedby="helpId"
        placeholder="Linkedin"
    />
</div>

<button
    type="submit"
    class="btn btn-success"
   >
    Agregar colaboradores
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
    
</div>



<div class="card-footer text-muted"></div>





<?php

include ("../../templates/footer.php");

?>