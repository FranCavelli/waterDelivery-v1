<?php 
    
    session_start();

    include("php/conexion_be.php");
    include("php/navBar.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM clientes WHERE id = '$id'";
        $resultado = mysqli_query($conexion, $query);
        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_array($resultado);
            $numeroCliente = $row['numeroCliente'];
            $nombreCliente=$row['nombreCliente'];
            $direccionCliente = $row['direccionCliente'];
            $reparto = $row['reparto'];
            $cuadrante = $row['cuadrante'];
            $saldo = $row['saldoAnteriorCliente'];
            
        }
        if(!$resultado){
            die("Query Failed [deleteTask]");
        }
        //header("Location: ../../productosEditar.php");
    }

?>
<div class="fondoParaOscurecer"></div>
<div class="containerProductos" style="position:absolute;width:100%;">
    <div><p style="background:#fff;">Editar cliente</p>
        <form action="php/crud/guardarCambiosCliente.php" method="POST">
            <div class="ocultarElementos">
                <input class="ocultarElementos" type="text" value="<?php echo $id?>" name="id">
            </div>
            <div class="container__inputs"><a>Nuevo codigo:</a><br>
                <input type="text" placeholder="Nuevo codigo" name="codigonuevo" value="<?php echo $numeroCliente?>">
            </div>
            <div class="container__inputs"><a>Nuevo nombre:</a><br>
                <input type="text" placeholder="Nuevo nombre" name="nombrenuevo" value="<?php echo $nombreCliente?>">
            </div>
            <div class="container__inputs"><a>Nueva dirección:</a><br>
                <input type="text" placeholder="Nueva direccion" name="direccionnueva" value="<?php echo $direccionCliente?>">
            </div>
            <div class="container__inputs"><a>Nuevo saldo:</a><br>
                <input type="text" placeholder="Nuevo saldo" name="saldonuevo" value="<?php echo $saldo?>">
            </div>
            <div class="container__inputs"><a>Nuevo reparto:</a><br>
                <select name="repartonuevo" placeholder="Reparto" style="width:340px;color:#000;padding-bottom:5px;padding-top:5px;" required>
                        <option disabled selected style="color:#000;padding-bottom:5px;padding-top:5px;">Ninguno:</option>
                        <option <?php if($reparto=="Lunes"){ echo "selected";} ?> style="color:#000;padding-bottom:5px;padding-top:5px;" value="Lunes">1 - Lunes</option>
                        <option <?php if($reparto=="Lunes2"){ echo "selected";} ?> style="color:#000;padding-bottom:5px;padding-top:5px;" value="Lunes2">2 - Lunes(2)</option>
                        <option <?php if($reparto=="Ruta"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Ruta">3 - Ruta</option>
                        <option <?php if($reparto=="Martes"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Martes">4 - Martes</option>
                        <option <?php if($reparto=="Martes2"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Martes2">5 - Martes(2)</option>
                        <option <?php if($reparto=="Martes3"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Martes3">6 - Martes(3)</option>
                        <option <?php if($reparto=="Miercoles"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Miercoles">7 - Miercoles</option>
                        <option <?php if($reparto=="Ex gagliano"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Ex Gagliano">8 - Ex gagliano</option>
                        <option <?php if($reparto=="Jueves"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Jueves">9 - Jueves</option>
                        <option <?php if($reparto=="Jueves2"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Jueves2">10 - Jueves(2)</option>
                        <option <?php if($reparto=="Javier jueves"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Javier Jueves">11 - Jueves Javier</option>
                        <option <?php if($reparto=="Viernes"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Viernes">12 - Viernes</option>
                        <option <?php if($reparto=="Viernes2"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Viernes2">13 - Viernes(2)</option>
                        <option <?php if($reparto=="Viernes otro"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Viernes Otro">14 - Viernes otro</option>
                        <option <?php if($reparto=="Sabado"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Sabado">15 - Sabado</option>
                        <option <?php if($reparto=="Javier sabado"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Javier Sabado">16 - Sabado Javier</option>
                        <option <?php if($reparto=="Agustin"){ echo "selected";} ?>  style="color:#000;padding-bottom:5px;padding-top:5px;" value="Agustin">17 - Agustin</option>
                </select>
            </div>
            <div class="container__inputs"><a>Nuevo cuadrante:</a><br>
                <input type="number" placeholder="Nuevo cuadrante" name="cuadrantenuevo" value="<?php echo $cuadrante?>">
            </div>
                <input type="submit" class="boton-submit-productosN" name="guardarProductoCambios" value="Guardar cambios">
        </form>
    </div>
</div>