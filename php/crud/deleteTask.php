<?php 

    include("../conexion_be.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE id=$id";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $numeroCliente = $row['numeroCliente'];
        }

        
        $sql_eliminarVentas = "DELETE FROM ventas WHERE idCliente=$numeroCliente"; 
        $eliminar = mysqli_query($conexion, $sql_eliminarVentas);
        $sql_eliminarClientes = "DELETE FROM clientes WHERE numeroCliente=$numeroCliente"; 
        $eliminarClientes = mysqli_query($conexion, $sql_eliminarClientes);
        
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }

        $_SESSION['message'] = 'Cliente eliminado correctamente.';
        header("Location: ../../clientesEditar.php");
    }

?>