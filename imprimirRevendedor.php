<?php
    include("php/conexion_be.php");
    include("php/fecha_be.php");

    session_start();

    $colorTexto = "#fff";

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
    $idUser = $_SESSION['nombreUsuario'];


    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesImprimir.css">

    <div class="container"><p><i class="fa-solid fa-print"></i> Imprimir revendedor</p>
        <form action="php/crud/imprimirRevendedorAccionDia.php" method="POST">
            <div class="repartoDe">Codigo revendedor: <input type="number" name="codigoRevendedor" value="<?php echo $id?>">
            </div>
            <div class="repartoDe">
                Fecha desde:  <input type="date" name="fechaInicio" value="<?php echo $fecha_year; echo '-'; echo $fecha_mes; echo '-'; echo $fecha_dia?>">
            </div>
            <div class="repartoDe">
                Fecha hasta:  <input type="date" name="fechaFin" value="<?php echo $fecha_year; echo '-'; echo $fecha_mes; echo '-'; echo $fecha_dia?>">
            </div>
                <input type="submit" class="boton-imprimir-reparto" name="imprimirRevendedor" value="Imprimir estos dias">
        </form>
        <form action="php/crud/imprimirRevendedorAccionTodo.php" method="POST">
            <div class="ocultarforms"><input type="number" name="codigoRevendedor" value="<?php echo $id?>" class="ocultarforms">
            </div>
            <div class="ocultarforms">
                <input type="date" name="fecha" class="ocultarforms">
            </div>
                <input type="submit" class="boton-imprimir-reparto-todo" name="imprimirRevendedor" value="Imprimir historico">
        </form>

    </div>

<script type="text/javascript" src="codeMain.js"></script>
<script type="text/javascript" src="codeClientes.js"></script>
</body>
</html>