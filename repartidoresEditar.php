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
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesRepartidores.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-truck"></i> Editar usuarios</div>
        <div class="row">
            <div class="col-md-4">
                    <?php if(isset($_SESSION['message'])){ ?>
                    <?php session_unset(); } ?>
                    <div class="tarjetaProductos">
                        <form action="php/crud/saveTaskUsuarios.php" method="POST">
                            <div class="form-group">
                                <input type="text" placeholder="Nombre" name="nombreUsuario" autofocus required>
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Contraseña" name="contrasena" required>
                            </div>
                            <div class="form-group">
                                <select name="Cargo" required>
                                    <option value="" disabled selected>Seleccione cargo</option>
                                    <option value="Vendedor">VENDEDOR</option>
                                    <option value="Repartidor">REPARTIDOR</option>
                                    <option value="Administrador">ADMINISTRADOR</option>
                                </select>
                            </div>
                            <br>
                                <input type="submit" class="boton-submit-cliente" name="saveTaskRepartidores" value="Crear usuario">
                        </form>
                    </div>
                </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">ID</th>
                                <th>Nombre</th>
                                <th>Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_registerUsuarios = mysqli_query($conexion, "SELECT COUNT(*) as total_usuarios FROM `usuarios`");
                                $resultUsuarios = mysqli_fetch_array($sql_registerUsuarios);
                                $totalUsuarios = $resultUsuarios['total_usuarios'];

                                $porPagina = 30;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalUsuarios / $porPagina);

                                $query = "SELECT * FROM usuarios ORDER BY id ASC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['nombreUsuario']; ?></td>
                                    <td><?php echo $row['cargo']; ?></td>
                                    <?php
                                        if($row['cargo']!="Administrador"){?>
                                    <td>
                                        <a onclick="AlertarEliminar(<?php echo $row['id']; ?>);" class="botonEliminar"><i class="fa-solid fa-trash-can"></i></a>
                                    </td>
                                <?php 
                                    }else{
                                    ?>
                                    <td>
                                        <a></a>
                                    </td>
                                   <?php }
                                    ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="ajaxUsuarios.js"></script>
</body>
</html>