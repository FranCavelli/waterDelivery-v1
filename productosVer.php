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
<link rel="stylesheet" type="text/css" href="stylesProductos.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-box-open"></i> Ver productos</div>
        <div class="row" style="margin-left:-40px;">
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">Codigo</th>
                                <th>Nombre</th>
                                <th>Precio unitario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_productos FROM `productos`");
                                $resultProductos = mysqli_fetch_array($sql_register);
                                $totalProductos = $resultProductos['total_productos'];

                                $porPagina = 20;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalProductos / $porPagina);

                                $query = "SELECT * FROM productos ORDER BY idProducto ASC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['idProducto']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['precioUnitario']; ?></td>
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