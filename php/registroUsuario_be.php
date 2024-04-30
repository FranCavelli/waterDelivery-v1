<?php

    include 'conexion_be.php';

    $nombreUsuario = $_POST['nombreUsuario'];
    $contrasena = $_POST['contrasena'];
    $contrasenaRepetir = $_POST['contrasenaRepetir'];

    if($contrasena == $contrasenaRepetir){
        $contrasena = hash('sha512', $contrasena);
        $contrasenaRepetir = hash('sha512', $contrasenaRepetir);
    }

    $query = "INSERT INTO usuarios(nombreUsuario, contrasena, contrasenaRepetir) 
              VALUES('$nombreUsuario', '$contrasena', '$contrasenaRepetir')";

    $verificarUsuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE nombreUsuario='$nombreUsuario' ");

    if(mysqli_num_rows($verificarUsuario) > 0){
        echo '
            <script>
                alert("Este usuario ya esta registrado, intenta con uno diferente");
                window.location = "../index.php";
            </script>
        ';
        exit();
        mysqli_close($conexion);
    }

    if($contrasena != $contrasenaRepetir){
        echo '
            <script>
                alert("Las contraseñas ingresadas no coinciden");
                window.location = "../index.php";
            </script>
        ';
        exit();
        mysqli_close($conexion);
    }

    if($nombreUsuario == "" || $contrasena == "" || $contrasenaRepetir == ""){
        echo '
            <script>
                alert("No puedes dejar espacios vacios");
                window.location = "../index.php";
            </script>
        ';
        exit();
        mysqli_close($conexion);
    }

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo'
            <script>
                window.location = "../index.php";
            </script>
        ';
    }else{
        echo'
            <script>
                window.location = "../index.php";
            </script>
        ';
    }

    mysqli_close($conexion);
?>