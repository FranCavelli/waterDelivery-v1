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

<link rel="stylesheet" type="text/css" href="stylesImprimir.css">
    <div class="container"><p><i class="fa-solid fa-print"></i> Imprimir Reparto</p>
        <form action="php/crud/imprimirRepartoAccion.php" method="POST" target="_blank">
            <div class="repartoDe">Reparto: 
                <select name="reparto" placeholder="Dia de reparto">
                    <option value="Lunes">1 - Lunes</option>
                    <option value="Ruta">2 - Ruta</option>
                    <option value="Martes">3 - Martes</option>
                    <option value="Martes(2)">4 - Martes(2)</option>
                    <option value="Miercoles">5 - Miercoles</option>
                    <option value="Ex gagliano">6 - Ex gagliano</option>
                    <option value="Jueves">7 - Jueves</option>
                    <option value="Javier jueves">8 - Jueves Javier</option>
                    <option value="Viernes">9 - Viernes</option>
                    <option value="Viernes otro">10 - Viernes otro</option>
                    <option value="Sabado">11 - Sabado</option>
                    <option value="Javier sabado">12 - Sabado Javier</option>
                    <option value="Agustin">13 - Agustin</option>
                    <option value="Todo">14 - Todo</option>
                    <option value="Cuadrante1">15 - Cuadrante 1</option>
                    <option value="Cuadrante2">16 - Cuadrante 2</option>
                    <option value="Cuadrante3">17 - Cuadrante 3</option>
                    <option value="Cuadrante4">18 - Cuadrante 4</option>
                </select>
            </div>
            <div class="repartoDe">
                Fecha: <input type="date" name="fecha" value="<?php echo $fecha_year; echo '-'; echo $fecha_mes; echo '-'; echo $fecha_dia?>">
            </div>
                <input type="submit" class="boton-imprimir-reparto" name="imprimirReparto" value="Imprimir Reparto">
        </form>

    </div>

<script type="text/javascript" src="codeMain.js"></script>
<script type="text/javascript" src="codeClientes.js"></script>
</body>
</html>