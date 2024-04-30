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


    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
    
    $sqlCode = "SELECT * FROM clientes WHERE reparto='Lunes' OR reparto='Martes' OR reparto='Miercoles' OR reparto='Jueves' OR reparto='Viernes' OR reparto='Sabado' ORDER BY numeroCliente DESC LIMIT 1";
    $resultCode = $conexion->query($sqlCode);
    $rowCode = $resultCode->fetch_assoc();
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesClientes.css">
    <div class="container">
        <?php 
            $busqueda = strtolower($_REQUEST['busqueda']);
            if($busqueda==" "){
                header("Location: clientesEditar.php");
            }
        ?>
        <div class="EditarClientesTitulo"><i class="fa-solid fa-address-book"></i> Editar Clientes</div>
        <form action="buscarCliente.php" method="get" class="formSearch">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda; ?>">
            <input type="submit" value="Buscar" class="btnSearch">
        </form>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjeta">
                    <form action="php/crud/saveTask.php" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" name="numeroCliente" value="<?php echo $rowCode['numeroCliente']+1; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="nombreCliente" required autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Dirección" name="direccionCliente" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Saldo anterior" name="saldoAnteriorCliente" value="0">
                        </div>
                        <div class="form-group">
                            <select name="reparto" placeholder="Reparto" class="selectDiaReparto">
                                <option disabled="">Reparto:</option>
                                <option value="Lunes">1 - Lunes</option>
                                <option value="Ruta">2 - Ruta</option>
                                <option value="Martes">3 - Martes</option>
                                <option value="Martes(2)">4 - Martes(2)</option>
                                <option value="Miercoles">5 - Miercoles</option>
                                <option value="Exgagliano">6 - Ex gagliano</option>
                                <option value="Jueves">7 - Jueves</option>
                                <option value="JuevesJavier">8 - Jueves Javier</option>
                                <option value="Viernes">9 - Viernes</option>
                                <option value="Viernesotro">10 - Viernes otro</option>
                                <option value="Sabado">11 - Sabado</option>
                                <option value="SabadoJavier">12 - Sabado Javier</option>
                                <option value="Agustin">13 - Agustin</option>
                            </select>
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="saveTask" value="Guardar cliente">
                    </form>
                </div>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">Codigo</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Reparto</th>
                                <th>Saldo total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_clientes FROM clientes WHERE ( 
                                    numeroCliente LIKE '%$busqueda%'OR nombreCliente LIKE '%%$busqueda%'OR direccionCliente LIKE '%%$busqueda%' OR
                                     reparto LIKE '%%$busqueda%' ) ");
                                $resultClientes = mysqli_fetch_array($sql_register);
                                $totalClientes = $resultClientes['total_clientes'];

                                $porPagina = 20;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalClientes / $porPagina);

                                $query = "SELECT * FROM clientes  WHERE ( 
                                    numeroCliente LIKE '%%$busqueda%'OR nombreCliente LIKE '%%$busqueda%'OR direccionCliente LIKE '%%$busqueda%' OR
                                     reparto LIKE '%%$busqueda%' ) ORDER BY numeroCliente ASC LIMIT $desde,$porPagina ";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['numeroCliente']; ?></td>
                                    <td><?php echo $row['nombreCliente']; ?></td>
                                    <td><?php echo $row['direccionCliente']; ?></td>
                                    <td><?php echo $row['reparto']; ?></td>
                                    <td><?php echo $row['saldoAnteriorCliente']; ?></td>
                                    <td>
                                        <a href="php/crud/deleteTask.php?id=<?php echo $row['id'] ?>" class="botonEliminar" style="margin-right:5px;"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="clientesVerBoton.php?id=<?php echo $row['numeroCliente'] ?>" class="botonVer" style="margin-left:5px;"><i class="fa-solid fa-eye"></i></a>
                                        <a href="editarCliente.php?id=<?php echo $row['id'] ?>" class="botonEditar"><i style="color:blue;margin-left:10px;" class="fa-solid fa-pen-to-square"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    <table>
            </div>
        </div>
    <?php 
        if($totalClientes != 0){
    ?>
        <div class="paginador">
            <ul>
            <?php 
            
                if($pagina != 1){
            ?>

                <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda; ?>"><<</a></li>
            <?php
                }   
                for($i=1; $i <= $totalPaginas; $i++){
                    if($i == $pagina){
                        echo '<li class="pageSelected">'.$i.'</li>';
                    }
                }

                if($pagina != $totalPaginas){

                
            ?>

                <li><a href="?pagina=<?php echo $pagina+1; ?>&busqueda=<?php echo $busqueda; ?>">>></a></li>
                <?php
                    }
                ?>
            </ul>
        </div>
    <?php  } ?>
    </div>
<script type="text/javascript" src="codeMain.js"></script>
<script type="text/javascript" src="codeClientes.js"></script>
</body>
</html>