<?php

    include("../conexion_be.php");

    if(isset($_POST['guardarProductoCambios'])){
        $id = $_POST['id'];
        $codigonuevo = $_POST['codigonuevo'];
        $nombrenuevo = $_POST['nombrenuevo'];
        $direccionnueva = $_POST['direccionnueva'];
        $saldonuevo = $_POST['saldonuevo'];
        $repartonuevo = $_POST['repartonuevo'];
        $cuadrantenuevo = $_POST['cuadrantenuevo'];


        $query = "UPDATE clientes SET numeroCliente='$codigonuevo', nombreCliente='$nombrenuevo', direccionCliente='$direccionnueva', saldoAnteriorCliente='$saldonuevo', reparto='$repartonuevo', cuadrante='$cuadrantenuevo' WHERE id='$id'";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../clientesEditar.php");
    }

?>