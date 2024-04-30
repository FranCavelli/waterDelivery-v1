<?php

    include("../conexion_be.php");

    if(isset($_POST['saveTask'])){
        $codigoCliente = $_POST['numeroCliente'];
        if($codigoCliente == ""){
            header("Location: ../../ventasVer.php");
            die();
        }else{

            $querynombre = "SELECT * FROM clientes WHERE numeroCliente = '$codigoCliente'";
            $resltnombre = mysqli_query($conexion, $querynombre);
            $row = $resltnombre->fetch_assoc();
            $nombreCliente = $row['nombreCliente'];
            $saldoAnteriorCliente = $row['saldoAnteriorCliente'];

            $x20 = $_POST['x20'];
            $x12 = $_POST['x12'];
            $x5 = $_POST['x5'];
            $sifonSoda = $_POST['sifonSoda'];
            $alqfriocalor = $_POST['alqfriocalor'];
            $dispenser = $_POST['dispenser'];
            $canilla = $_POST['canilla'];
            $fecha = $_POST['fecha'];
            $pago = $_POST['pago'];
            $encargado = "Oficina";

            $sqlP20 = "SELECT * FROM productos  WHERE idProducto = 1";
            $resultadosqlP = mysqli_query($conexion, $sqlP20);
            if(mysqli_num_rows($resultadosqlP) > 0){
                $row = mysqli_fetch_array($resultadosqlP);
                $precioBidones20 = $row['precioUnitario'];
            }
            $sqlP12 = "SELECT * FROM productos  WHERE idProducto = 2";
            $resultadosqlP12 = mysqli_query($conexion, $sqlP12);
            if(mysqli_num_rows($resultadosqlP12) > 0){
                $row = mysqli_fetch_array($resultadosqlP12);
                $precioBidones12 = $row['precioUnitario'];
            }
            $sqlP5 = "SELECT * FROM productos  WHERE idProducto = 3";
            $resultadosqlP5 = mysqli_query($conexion, $sqlP5);
            if(mysqli_num_rows($resultadosqlP5) > 0){
                $row = mysqli_fetch_array($resultadosqlP5);
                $precioBidones5 = $row['precioUnitario'];
            }
            $sqlPsoda = "SELECT * FROM productos  WHERE idProducto = 4";
            $resultadosqlPsoda = mysqli_query($conexion, $sqlPsoda);
            if(mysqli_num_rows($resultadosqlPsoda) > 0){
                $row = mysqli_fetch_array($resultadosqlPsoda);
                $precioSifones = $row['precioUnitario'];
            }
            $sqlPalqfriocalo = "SELECT * FROM productos  WHERE idProducto = 5";
            $resultadosqlPalqfriocalo = mysqli_query($conexion, $sqlPalqfriocalo);
            if(mysqli_num_rows($resultadosqlPalqfriocalo) > 0){
                $row = mysqli_fetch_array($resultadosqlPalqfriocalo);
                $precioalqfriocalo = $row['precioUnitario'];
            }
            $sqlPdispenser = "SELECT * FROM productos  WHERE idProducto = 6";
            $resultadosqlPdispenser = mysqli_query($conexion, $sqlPdispenser);
            if(mysqli_num_rows($resultadosqlPdispenser) > 0){
                $row = mysqli_fetch_array($resultadosqlPdispenser);
                $precioDispenser = $row['precioUnitario'];
            }
            $sqlPcanilla = "SELECT * FROM productos  WHERE idProducto = 7";
            $resultadosqlPcanilla = mysqli_query($conexion, $sqlPcanilla);
            if(mysqli_num_rows($resultadosqlPcanilla) > 0){
                $row = mysqli_fetch_array($resultadosqlPcanilla);
                $precioCanilla = $row['precioUnitario'];

            $ventaBidones20lts = intval($x20) * intval($precioBidones20);
            $ventaBidones12lts = intval($x12) * intval($precioBidones12);
            $ventaBidones5lts = intval($x5) * intval($precioBidones5);
            $ventaSifones = intval($sifonSoda) * intval($precioSifones);
            $ventaCanilla = intval($canilla) * intval($precioCanilla);
            $ventaalqfriocalo = intval($alqfriocalor) * intval($precioalqfriocalo);
            $ventaDispenser = intval($dispenser) * intval($precioDispenser);

            $costeTotal = $ventaBidones12lts+$ventaBidones20lts+$ventaBidones5lts+$ventaCanilla+$ventaDispenser+$ventaSifones+$ventaalqfriocalo;

            $nuevoSaldoTotalSinCoste = $saldoAnteriorCliente+$costeTotal;
    
            $nuevoSaldoTotal = $nuevoSaldoTotalSinCoste-intval($pago);
            
        
            $query = "INSERT INTO ventas(idCliente, nombre, bidones20, bidones12, bidones5, sifones, alqfriocalo, canilla, dispenser, montopagado, encargado, fecha) 
            VALUES('$codigoCliente', '$nombreCliente', '$x20', '$x12', '$x5', '$sifonSoda', '$alqfriocalor', '$canilla', '$dispenser', '$pago', '$encargado', '$fecha')";
            $resultado = mysqli_query($conexion, $query);
            $sql = "UPDATE clientes SET saldoAnteriorCliente = $nuevoSaldoTotal WHERE numeroCliente = $codigoCliente";
            $sqlRes = mysqli_query($conexion, $sql);
            if(!$resultado) {
                die("Query failed");
            }
                $_SESSION['message'] = 'Cliente guardado correctamente.';
    
                header("Location: ../../ventasVer.php");
        }

    }
}

?>