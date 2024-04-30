<?php

    include("conexion_be.php");

    if(isset($_POST['guardarReparto'])){
        $bidones20lts = $_POST['bidones20lts'];
        $bidones12lts = $_POST['bidones12lts'];
        $bidones5lts = $_POST['bidones5lts'];
        $sifones = $_POST['sifones'];
        $alqfriocalo = $_POST['alqfriocalo'];
        $canilla = $_POST['canilla'];
        $dispenser = $_POST['dispenser'];
        $montoPagado = $_POST['montoPagado'];
        $idCliente = $_POST['idCliente'];
        $saldoAnteriorCliente = $_POST['saldoAnteriorCliente'];
        $paraManana = $_POST['paraManana'];
        $pasado = $_POST['pasado'];
        $nombre = $_POST['nombre'];
        $reparto = $_POST['reparto'];
        $encargado = $_POST['encargado'];
        $pagina = $_POST['pagina'];

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
        }

        $ventaBidones20lts = intval($bidones20lts) * intval($precioBidones20);
        $ventaBidones12lts = intval($bidones12lts) * intval($precioBidones12);
        $ventaBidones5lts = intval($bidones5lts) * intval($precioBidones5);
        $ventaSifones = intval($sifones) * intval($precioSifones);
        $ventaCanilla = intval($canilla) * intval($precioCanilla);
        $ventaalqfriocalo = intval($alqfriocalo) * intval($precioalqfriocalo);
        $ventaDispenser = intval($dispenser) * intval($precioDispenser);

        $costeTotal = $ventaBidones12lts+$ventaBidones20lts+$ventaBidones5lts+$ventaCanilla+$ventaDispenser+$ventaSifones+$ventaalqfriocalo;

        $nuevoSaldoTotalSinCoste = $saldoAnteriorCliente+$costeTotal;

        $nuevoSaldoTotal = $nuevoSaldoTotalSinCoste-intval($montoPagado);

        $query = "INSERT INTO ventas(bidones20, bidones12, bidones5, sifones, alqfriocalo, canilla, dispenser, montoPagado, idCliente, nombre, encargado) 
        VALUES('$bidones20lts', '$bidones12lts', '$bidones5lts', '$sifones', '$alqfriocalo', '$canilla', '$dispenser', '$montoPagado', '$idCliente', '$nombre', '$encargado')";
        $sql = "UPDATE clientes SET saldoAnteriorCliente = $nuevoSaldoTotal, paraManana = '$paraManana', pasado = $pasado WHERE id = $idCliente";
        $sql = mysqli_query($conexion, $sql);
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
        $sql = "UPDATE clientes SET pasado = '1' WHERE id = $idCliente";
        $sql = mysqli_query($conexion, $sql);
        
            if($reparto=="Viernes Otro"){
            $repartoVolver = "ViernesOtro";
            }else if($reparto=="Javier Sabado"){
                $repartoVolver = "JavierSabado";
            }else if($reparto=="Ex gagliano"){
                $repartoVolver = "ExGagliano";
            }else if($reparto=="Javier Jueves"){
                $repartoVolver = "JavierJueves";
            }else if($reparto=="Viernes"){
                $repartoVolver = "Vierness";
            }else{
                $repartoVolver = $reparto;
            }
        if($pagina>1){
            header("Location: ../reparto".$repartoVolver.".php?pagina=".$pagina);
        }else{
            header("Location: ../reparto".$repartoVolver.".php");
        }
    }

?>