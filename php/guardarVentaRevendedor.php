<?php

    include("conexion_be.php");

    if(isset($_POST['guardarVentaRevendedor'])){
        $bidones20lts = $_POST['bidones20lts'];
        $bidones12lts = $_POST['bidones12lts'];
        $bidones5lts = $_POST['bidones5lts'];
        $sifones = $_POST['sifones'];
        $canilla = $_POST['canilla'];
        $dispenser = $_POST['dispenser'];
        $alqfriocalo = $_POST['alqfriocalo'];
        $envasesNuevos = $_POST['envasesNuevos'];
        $etiquetas = $_POST['etiquetas'];
        $montoPagado = $_POST['montoPagado'];
        $idRevendedor = $_POST['idRevendedor'];
        $saldo = $_POST['saldo'];
        $nombre = $_POST['nombre'];

        $sqlP20 = "SELECT * FROM revendedores WHERE idRevendedor=$idRevendedor";
        $resultadosqlP = mysqli_query($conexion, $sqlP20);
        if(mysqli_num_rows($resultadosqlP) > 0){
            $row = mysqli_fetch_array($resultadosqlP);
            $precioBidones20 = $row['x20'];
        }
        $sqlP12 = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlP12 = mysqli_query($conexion, $sqlP12);
        if(mysqli_num_rows($resultadosqlP12) > 0){
            $row = mysqli_fetch_array($resultadosqlP12);
            $precioBidones12 = $row['x12'];
        }
        $sqlP5 = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlP5 = mysqli_query($conexion, $sqlP5);
        if(mysqli_num_rows($resultadosqlP5) > 0){
            $row = mysqli_fetch_array($resultadosqlP5);
            $precioBidones5 = $row['x5'];
        }
        $sqlPsoda = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPsoda = mysqli_query($conexion, $sqlPsoda);
        if(mysqli_num_rows($resultadosqlPsoda) > 0){
            $row = mysqli_fetch_array($resultadosqlPsoda);
            $precioSifones = $row['Soda'];
        }
        $sqlPalqfriocalo = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPalqfriocalo = mysqli_query($conexion, $sqlPalqfriocalo);
        if(mysqli_num_rows($resultadosqlPalqfriocalo) > 0){
            $row = mysqli_fetch_array($resultadosqlPalqfriocalo);
            $precioalqfriocalo = $row['alqfc'];
        }
        $sqlPdispenser = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPdispenser = mysqli_query($conexion, $sqlPdispenser);
        if(mysqli_num_rows($resultadosqlPdispenser) > 0){
            $row = mysqli_fetch_array($resultadosqlPdispenser);
            $precioDispenser = $row['disp'];
        }
        $sqlPcanilla = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPcanilla = mysqli_query($conexion, $sqlPcanilla);
        if(mysqli_num_rows($resultadosqlPcanilla) > 0){
            $row = mysqli_fetch_array($resultadosqlPcanilla);
            $precioCanilla = $row['cani'];
        }
        $sqlPetiquetas = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPetiquetas = mysqli_query($conexion, $sqlPetiquetas);
        if(mysqli_num_rows($resultadosqlPetiquetas) > 0){
            $row = mysqli_fetch_array($resultadosqlPetiquetas);
            $precioetiquetas = $row['etiq'];
        }
        $sqlPenvasesNuevos = "SELECT * FROM revendedores  WHERE idRevendedor=$idRevendedor";
        $resultadosqlPenvasesNuevos = mysqli_query($conexion, $sqlPenvasesNuevos);
        if(mysqli_num_rows($resultadosqlPenvasesNuevos) > 0){
            $row = mysqli_fetch_array($resultadosqlPenvasesNuevos);
            $precioenvasesNuevos = $row['env'];
        }

        $ventaBidones20lts = intval($bidones20lts) * intval($precioBidones20);
        $ventaBidones12lts = intval($bidones12lts) * intval($precioBidones12);
        $ventaBidones5lts = intval($bidones5lts) * intval($precioBidones5);
        $ventaSifones = intval($sifones) * intval($precioSifones);
        $ventaalqfriocalo = intval($alqfriocalo) * intval($precioalqfriocalo);
        $ventaCanilla = intval($canilla) * intval($precioCanilla);
        $ventaDispenser = intval($dispenser) * intval($precioDispenser);
        $ventaEnvasesNuevos = intval($envasesNuevos) * intval($precioenvasesNuevos);
        $ventaetiquetas = intval($etiquetas) * intval($precioetiquetas);


        $costeTotal = $ventaBidones12lts+$ventaBidones20lts+$ventaBidones5lts+$ventaCanilla+$ventaDispenser+$ventaSifones+$ventaEnvasesNuevos+$ventaalqfriocalo+$ventaetiquetas;

        $nuevoSaldoTotalSinCoste = $saldo+$costeTotal;

        $nuevoSaldoTotal = $nuevoSaldoTotalSinCoste-intval($montoPagado);

        $query = "INSERT INTO ventarevendedores(bidon20, bidon12, bidon5, sodasifon, canilla, dispenser, montoPagado, idRevendedor, envasesNuevos, nombre, etiquetas, alqfriocalo) 
        VALUES('$bidones20lts', '$bidones12lts', '$bidones5lts', '$sifones', '$canilla', '$dispenser', '$montoPagado', '$idRevendedor', '$envasesNuevos', '$nombre', '$etiquetas', '$alqfriocalo')";
        $sql = "UPDATE revendedores SET saldo = $nuevoSaldoTotal WHERE idRevendedor = $idRevendedor";
        $sql = mysqli_query($conexion, $sql);
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
        $_SESSION['message'] = 'Cliente guardado correctamente.';
        header("Location: ../ventaRevendedores.php");
    }else{
        echo "Query failed";
    }

?>