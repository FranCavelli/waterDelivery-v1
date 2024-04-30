<?php 

    include("../conexion_be.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }

        $_SESSION['message'] = 'Cliente eliminado correctamente.';
        header("Location: ../../productosEditar.php");
    }

?>