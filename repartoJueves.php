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

    
    if(date("l h:i")=="Sunday 00:00"){
        $sql_actualizar = "UPDATE clientes SET pasado=0 WHERE pasado=1";
        $update = mysqli_query($conexion, $sql_actualizar);
    }
    if(date("h:i")=="00:00"){
        $sql_actualizar = "UPDATE clientes SET pasado=0 WHERE pasado=2";
        $update = mysqli_query($conexion, $sql_actualizar);
    }

    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $rowUsuario = $result->fetch_assoc();
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesReparto.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-clipboard-list"></i> Reparto - Jueves</div>
            <div class="tarjetaDeshacer2">
                <a onClick="AlertarDeshacerSeparado()" class="deshacer"><i class="fa-solid fa-rotate-left"></i> Deshacer</a>
            </div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
            </div>
            <div class="tarjetaDeshacer">
                <a onClick="AlertarDeshacerSeparado()" class="deshacer"><i class="fa-solid fa-rotate-left"></i><br>Deshacer</a>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr><?php if($rowUsuario['cargo']=="Administrador") { ?>
                                <th class="codigoClienteTablaHead OcultarTelefonoCambiarOrden"></th>
                                <?php } ?>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Saldo total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_clientes FROM `clientes` WHERE pasado='0' AND reparto='Jueves' OR pasado='0' AND reparto2='Jueves'");
                                $resultClientes = mysqli_fetch_array($sql_register);
                                $totalClientes = $resultClientes['total_clientes'];

                                $porPagina = 30;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalClientes / $porPagina);

                                $query = "SELECT * FROM clientes WHERE pasado='0' AND reparto='Jueves' OR pasado='0' AND reparto2='Jueves' ORDER BY numeroCliente ASC LIMIT $desde,$porPagina";
                                
                                $resultado_tareas = mysqli_query($conexion, $query);
                                
                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                            <tr>
                                     <?php if($rowUsuario['cargo']=="Administrador") { ?> <td class="OcultarTelefonoCambiarOrden"><button class="BotonCambiar" style="margin-bottom: 10px;"><a href="obtenervalorArribaSeparado.php?id=<?php echo $row['id']?>&pagina=<?php echo $pagina ?>"><i class="fa-solid fa-chevron-up"></i></a></button><button class="BotonCambiar"><a href="obtenervalorAbajoSeparado.php?id=<?php echo $row['id']?>&pagina=<?php echo $pagina ?>"><i class="fa-solid fa-chevron-down"></i></a></button>
                                    
                                        <form action="cambiarCodigoPorOtro.php" method="get">
                                            <input type="text" class="OcultarTelefonoCambiarOrden" style="width:40px;color:#000;" name="codigoDeseado" placeholder="Codigo" />
                                            <input type="text" class="Invisible" name="pagina" placeholder="" value="<?php echo $pagina ?>" />
                                            <input type="text" class="Invisible" name="idCliente" placeholder="" value="<?php echo $row['id'] ?>" />
                                            <input type="submit" value="" class="Invisible">
                                        </form>
                                        </td>
                                        <?php }?>
                                        <td class="codigoClienteTabla"><?php echo $row['numeroCliente'];?></td>
                                        <td><?php echo $row['nombreCliente']; ?></td>
                                        <td><?php echo $row['direccionCliente']; ?></td>
                                        <td><?php echo $row['saldoAnteriorCliente']; ?></td>
                                        <td style="background:#0ab92a;">
                                            <a href="cargarCliente.php?id=<?php echo $row['id']?>&pagina=<?php echo $pagina ?>" class="botonEliminar">Cargar</a>
                                        </td>
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
<script src="ajaxReparto.js"></script>
</body>
</html>