<?php

    $conexion = mysqli_connect("localhost", "u126734771_oficinaAdp", "20269316560AdP", "u126734771_login_adp");
    
    
    if($conexion){
    }else{
        echo "No se ha podido conectar a la base de datos<br>";
        echo mysqli_connect_error()."<br>";
        echo mysqli_connect_errno();
    }
    
    
?>