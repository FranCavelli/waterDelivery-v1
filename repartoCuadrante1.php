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

    $sql = "SELECT nombreUsuario, nombreUsuario FROM usuarios WHERE nombreUsuario = '$idUser'";
    $result = $conexion->query($sql);
    $row = $result->fetch_assoc();
?>
<?php 
    include("php/navBar.php")
?>
<link rel="stylesheet" type="text/css" href="stylesReparto.css">
    <div class="container">
        <div class="EditarClientesTitulo"><i class="fa-solid fa-clipboard-list"></i> Reparto cuadrante 1</div>
        <form action="repartoBuscar.php" method="get" class="formSearch">
            <input type="text" name="busqueda" id="busqueda" placeholder="Buscar">
            <input type="submit" value="🔎" class="btnSearch" style="background:#A40AB9;">
        </form>
            <div class="tarjetaDeshacer2">
                <a onClick="AlertarDeshacerCuadrante()" class="deshacer"><i class="fa-solid fa-rotate-left"></i> Deshacer</a>
            </div>
            <select class="opcionesVerReparto" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="" selected disabled>Reparto</option>
              <option value="repartoLunes.php">Lunes</option>
              <option value="repartoMartes.php">Martes</option>
              <option value="repartoMiercoles.php">Miercoles</option>
              <option value="repartoExGagliano.php">Ex gagliano</option>
              <option value="repartoJavierJueves.php">Javier jueves</option>
              <option value="repartoVierness.php">Viernes</option>
              <option value="repartoViernesOtro.php">Viernes otro</option>
              <option value="repartoSabado.php">Sabado</option>
              <option value="repartoJavierSabado.php">Javier sabado</option>
              <option value="repartoAgustin.php">Agustin</option>
            </select>
            <select class="opcionesVerReparto" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
              <option value="" selected disabled>Cuadrante</option>
              <option value="repartoCuadrante1.php">1</option>
              <option value="repartoCuadrante2.php">2</option>
              <option value="repartoCuadrante3.php">3</option>
              <option value="repartoCuadrante4.php">4</option>
            </select>
        <div class="row">
            <div class="col-md-4">
                <?php if(isset($_SESSION['message'])){ ?>
                <?php session_unset(); } ?>
            </div>
            <div class="tarjetaDeshacer">
                <a onClick="AlertarDeshacerCuadrante()" class="deshacer"><i class="fa-solid fa-rotate-left"></i><br>Deshacer</a>
            </div>
            <div class="columna8">
                    <table>
                        <thead>
                            <tr>
                                <th class="codigoClienteTablaHead">Codigo</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Saldo total</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 

                                $sql_register = mysqli_query($conexion, "SELECT COUNT(*) as total_clientes FROM `clientes` WHERE cuadrante='1'");
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

                                $query = "SELECT * FROM clientes WHERE cuadrante='1' ORDER BY SUBSTRING(direccionCliente, -4)*1 ASC LIMIT $desde,$porPagina";
                                
                                $resultado_tareas = mysqli_query($conexion, $query);
                                
                                while($row = mysqli_fetch_array($resultado_tareas)){?>
                            
                                <tr <?php if($row['paraManana']=="Si"){
                                    echo "class='clienteDeAyer'";
                                } ?> >
                                    <td class="codigoClienteTabla"><?php echo $row['numeroCliente']; ?></td>
                                    <td><?php echo $row['nombreCliente']; ?></td>
                                    <td><?php echo $row['direccionCliente']; ?></td>
                                    <td><?php echo $row['saldoAnteriorCliente']; ?></td>
                                    <td style="background:#0ab92a;">
                                        <a href="cargarClienteCuadrantes.php?id=<?php echo $row['id']?>&pagina=<?php echo $pagina ?>" class="botonEliminar">Cargar</a>
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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="ajaxReparto.js"></script>
</body>
</html>