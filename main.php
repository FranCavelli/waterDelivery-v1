<?php
include("php/conexion_be.php");
include("php/fecha_be.php");

session_start();

if (!isset($_SESSION['nombreUsuario'])) {
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

if (date("H") >= 21 & $idUser != "Oficina") {
    echo '
            <script>
                alert("Horario no disponible.");
            </script>
        ';
    header("location: index.php");
    session_destroy();
    die();
}


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
    <link rel="stylesheet" type="text/css" href="stylesMain.css">
    <script src="https://kit.fontawesome.com/09f505da7c.js" crossorigin="anonymous"></script>
    <link href="http://fonts.cdnfonts.com/css/gotham-book" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="logo.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;500&family=Roboto+Condensed:wght@300;400&display=swap"
        rel="stylesheet">
    <title>Aguas Del Parque</title>
</head>

<body>
    <header>
        <div class="bordeSuperior">
            <div class="contenedorTitulo">
                <h1>Aguas del parque</h1>
            </div>
            <p class="horario">
                <?php echo $fecha_final; ?>
            </p>
            <p class="phpTexto">|
                <?php echo utf8_decode($row['nombreUsuario']); ?>
            </p>
            <p class="TextoRepartidor">|
                <?php echo $row['cargo']; ?>
            </p>
            <img src="media/profile.png" class="profile">
            <div class="abrirNav"></div>
        </div>
        <nav>
            <ul>
                <li><a class="inicio"><i class="fa-solid fa-house-chimney"></i> INICIO</a></li>
                <li><a class="repartidores"><i class="fa-solid fa-truck"></i> USUARIOS <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesClientesRepartidoresOculto">
                        <li><a href="repartidoresVer.php" class="expandirOpcionesRepartidoresVer">VER</a></li>
                        <?php if ($row['cargo'] == "Administrador") { ?>
                            <li><a href="repartidoresEditar.php" class="expandirOpcionesRepartidoresVer">EDITAR</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a class="clientes"><i class="fa-solid fa-address-book"></i> CLIENTES <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesClientesOculto">
                        <li><a href="clientesVer.php" class="expandirOpcionesClientesVer">VER</a></li>
                        <?php if ($row['cargo'] == "Administrador") { ?>
                            <li><a href="clientesEditar.php" class="expandirOpcionesClientesEditar">EDITAR</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a class="productos"><i class="fa-solid fa-box-open"></i> PRODUCTOS <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesProductosOculto">
                        <li><a href="productosVer.php" class="expandirOpcionesProductosVer">VER</a></li>
                        <?php if ($row['cargo'] == "Administrador") { ?>
                            <li><a href="productosEditar.php" class="expandirOpcionesProductosEditar">EDITAR</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a class="reparto"><i class="fa-solid fa-clipboard-list"></i> REPARTO <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesRepartoOculto">
                        <li><a href="reparto.php" class="expandirOpcionesRepartoAgustinTitulo">REPARTO</a></li>
                        <li><a href="repartoRuta.php" class="expandirOpcionesRepartoAgustinTitulo">RUTA</a></li>
                        <li><a href="repartoJueves.php" class="expandirOpcionesRepartoJavierTitulo">JUEVES</a></li>
                    </ul>
                </li>
                <li><a class="revendedores"><i class="fa-solid fa-briefcase"></i> REVENDEDORES <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesrevendedoresOculto">
                        <?php if ($row['cargo'] == "Administrador") { ?>
                            <li><a href="revendedoresEditar.php" class="expandirOpcionesProductosVer">EDITAR</a></li>
                            <li><a href="ventaRevendedores.php" class="expandirOpcionesProductosEditar">CARGAR</a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a class="mas"><i class="fa-solid fa-screwdriver-wrench"></i> MÁS <i
                            class="fa-solid fa-angle-down"></i></a>
                    <ul class="expandirOpcionesmasOculto">
                        <?php if ($row['cargo'] == "Administrador") { ?>
                            <li><a class="expandirOpcionesProductosEditar" href="ventasVer.php">VENTAS</a>
                            <li><a href="gastos.php" class="expandirOpcionesProductosEditar">GASTOS</a></li>
                            <li><a href="mapas/javascript.php" class="expandirOpcionesProductosEditar">UBICACIÓN</a></li>
                            <li><a href="imprimir.php" class="expandirOpcionesProductosEditar">IMPRIMIR</a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>
            <a class="responsiveMenuIcono" href="#"><i class="fa-solid fa-bars"></i></a>
        </nav>
        <div class="expandirOpcionesPerfilOculto"><a href="php/cerrarSesion.php">DESCONECTAR</a></div>
        <div class="responsiveMenuDisExt">
            <div class="responsiveMenuDisMenu">
                <ul>
                    <li><a href="main.php">INICIO </a></li>
                    <li class="usuariosResp"><a>USUARIOS <i class="fa-solid fa-chevron-down"></i></a>
                    <li class="usuariosRespOpc"><a href="repartidoresVer.php">VER</a></li>
                    <?php if ($row['cargo'] == "Administrador") { ?>
                        <li class="usuariosRespOpc2"><a href="repartidoresEditar.php">EDITAR</a></li>
                    <?php } ?>
                    </li>
                    <li class="clientesResp"><a>CLIENTES <i class="fa-solid fa-chevron-down"></i></a>
                    <li class="clientesRespOpc"><a href="clientesVer.php">VER</a></li>
                    <?php if ($row['cargo'] == "Administrador") { ?>
                        <li class="clientesRespOpc2"><a href="clientesEditar.php">EDITAR</a></li>
                    <?php } ?>
                    </li>
                    <li class="productosResp"><a>PRODUCTOS <i class="fa-solid fa-chevron-down"></i></a></li>
                    <li class="productosRespOpc"><a href="productosVer.php">VER</a></li>
                    <?php if ($row['cargo'] == "Administrador") { ?>
                        <li class="productosRespOpc2"><a href="productosEditar.php">EDITAR</a></li>
                    <?php } ?>
                    <li class="repartoResp"><a>REPARTO <i class="fa-solid fa-chevron-down"></i></a></li>
                    <li class="expandirOpcionesRepartoLista"><a href="reparto.php"
                            class="expandirOpcionesRepartoAgustinTitulo">REPARTO</a></li>
                    <li class="expandirOpcionesRepartoLista2"><a href="repartoRuta.php"
                            class="expandirOpcionesRepartoJavierTitulo">RUTA</a></li>
                    <li class="expandirOpcionesRepartoLista3"><a href="repartoJueves.php"
                            class="expandirOpcionesRepartoAleTitulo">JUEVES</a></li>
                    <?php if ($row['cargo'] == "Administrador") { ?>
                        <li class="revendedoresResp"><a>REVENDEDORES <i class="fa-solid fa-chevron-down"></i></a></li>
                        <li class="revendedoresRespOpc"><a href="revendedoresEditar.php">EDITAR</a></li>
                        <li class="revendedoresRespOpc2"><a href="ventaRevendedores.php">CARGAR</a></li>
                        <li class="masResp"><a>MÁS <i class="fa-solid fa-chevron-down"></i></a></li>
                        <li class="masRespOpc"><a href="ventasVer.php">VENTAS</a></li>
                        <li class="masRespOpc2"><a href="gastos.php">GASTOS</a></li>
                        <li class="masRespOpc3"><a href="mapas/javascript.php">UBICACIÓN</a></li>
                        <li class="masRespOpc4"><a href="imprimir.php">IMPRIMIR</a></li>
                    <?php } ?>
                    <li><a href="php/cerrarSesion.php">CERRAR SESIÓN <i class="fa-solid fa-power-off"></i></a></li>
                </ul>
                <i class="fa-solid fa-xmark"></i>
            </div>
        </div>
    </header>
    <?php
    $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_clientes FROM `clientes`");
    $sql_registerProd = mysqli_query($conexion, "SELECT COUNT(*) as total_productos FROM `productos`");
    $sql_registerUser = mysqli_query($conexion, "SELECT COUNT(*)-1 as total_usuarios FROM `usuarios`");
    $sql_registerRevendedores = mysqli_query($conexion, "SELECT COUNT(*) as total_revendedores FROM `revendedores`");
    $resultClientes = mysqli_fetch_array($sql_register);
    $resultClientesProd = mysqli_fetch_array($sql_registerProd);
    $resultClientesUsers = mysqli_fetch_array($sql_registerUser);
    $resultClientesRevendedores = mysqli_fetch_array($sql_registerRevendedores);
    $totalClientes = $resultClientes['total_clientes'];
    $totalClientesProd = $resultClientesProd['total_productos'];
    $totalClientesUsers = $resultClientesUsers['total_usuarios'];
    $totalClientesRevendedores = $resultClientesRevendedores['total_revendedores'];

    //if( $sql_register > 0){
    ?>
    <div class="Principal">
        <div class="Principal__logo">
            <img src="media/logo.jpg" alt="">
        </div>
        <div class="cantidadDeClientes">
            <div style="padding-top:5px;" class="clientesCantidadIcono"><i
                    style="background: rgb(48,48,189); background: linear-gradient(180deg, #0a97b9 0%, #065476 100%);"
                    class="fa-solid fa-address-book"></i>
                <p style="margin-top:3px;">
                    <span>.......</span><a>........</a>CLIENTES:<br><span>.......</span><a>.......</a>
                    <?php echo $totalClientes; ?>
                </p>
            </div>
            <div style="padding-top:5px;" class="clientesCantidadIcono"><i
                    style="background: rgb(48,48,189); background: linear-gradient(180deg, #008789 0%, #005456 100%);"
                    class="fa-solid fa-box-open"></i>
                <p style="margin-top:3px;"><span>...</span><a>....</a>PRODUCTOS:<a>...</a><br><span>..</span>
                    <?php echo $totalClientesProd; ?>
                </p>
            </div>
            <?php if ($row['cargo'] == "Administrador") { ?>
                <div style="padding-top:5px;" class="clientesCantidadIcono"><i
                        style="background: rgb(48,48,189); background: linear-gradient(180deg, #ffbb00 0%, #bb7700 100%);"
                        class="fa-solid fa-truck"></i><a>...</a>
                    <p style="margin-top:3px;">REPARTIDORES:<a>...</a><br>
                        <?php echo $totalClientesUsers; ?>
                    </p>
                </div>
                <div style="padding-top:5px;" class="clientesCantidadIcono"><i
                        style="background: rgb(48,48,189); background: linear-gradient(180deg, #a40ab9 0%, #610676 100%);"
                        class="fa-solid fa-briefcase"></i>
                    <p style="margin-top:3px;"><span>.</span>REVENDEDORES:<a>...</a><br>
                        <?php echo $totalClientesRevendedores; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
        <div class="CantidadDeClientesResponsive">
            <div class="cantidadCosasResponsive">
                <p>CLIENTES:<br>
                    <?php echo $totalClientes; ?>
                </p>
            </div><br>
            <div style="margin-top:-10px;" class="cantidadCosasResponsive">
                <p>PRODUCTOS:<br>
                    <?php echo $totalClientesProd; ?>
                </p>
            </div><br>
            <?php if ($row['cargo'] == "Administrador") { ?>
                <div style="margin-top:-10px;" class="cantidadCosasResponsive">
                    <p>REPARTIDORES:<br>
                        <?php echo $totalClientesUsers; ?>
                    </p>
                </div><br>
                <div style="margin-top:-10px;" class="cantidadCosasResponsive">
                    <p>REVENDEDORES:<br>
                        <?php echo $totalClientesRevendedores; ?>
                    </p>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php
    //  }       
    ?>
    <script type="text/javascript" src="codeMain.js"></script>
</body>

</html>