<?php 
    
    session_start();

    include("php/conexion_be.php");
    include("php/navBar.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $idProducto = $row['$idProducto'];
            $nombre=$row['descripcion'];
            $precio = $row['precioUnitario'];
            $precioRev = $row['precioRevendedores'];
        }
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }
        //header("Location: ../../productosEditar.php");
    }

?>
<div class="fondoParaOscurecer"></div>
<div class="containerProductos">
    <div><p style="background:#fff;">Editar producto</p>
        <form action="php/crud/guardarCambiosProducto.php" method="POST">
            <div class="ocultarElementos">
                <input class="ocultarElementos" type="text" value="<?php echo $id?>" name="idProducto">
            </div>
            <div class="container__inputs"><a>Nuevo nombre:</a><br>
                <input type="text" placeholder="Nombre nuevo" name="nombreNuevo" value="<?php echo $nombre?>">
            </div>
            <div class="container__inputs"><a>Nuevo precio:</a><br>
                <input type="number" placeholder="Precio nuevo" name="precioNuevo" value="<?php echo $precio?>">
            </div>
            <div class="container__inputs"><a>Nuevo precio revendedores:</a><br>
                <input type="number" placeholder="Precio Revendedores nuevo" name="precioNuevoRev" value="<?php echo $precioRev?>">
            </div>
                <input type="submit" class="boton-submit-productosN" name="guardarProductoCambios" value="Guardar cambios">
        </form>
    </div>
</div>