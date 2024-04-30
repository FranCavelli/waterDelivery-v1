<?php

    session_start();

    if(isset($_SESSION['nombrceUsuario'])){
        header("Location: main.php");
    }
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&display=swap" rel="stylesheet"> 
    <title>Aguas del Parque</title>
</head>
<body id="body">
    <div class="contenedorPrincipal">
    <h1>Aguas Del Parque</h1>
    <div class="empleado">
        <img src="media/empleado.png" class="empleadoImg">
        <form action="php/loginUsuario_be.php" method="POST" class="registerEmpleadoHide">
            <input type="text" placeholder="Nombre" name="nombreUsuario">
            <input type="password" placeholder="Contraseña" name="contrasena" class="loginContrasenaEmp"><br>
            <button class="LoginBotton">Iniciar sesion</button><br>
        </form>
    <div> 
    <div class="dueño">
        <img src="media/dueno.png" class="dueñoImg">
        <form action="php/loginUsuario_be.php" method="POST" class="registerDueñoHide">
            <input type="text" placeholder="Nombre" name="nombreUsuario">
            <input type="password" placeholder="Contraseña" name="contrasena"><br>
            <button class="LoginBottonDueño">Iniciar sesion</button><br>
        </form>
    </div>
<script type="text/javascript" src="codeLogin.js"></script>
</body>
</html>