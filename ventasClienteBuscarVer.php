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


    if (isset($_POST['buscarFecha'])) {
        $fecha = $_POST['fecha'];
        $idCliente = $_POST['idCliente'];
    }


    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesClientes.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-address-book"></i> Ver clientes | Clientes: <?PHP echo $idCliente?> - Fecha: <?php echo $fecha?></div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjetaa">
                    <form action="ventasClienteBuscarVer.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="idCliente" value="<?php echo $idCliente?>" class="ocultarElemento">
                            <input type="date" name="fecha" value="<?php echo $fecha_year; echo '-'; echo $fecha_mes; echo '-'; echo $fecha_dia?>" autofocus>
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="buscarFecha" value="Buscar por fecha">
                    </form>
                </div>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">Codigo</th>
                                <th>Nombre</th>
                                <th>X20</th>
                                <th>X12</th>
                                <th>X5</th>
                                <th>Sifones</th>
                                <th>Frio-calor</th>
                                <th>Canilla</th>
                                <th>Dispenser</th>
                                <th>Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_ventas FROM `ventas` WHERE fecha='$fecha_year-$fecha_mes-$fecha_dia' AND idCliente='$idCliente'");
                                $resultVentas = mysqli_fetch_array($sql_register);
                                $totalVentas = $resultVentas['total_ventas'];

                                $porPagina = 30;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalVentas / $porPagina);

                                $query = "SELECT * FROM ventas WHERE fecha='$fecha' AND idCliente='$idCliente' ORDER BY id DESC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['idCliente']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['bidones20']; ?></td>
                                    <td><?php echo $row['bidones12']; ?></td>
                                    <td><?php echo $row['bidones5']; ?></td>
                                    <td><?php echo $row['sifones']; ?></td>
                                    <td><?php echo $row['alqfriocalo']; ?></td>
                                    <td><?php echo $row['canilla']; ?></td>
                                    <td><?php echo $row['dispenser']; ?></td>
                                    <td><?php echo $row['montoPagado']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <table>
            </div>
        </div>
        <div class="paginador">
            <ul>
            <?php 
            
                if($pagina != 1){
            ?>

                <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>
            <?php
                }   
                for($i=1; $i <= $totalPaginas; $i++){
                    if($i == $pagina){
                        echo '<li class="pageSelected">'.$i.'</li>';
                    }else {
                        echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                    }
                }

                if($pagina != $totalPaginas){

                
            ?>

                <li><a href="?pagina=<?php echo $pagina+1; ?>">>></a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
<script type="text/javascript" src="codeMain.js"></script>
<script type="text/javascript" src="codeClientes.js"></script>
</body>
</html>
