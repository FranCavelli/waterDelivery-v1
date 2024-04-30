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

    if(date("H")>=21 & $idUser!="Oficina"){
        echo '
            <script>
                alert("Horario no disponible.");
            </script>
        ';
        header("location: index.php");
        session_destroy();
        die();
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
        <div class="EditarClientesTitulo"><i class="fa-solid fa-address-book"></i> Ver clientes</div>
        <form action="buscarClienteVer.php" method="get" class="formSearch">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
            <input type="submit" value="Buscar" class="btnSearch">
        </form>
        <div class="row">
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

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_clientes FROM `clientes`");
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

                                $query = "SELECT * FROM clientes ORDER BY numeroCliente ASC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['numeroCliente']; ?></td>
                                    <td><?php echo $row['nombreCliente']; ?></td>
                                    <td><?php echo $row['direccionCliente']; ?></td>
                                    <td><?php echo $row['reparto']; ?></td>
                                    <td><?php echo $row['saldoAnteriorCliente']; ?></td>
                                    <td>
                                        <a href="clientesVerBotonVer.php?id=<?php echo $row['numeroCliente'] ?>" class="botonVer"><i class="fa-solid fa-eye"></i></a>
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