<?php

    include("../conexion_be.php");

    if(isset($_POST['saveTaskGastos'])){
        $nombre = $_POST['nombre'];
        $costo = $_POST['costo'];

        $query = "INSERT INTO gastos(nombre, costo) 
        VALUES('$nombre', '$costo')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../gastos.php");
    }

?>