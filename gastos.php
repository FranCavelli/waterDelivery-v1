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
    $idUser = $_SESSION['nombreUsuario'];

    
    $fechaActual = $fecha_year.$fecha_mes.$fecha_dia;

    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<?php
    include("php/navBar.php");
?>
<link rel="stylesheet" type="text/css" href="stylesGastos.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-money-bill"></i> Editar gastos - <?php echo $dia_semana[date("l")];?> <?php echo $fecha_dia;?> de <?php echo $mese_year[date("m")]?></div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjetaProductos">
                    <form action="php/crud/saveTaskGastos.php" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="nombre" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Costo" name="costo" required>
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="saveTaskGastos" value="Cargar gasto">
                    </form>
                <div class="tarjetaFechaGastos">
                    <form action="buscarTaskGastosFecha.php" method="POST">
                        <div class="form-group">
                            <input type="date" value="<?php echo $fecha_year; echo '-'; echo $fecha_mes; echo '-'; echo $fecha_dia?>" name="fecha">
                        </div>
                            <input type="submit" class="boton-fecha-gasto" name="buscarFecha" value="Buscar por fecha">
                    </form>
                </div>
                </div>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="invisible">id</th>
                                <th class="productoEstilo">Nombre</th>
                                <th class="productoEstilo">Costo</th>
                                <th class="productoEstilo">Fecha</th>
                                <th class="productoEstilo">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_procutos FROM `gastos`");
                                $resultProductos = mysqli_fetch_array($sql_register);
                                $totalProductos = $resultProductos['total_procutos'];

                                $porPagina = 20;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalProductos / $porPagina);

                                $query = "SELECT * FROM gastos ORDER BY id ASC LIMIT $desde,$porPagina ";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="invisible"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['costo']; ?></td>
                                    <td><?php echo $row['fecha']; ?></td>
                                    <td>
                                    <a class="eliminarGasto botonEliminar" onclick="AlertarEliminar(<?php echo $row['id'];?>);"><i class="fa-solid fa-trash-can"></i></a>
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
<script src="ajax.js"></script>
</body>
</html>