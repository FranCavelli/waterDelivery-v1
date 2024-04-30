<?php 

    include("../conexion_be.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        if($id==3){
            header("Location: ../../repartidoresEditar.php");
            die();
        }else{
            $query = "DELETE FROM usuarios WHERE id = '$id'";
            $resultado = mysqli_query($conexion, $query);
            $_SESSION['message'] = 'Usuario eliminado correctamente.';
            header("Location: ../../repartidoresEditar.php");   
        }
            $query = "DELETE FROM usuarios WHERE id = '$id'";
            $resultado = mysqli_query($conexion, $query);
            header("Location: ../../repartidoresEditar.php");
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }
        $_SESSION['message'] = 'Usuario eliminado correctamente.';
        header("Location: ../../repartidoresEditar.php");
    }else{
        echo "Error";
    }

?>