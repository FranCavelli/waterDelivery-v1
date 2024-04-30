<?php

    include("../conexion_be.php");

    if(isset($_POST['guardarProductoCambios'])){
        $idProducto = $_POST['idProducto'];
        $nombreNuevo = $_POST['nombreNuevo'];
        $precioNuevo = $_POST['precioNuevo'];
        $precioNuevoRev = $_POST['precioNuevoRev'];

        $query = "UPDATE productos SET descripcion='$nombreNuevo', precioUnitario=$precioNuevo, precioRevendedores=$precioNuevoRev WHERE id=$idProducto";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../productosEditar.php");
    }

?>