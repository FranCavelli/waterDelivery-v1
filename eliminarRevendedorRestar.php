<?php 

    include("php/conexion_be.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM ventarevendedores WHERE id=$id";
    $resultado = mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_array($resultado);
        $montoPagado = $row['montoPagado'];
        $idRevendedor = $row['idRevendedor'];
        $bidon20 = $row['bidon20'];
        $bidon12 = $row['bidon12'];
        $bidon5 = $row['bidon5'];
        $sodasifon = $row['sodasifon'];
        $canilla = $row['canilla'];
        $dispenser = $row['dispenser'];
        $envasesNuevos = $row['envasesNuevos'];
        $alqfriocalo = $row['alqfriocalo'];
        $etiquetas = $row['etiquetas'];
    }

    $sqlP20 = "SELECT * FROM productos  WHERE idProducto = 1";
    $resultadosqlP = mysqli_query($conexion, $sqlP20);
    if(mysqli_num_rows($resultadosqlP) > 0){
        $row = mysqli_fetch_array($resultadosqlP);
        $precioBidones20 = $row['precioRevendedores'];
    }
    $sqlP12 = "SELECT * FROM productos  WHERE idProducto = 2";
    $resultadosqlP12 = mysqli_query($conexion, $sqlP12);
    if(mysqli_num_rows($resultadosqlP12) > 0){
        $row = mysqli_fetch_array($resultadosqlP12);
        $precioBidones12 = $row['precioRevendedores'];
    }
    $sqlP5 = "SELECT * FROM productos  WHERE idProducto = 3";
    $resultadosqlP5 = mysqli_query($conexion, $sqlP5);
    if(mysqli_num_rows($resultadosqlP5) > 0){
        $row = mysqli_fetch_array($resultadosqlP5);
        $precioBidones5 = $row['precioRevendedores'];
    }
    $sqlPsoda = "SELECT * FROM productos  WHERE idProducto = 4";
    $resultadosqlPsoda = mysqli_query($conexion, $sqlPsoda);
    if(mysqli_num_rows($resultadosqlPsoda) > 0){
        $row = mysqli_fetch_array($resultadosqlPsoda);
        $precioSifones = $row['precioRevendedores'];
    }
    $sqlPalqfriocalo = "SELECT * FROM productos  WHERE idProducto = 5";
    $resultadosqlPalqfriocalo = mysqli_query($conexion, $sqlPalqfriocalo);
    if(mysqli_num_rows($resultadosqlPalqfriocalo) > 0){
        $row = mysqli_fetch_array($resultadosqlPalqfriocalo);
        $precioalqfriocalo = $row['precioRevendedores'];
    }
    $sqlPdispenser = "SELECT * FROM productos  WHERE idProducto = 6";
    $resultadosqlPdispenser = mysqli_query($conexion, $sqlPdispenser);
    if(mysqli_num_rows($resultadosqlPdispenser) > 0){
        $row = mysqli_fetch_array($resultadosqlPdispenser);
        $precioDispenser = $row['precioRevendedores'];
    }
    $sqlPcanilla = "SELECT * FROM productos  WHERE idProducto = 7";
    $resultadosqlPcanilla = mysqli_query($conexion, $sqlPcanilla);
    if(mysqli_num_rows($resultadosqlPcanilla) > 0){
        $row = mysqli_fetch_array($resultadosqlPcanilla);
        $precioCanilla = $row['precioRevendedores'];
    }
    $sqlPetiquetas = "SELECT * FROM productos  WHERE idProducto = 8";
    $resultadosqlPetiquetas = mysqli_query($conexion, $sqlPetiquetas);
    if(mysqli_num_rows($resultadosqlPetiquetas) > 0){
        $row = mysqli_fetch_array($resultadosqlPetiquetas);
        $precioetiquetas = $row['precioRevendedores'];
    }
    $sqlPenvasesNuevos = "SELECT * FROM productos  WHERE idProducto = 9";
    $resultadosqlPenvasesNuevos = mysqli_query($conexion, $sqlPenvasesNuevos);
    if(mysqli_num_rows($resultadosqlPenvasesNuevos) > 0){
        $row = mysqli_fetch_array($resultadosqlPenvasesNuevos);
        $precioenvasesNuevos = $row['precioRevendedores'];
    }

    $ventaBidones20lts = intval($bidon20) * intval($precioBidones20);
    $ventaBidones12lts = intval($bidon12) * intval($precioBidones12);
    $ventaBidones5lts = intval($bidon5) * intval($precioBidones5);
    $ventaSifones = intval($sodasifon) * intval($precioSifones);
    $ventaalqfriocalo = intval($alqfriocalo) * intval($precioalqfriocalo);
    $ventaCanilla = intval($canilla) * intval($precioCanilla);
    $ventaDispenser = intval($dispenser) * intval($precioDispenser);    
    $ventaEnvasesNuevos = intval($envasesNuevos) * intval($precioenvasesNuevos);    
    $ventaetiquetas = intval($etiquetas) * intval($precioetiquetas);

    $sql = "SELECT * FROM revendedores WHERE idRevendedor=$idRevendedor";
    $resultado2 = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado2) > 0) {
        $row = mysqli_fetch_array($resultado2);
        $saldo = $row['saldo'];
    }

    $saldoNuevo = intval($montoPagado)+intval($saldo);

    $saldoNuevoFinal = intval($saldoNuevo)-$ventaBidones12lts-$ventaBidones20lts-$ventaBidones5lts-$ventaCanilla-$ventaDispenser-$ventaSifones-$ventaEnvasesNuevos-$ventaetiquetas-$ventaalqfriocalo;

    $sql_actualizarSaldo = "UPDATE revendedores SET saldo=$saldoNuevoFinal WHERE idRevendedor=$idRevendedor"; 
    $update = mysqli_query($conexion, $sql_actualizarSaldo);

    $sql_eliminarVentas = "DELETE FROM ventarevendedores WHERE id=$id"; 
    $eliminar = mysqli_query($conexion, $sql_eliminarVentas);

    header("Location: revendedoresEditar.php");
}
?>