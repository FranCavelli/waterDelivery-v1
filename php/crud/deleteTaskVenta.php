<?php 

    include("../conexion_be.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM ventas WHERE id=$id";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $numeroCliente = $row['idCliente'];
            $bidones20 = $row['bidones20'];
            $bidones12 = $row['bidones12'];
            $bidones5 = $row['bidones5'];
            $sifones = $row['sifones'];
            $alqfriocalo = $row['alqfriocalo'];
            $canilla = $row['canilla'];
            $dispenser = $row['dispenser'];
            $montoPagado = $row['montoPagado'];
        }

        $sqlCliente= "SELECT * FROM clientes WHERE numeroCliente = '$numeroCliente'";
        $sqlResult = mysqli_query($conexion, $sqlCliente);
        if(mysqli_num_rows($sqlResult) > 0){
            $row = mysqli_fetch_array($sqlResult);
            $clienteSaldo = $row['saldoAnteriorCliente'];
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

        
        $ventaBidones20lts = intval($bidones20) * intval($precioBidones20);
        $ventaBidones12lts = intval($bidones12) * intval($precioBidones12);
        $ventaBidones5lts = intval($bidones5) * intval($precioBidones5);
        $ventaSifones = intval($sifones) * intval($precioSifones);
        $ventaCanilla = intval($canilla) * intval($precioCanilla);
        $ventaalqfriocalo = intval($alqfriocalo) * intval($precioalqfriocalo);
        $ventaDispenser = intval($dispenser) * intval($precioDispenser);

        $costeTotal = $ventaBidones12lts+$ventaBidones20lts+$ventaBidones5lts+$ventaCanilla+$ventaDispenser+$ventaSifones+$ventaalqfriocalo;

        $nuevoSaldoTotalSinCoste = $clienteSaldo-$costeTotal;
        
        $nuevoSaldoTotal = $nuevoSaldoTotalSinCoste+intval($montoPagado);

        $sql = "UPDATE clientes SET saldoAnteriorCliente=$nuevoSaldoTotal WHERE numeroCliente = $numeroCliente";
        $sqlRes = mysqli_query($conexion, $sql);
        $sql_eliminarVentas = "DELETE FROM ventas WHERE id=$id"; 
        $eliminar = mysqli_query($conexion, $sql_eliminarVentas);
        
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }

        $_SESSION['message'] = 'Cliente eliminado correctamente.';
        header("Location: ../../ventasVer.php");
    }
    }
?>