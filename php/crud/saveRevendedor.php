<?php

    include("../conexion_be.php");

    if(isset($_POST['saveRevendedor'])){
        $idRevendedor = $_POST['idRevendedor'];
        $nombre = $_POST['nombre'];
        $x20 = $_POST['x20'];
        $x12 = $_POST['x12'];
        $x5 = $_POST['x5'];
        $Soda = $_POST['Soda'];
        $alqfc = $_POST['alqfc'];
        $disp = $_POST['disp'];
        $cani = $_POST['cani'];
        $etiq = $_POST['etiq'];
        $env = $_POST['env'];

        $query = "INSERT INTO revendedores(idRevendedor, nombre, saldo, x20, x12, x5, Soda, alqfc, disp, cani, etiq, env) 
        VALUES('$idRevendedor', '$nombre', '$saldo', '$x20', '$x12', '$x5', '$Soda', '$alqfc', '$disp', '$cani', '$etiq', '$env')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../revendedoresEditar.php");
    }

?>