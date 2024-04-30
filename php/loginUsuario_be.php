<?php

    session_start();

    include 'conexion_be.php';

    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];
    $contrasena = hash('sha512', $contrasena);

    $validarLogin = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombreUsuario='$nombreUsuario'
                        and contrasena='$contrasena' ");

    if(mysqli_num_rows($validarLogin) > 0){
        header("Location: ../main.php");
        $_SESSION['nombreUsuario'] = $nombreUsuario;
        exit;
    }else{
        echo '
            <script>
                alert("Usuario inexistente");
                window.location = "../index.php";
            </script>
        ';
        exit;
    }

?>