<?php

    include("../conexion_be.php");

    if(isset($_POST['saveTaskProductos'])){
        $codigoProducto = $_POST['idProducto'];
        $nombreProdcuto = $_POST['descripcion'];
        $precioProducto = $_POST['precioUnitario'];
        $precioRevendedores = $_POST['precioRevendedores'];

        $query = "INSERT INTO productos(idProducto, descripcion, precioUnitario, precioRevendedores) 
        VALUES('$codigoProducto', '$nombreProdcuto', '$precioProducto', '$precioRevendedores')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../productosEditar.php");
    }

?>