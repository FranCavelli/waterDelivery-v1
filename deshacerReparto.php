<?php
    require('php/conexion_be.php');

    session_start();

    $nombreUsuario = $_SESSION['nombreUsuario'];

    $query = mysqli_query($conexion, "SELECT MAX(id) as max FROM ventas WHERE encargado = '$nombreUsuario'");
    $result = mysqli_fetch_array($query);
    $mayorId = $result['max'];
    if($mayorId!=NULL){
        $sqlQuery = mysqli_query($conexion, "SELECT * FROM ventas WHERE id='$mayorId'");
        $sqlQueryresult = mysqli_fetch_array($sqlQuery);
        $numeroDeCliente = $sqlQueryresult['idCliente'];
        $montoPagado = $sqlQueryresult['montoPagado'];
        $bidones20 = $sqlQueryresult['bidones20'];
        $bidones12 = $sqlQueryresult['bidones12'];
        $bidones5 = $sqlQueryresult['bidones5'];
        $sifones = $sqlQueryresult['sifones'];
        $canilla = $sqlQueryresult['canilla'];
        $dispenser = $sqlQueryresult['dispenser'];
        $alqfriocalo = $sqlQueryresult['alqfriocalo'];
    }else {
        header('location: main.php');
    }

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

    $ventaBidones20lts = intval($bidones20) * intval($precioBidones20);
    $ventaBidones12lts = intval($bidones12) * intval($precioBidones12);
    $ventaBidones5lts = intval($bidones5) * intval($precioBidones5);
    $ventaSifones = intval($sifones) * intval($precioSifones);
    $ventaalqfriocalo = intval($alqfriocalo) * intval($precioalqfriocalo);
    $ventaCanilla = intval($canilla) * intval($precioCanilla);
    $ventaDispenser = intval($dispenser) * intval($precioDispenser);

    $querySel = "SELECT * FROM clientes WHERE numeroCliente=$numeroDeCliente";
    $resultSel = mysqli_query($conexion, $querySel);  
    if($row = mysqli_fetch_array($resultSel)){
        $saldo = $row['saldoAnteriorCliente'];
        $reparto = $row['reparto'];
    };

    if($reparto=="Viernes Otro"){
        $repartoVolver = "ViernesOtro";
    }else if($reparto=="Javier Sabado"){
        $repartoVolver = "JavierSabado";
    }else if($reparto=="Ex gagliano"){
        $repartoVolver = "exgagliano";
    }else if($reparto=="Javier Jueves"){
        $repartoVolver = "JavierJueves";
    }else{
        $repartoVolver = $reparto;
    }

    $saldoNuevo = intval($montoPagado)+intval($saldo);

    $saldoNuevoFinal = intval($saldoNuevo)-$ventaBidones12lts-$ventaBidones20lts-$ventaBidones5lts-$ventaCanilla-$ventaDispenser-$ventaSifones-$ventaalqfriocalo;

    $sql_actualizarSaldo = "UPDATE clientes SET saldoAnteriorCliente='$saldoNuevoFinal' WHERE numeroCliente='$numeroDeCliente'"; 
    $result_sql_actualizarSaldo = mysqli_query($conexion, $sql_actualizarSaldo);

    $queryUpd = "UPDATE clientes SET pasado=0 WHERE numeroCliente='$numeroDeCliente'";
    $resultUpd = mysqli_query($conexion, $queryUpd);

    $queryDel = "DELETE FROM ventas WHERE id='$mayorId'";
    $resultDel = mysqli_query($conexion, $queryDel);

    header("location: reparto.php")
?>