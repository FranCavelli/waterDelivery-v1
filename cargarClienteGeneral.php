<?php 

    include("php/conexion_be.php");
    include("php/fecha_be.php");

    session_start();
    
     if(!isset($_SESSION['nombreUsuario'])){
        echo '
            <script>
                alert("Porfavor inicia sesion");
            </script>
        ';
        header("location: index.php");
        session_destroy();
        die();
    }

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $pagina = $_GET['pagina'];
        $query = "SELECT * FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado) > 0){
            $row = mysqli_fetch_array($resultado);
            $nombre = $row['nombreCliente'];
            $numeroCliente = $row['numeroCliente'];
            $direccionCliente = $row['direccionCliente'];
            $saldoAnteriorCliente = $row['saldoAnteriorCliente'];
            $reparto = $row['reparto'];
        }
    }

    $idUser = $_SESSION['nombreUsuario'];

    $sql = "SELECT * FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cargarCliente.css">
    <title>Aguas Del Parque</title>
</head>
<body>
    <header>
        <nav>
            <h1>Aguas Del Parque</h1>
        </nav>
    </header>
    <div class="pantalla"></div>
    <div class="containercliente">
        <div class="containercliente__titulo"><h1>Reparto a cliente <span><?php echo $numeroCliente?></span></h1></div>
        <div class="containercliente__datos">
            <p class="nombreCliente">Nombre: <?php echo $nombre?></p>
            <p class="direccionCliente">Direccion: <?php echo $direccionCliente?></p><br class="ocultarRespSaldo">
            <p class="saldoCliente">Saldo: $<?php echo $saldoAnteriorCliente?></p>
        </div>
        <div class="containerCliente__cargar">
            <form action="php/guardarRepartoGeneral.php" method="POST">
                <p class="valoresOcultos"><input type="text" name="pagina" value="<?php echo $pagina?>" class="valoresOcultos"></p>
                <p class="valoresOcultos"><input type="text" name="idCliente" value="<?php echo $numeroCliente?>" class="valoresOcultos"></p>
                <p class="valoresOcultos"><input type="text" name="nombre" value="<?php echo $nombre?>"></p>
                <p class="valoresOcultos"><input type="text" name="id" value="<?php echo $id?>"></p>
                <p class="valoresOcultos"><input type="text" name="direccionCliente" value="<?php echo $direccionCliente?>"></p>
                <p class="valoresOcultos"><input type="text" name="saldoAnteriorCliente" value="<?php echo $saldoAnteriorCliente?>"></p>
                <p class="valoresOcultos"><input type="text" name="encargado" value="<?php echo utf8_decode($row['nombreUsuario'])?>"></p>
                <p class="valoresOcultos"><input type="text" name="pasado" value="1"></p>
                <div>
                    <p>Bidon x20LTS: </p><input type="number" placeholder="Bidones x20LTS." name="bidones20lts"><p>Bidon x12LTS: </p><input type="number" placeholder="Bidones x12LTS." name="bidones12lts"><p>Bidon x5LTS:   </p><input type="number" placeholder="Bidones x5LTS." name="bidones5lts">
                </div>
                <div>
                    <p>Sifones de soda: </p><input type="number" placeholder="Sifones de soda" name="sifones"><p>Canilla: </p><input type="number" placeholder="Canilla" name="canilla"><p>Dispenser: </p><input type="number" placeholder="Dispenser" name="dispenser">
                </div>
                <div>
                    <p>Alquiler Frio-calor: </p><input type="number" placeholder="Alquiler Frio-calor" name="alqfriocalo">
                </div>
                <div class="paraManana">
                    <p>¿Dejar para mañana?</p><select name="paraManana" style="padding:7px;">
                        <option value="1">1 - NO</option>
                        <option value="2">2 - SI</option>
                    </select>
                </div>
                <div class="montoPagadoDiv">
                    <p class="montoPagado">Monto pagado</p><input type="number" placeholder="Monto pagado" name="montoPagado" style="padding:10px;">
                </div>
                <div class="submitBoton">
                    <input type="submit" class="boton-submit-reparto" name="guardarReparto" value="Cargar">
                </div>
            </form>
        </div>
    </div>
</body>
</html>