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
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesProductos.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-box-open"></i> Editar productos</div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjetaProductos">
                    <form action="php/crud/saveTaskProductos.php" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" name="idProducto" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Precio unitario" name="precioUnitario" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Precio revendedores" name="precioRevendedores" required>
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="saveTaskProductos" value="Guardar producto">
                    </form>
                </div>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead productoEstilo" >Codigo</th>
                                <th class="productoEstilo">Nombre</th>
                                <th class="productoEstilo">Precio unitario</th>
                                <th class="productoEstilo">Precio revendedores</th>
                                <th class="productoEstilo">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_procutos FROM `productos`");
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

                                $query = "SELECT * FROM productos ORDER BY idProducto ASC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['idProducto']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td><?php echo $row['precioUnitario']; ?></td>
                                    <td><?php echo $row['precioRevendedores']; ?></td>
                                    <td class="botonEditar">
                                        <a href="editarProducto.php?id=<?php echo $row['id'] ?>" class="botonEditar">Editar</a>
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
<script src="ajaxProductos.js"></script>
</body>
</html>