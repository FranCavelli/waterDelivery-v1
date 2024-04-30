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
<link rel="stylesheet" type="text/css" href="stylesRevendedores.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-briefcase"></i> Revendedores</div>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
                <div class="tarjeta">
                    <form action="php/crud/saveRevendedor.php" method="POST">
                        <div class="form-group">
                            <input type="text" placeholder="Codigo" name="idRevendedor" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <input type="number" placeholder="Saldo" name="saldo" required>
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="x20" name="x20" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=1";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="x12" name="x12" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=2";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="x5" name="x5" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=3";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="Soda" name="Soda" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=4";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="AlqFC" name="alqfc" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=5";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="Dispenser" name="disp"  value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=6";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="Canilla" name="cani" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=7";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="Etiquetas" name="etiq" value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=8";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                        <div class="form-group2">
                            <input type="number" placeholder="Envases nuevos" name="env"  value="<?php $sqlRevendedoresprecio = "SELECT * FROM productos WHERE id=9";
    $resultRevendedoresprecio = $conexion->query($sqlRevendedoresprecio); $rowRevendedoresprecio = $resultRevendedoresprecio->fetch_assoc(); echo $rowRevendedoresprecio['precioRevendedores'] ;
     ?>">
                        </div>
                            <input type="submit" class="boton-submit-cliente" name="saveRevendedor" value="Guardar revendedor">
                    </form>
                </div>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">Codigo</th>
                                <th>Nombre</th>
                                <th>Saldo</th>
                                <th>x20</th>
                                <th>x12</th>
                                <th>x5</th>
                                <th>Soda</th>
                                <th>Alq F/C</th>
                                <th>Disp</th>
                                <th>Cani</th>
                                <th>Etiq</th>
                                <th>Env</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_revendedores FROM `revendedores`");
                                $resultreven = mysqli_fetch_array($sql_register);
                                $totalClientes = $resultreven['total_revendedores'];

                                $porPagina = 20;

                                if(empty($_GET['pagina'])){
                                    $pagina = 1;
                                }else{
                                    $pagina = $_GET['pagina'];

                                }
                                $desde = ($pagina-1) * $porPagina;
                                $totalPaginas = ceil($totalClientes / $porPagina);

                                $query = "SELECT * FROM revendedores ORDER BY idrevendedor ASC LIMIT $desde,$porPagina";
                                $resultado_tareas = mysqli_query($conexion, $query);
                                

                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr>
                                    <td class="codigoClienteTabla"><?php echo $row['idRevendedor']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['saldo']; ?></td>
                                    <td>$<?php echo $row['x20']; ?></td>
                                    <td>$<?php echo $row['x12']; ?></td>
                                    <td>$<?php echo $row['x5']; ?></td>
                                    <td>$<?php echo $row['Soda']; ?></td>
                                    <td>$<?php echo $row['alqfc']; ?></td>
                                    <td>$<?php echo $row['disp']; ?></td>
                                    <td>$<?php echo $row['cani']; ?></td>
                                    <td>$<?php echo $row['etiq']; ?></td>
                                    <td>$<?php echo $row['env']; ?></td>
                                    <td>
                                        <a onclick="AlertarEliminar(<?php echo $row['id']; ?>);" class="botonEliminar"><i class="fa-solid fa-trash-can"></i></a>
                                        <a href="verRevendedoresBoton.php?id=<?php echo $row['idRevendedor'] ?>" class="botonVer"><i class="fa-solid fa-eye"></i></a>
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
<script src="ajaxRevendedores.js"></script>
</body>
</html>