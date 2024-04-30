<?php 

    include("php/conexion_be.php");
    include("php/fecha_be.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM revendedores WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado) > 0){
            $row = mysqli_fetch_array($resultado);
            $idRevendedor = $row['idRevendedor'];
            $nombre = $row['nombre'];
            $saldo = $row['saldo'];
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="cargarRevendedor.css">
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
        <div class="containercliente__titulo"><h1>Venta a revendedor <span><?php echo $idRevendedor?></span></h1></div>
        <div class="containercliente__datos">
            <p class="nombreCliente">Nombre: <?php echo $nombre?></p><br>
            <p class="saldoCliente">Saldo: $<?php echo $saldo?></p>
        </div>
        <div class="containerCliente__cargar">
            <form action="php/guardarVentaRevendedor.php" method="POST">
                <p class="valoresOcultos"><input type="text" name="idRevendedor" value="<?php echo $idRevendedor?>"></p>
                <p class="valoresOcultos"><input type="text" name="saldo" value="<?php echo $saldo?>"></p>
                <p class="valoresOcultos"><input type="text" name="nombre" value="<?php echo $nombre?>"></p>
                <div>
                    <p>Bidon x20LTS: </p><input type="number" placeholder="Bidones x20LTS." name="bidones20lts"><p>Bidon x12LTS: </p><input type="text" placeholder="Bidones x12LTS." name="bidones12lts"><p>Bidon x5LTS:   </p><input type="text" placeholder="Bidones x5LTS." name="bidones5lts">
                </div>
                <div>
                    <p>Sifones de soda: </p><input type="number" placeholder="Sifones de soda" name="sifones"><p>Canilla: </p><input type="number" placeholder="Canilla" name="canilla"><p>Dispenser: </p><input type="number" placeholder="Dispenser" name="dispenser">
                </div>
                <div>
                    <p>Frio-calor: </p><input type="number" placeholder="Alquiler frio-calor" name="alqfriocalo"><p>Envases Nuevos: </p><input type="number" placeholder="Envases nuevos" name="envasesNuevos"><p>Etiquetas: </p><input type="number" placeholder="Etiquetas" name="etiquetas">
                </div>
                <div class="montoPagadoDiv">
                    <p class="montoPagado">Monto pagado</p><input type="number" placeholder="Monto pagado" name="montoPagado">
                </div>
                <div class="submitBoton">
                    <input type="submit" class="boton-submit-reparto" name="guardarVentaRevendedor" value="Cargar Venta a Revendedor">
                </div>
            </form>
        </div>
    </div>
</body>
</html>