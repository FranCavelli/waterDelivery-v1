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
    }


    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesVentas.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-sack-dollar"></i> Ventas | <?php echo $fecha?></div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjeta">
                    <form action="ventasBuscarFecha.php" method="POST">
                        <div class="form-group">
                            <input type="date" name="fecha" value="<?php echo $fecha?>" autofocus>
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="buscarFecha" value="Buscar por fecha">
                    </form>
                </div>
                <!--<div class="tarjetaElecciones">
                    <a href=""><i class="fa-solid fa-truck usuarioIcono"></i></a>
                    <a href=""><i class="fa-solid fa-box-open productosIcono"></i></a>
                </div>-->
                
                <div class="tarjeta3"> <p><?php $query=mysqli_query($conexion,"SELECT SUM(montoPagado) AS totalPagado FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "Cobrado: $".$result['totalPagado'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(bidones20) AS totalx20 FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "x20: ".$result['totalx20'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(bidones12) AS totalx12 FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "x12: ".$result['totalx12'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(bidones5) AS totalx5 FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "x5: ".$result['totalx5'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(sifones) AS sifones FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "Sifones: ".$result['sifones'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(alqfriocalo) AS alqfriocalo FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "Frio/calor: ".$result['alqfriocalo'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(dispenser) AS dispenser FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "Dispenser: ".$result['dispenser'];
                ?> </p>
                <p><?php $query=mysqli_query($conexion,"SELECT SUM(canilla) AS canilla FROM ventas WHERE fecha LIKE '%$fecha%'");
                $result=mysqli_fetch_array($query);
                    echo "Canilla: ".$result['canilla'];
                ?> </p>
                                
                <?php
                
                $query2 = "SELECT * FROM usuarios WHERE cargo!='Administrador'";
                $resultado_tareas2 = mysqli_query($conexion, $query2);
                
                while($roww = mysqli_fetch_array($resultado_tareas2)){ 
                    
                    $usuario = $roww['nombreUsuario'];
                
                    $query=mysqli_query($conexion,"SELECT SUM(montoPagado) AS totalPagados FROM ventas WHERE fecha LIKE '%$fecha%' AND encargado='$usuario'");
                    $result=mysqli_fetch_array($query);
                    ?>
                    
                    <p style="background:#afa;padding-left:10px;padding-top:2px;padding-bottom:2px;margin-left:-10px;width:220px;"><?php echo $usuario.": $".$result['totalPagados'] ?></p>
                    
                <?php } ?>
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
                                <th>Fecha</th>
                                <th>Encargado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_ventas FROM `ventas` WHERE fecha LIKE '%$fecha%'");
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

                                $query = "SELECT * FROM ventas WHERE fecha LIKE '%$fecha%' ORDER BY id DESC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['idCliente']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td <?php if($row['bidones20']>0){ 
                                            echo "style='background:#A90000;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['bidones20']; ?></td>
                                    <td <?php if($row['bidones12']>0){ 
                                            echo "style='background:#A96900;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['bidones12']; ?></td>
                                    <td <?php if($row['bidones5']>0){ 
                                            echo "style='background:#00A940;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['bidones5']; ?></td>
                                    <td <?php if($row['sifones']>0){ 
                                            echo "style='background:#00A98A;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['sifones']; ?></td>
                                    <td <?php if($row['alqfriocalo']>0){ 
                                            echo "style='background:#6600A9;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['alqfriocalo']; ?></td>
                                    <td <?php if($row['canilla']>0){ 
                                            echo "style='background:#A90061;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['canilla']; ?></td>
                                    <td <?php if($row['dispenser']>0){ 
                                            echo "style='background:#0017A9;color:#fff;font-weight:900;'";
                                        } ?>><?php echo $row['dispenser']; ?></td>
                                    <td <?php if($row['montoPagado']>0){ 
                                            echo "style='background:#06C800;color:#fff;font-weight:900;'";
                                        } ?>><?php if($row['montoPagado']>0){echo "$";} ?><?php echo $row['montoPagado']; ?></td>
                                    <td><?php echo $row['fecha']; ?></td> 
                                    <td><?php echo $row['encargado']; ?></td> 
                                    <td><a onclick="AlertarEliminar(<?php echo $row['id']; ?>);"><i class="fa-solid fa-trash-can"></i></a></td> 
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="ajaxVentas.js"></script>
</body>
</html>
