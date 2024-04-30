<?php

    include("../conexion_be.php");

    if(isset($_POST['saveTaskRepartidores'])){
        $nombreUsuario = $_POST['nombreUsuario'];
        $contrasena = $_POST['contrasena'];
        $cargo = $_POST['Cargo'];
        $ruta = $_POST['reparto'];
        $lunes = $_POST['ruta'];
        $martes = $_POST['jueves'];
        $lat = "-34.8554859";
        $lng = "-61.5149201";
        if($cargo==''){
            header("Location: ../../repartidoresEditar.php");
            die();
        }
        
        $contrasena = hash('sha512', $contrasena);

        $query = "INSERT INTO usuarios(nombreUsuario, contrasena, contrasenaRepetir, cargo, ruta, lunes, martes, lat, lng) 
        VALUES('$nombreUsuario', '$contrasena', '$contrasena', '$cargo', '$ruta', '$lunes', '$martes', '$lat', '$lng')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../repartidoresEditar.php");
    }

?>