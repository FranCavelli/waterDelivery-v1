<?php 

    include("php/conexion_be.php");

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

    if(isset($_GET['idCliente'])) {
        $idCliente = $_GET['idCliente'];
        $pagina = $_GET['pagina'];

        $codigoDeseado = $_GET['codigoDeseado'];

        $queryBuscar = "SELECT * FROM clientes WHERE id='$idCliente'";
        $resultadoBuscar = mysqli_query($conexion, $queryBuscar);
        if(mysqli_num_rows($resultadoBuscar) > 0){
            $row = mysqli_fetch_array($resultadoBuscar);
            $numeroClienteMomento = $row['numeroCliente']; //10
            $reparto = $row['reparto'];
        }

        $queryBuscarDeseado = "SELECT * FROM clientes WHERE numeroCliente='$codigoDeseado'";
        $resultadoBuscarDeseado = mysqli_query($conexion, $queryBuscarDeseado);
        if(mysqli_num_rows($resultadoBuscarDeseado) > 0){
            $row = mysqli_fetch_array($resultadoBuscarDeseado);
            $idClienteDeseado = $row['id']; //10
        }else{
            die(header("location: reparto.php"));
        }

            $numeroClienteMediador = $numeroClienteMomento;  //10

            $numeroClienteMomento = $codigoDeseado; //5

            $codigoDeseado = $numeroClienteMediador;  //10
            
            $query = "UPDATE clientes SET numeroCliente='$numeroClienteMomento' WHERE id='$idCliente'";
            $result= mysqli_query($conexion, $query);

            $query = "UPDATE clientes SET numeroCliente='$codigoDeseado' WHERE id='$idClienteDeseado'";
            $result= mysqli_query($conexion, $query);

            if($reparto=="Viernes"){
                header("Location: repartoVierness.php?pagina=".$pagina);
            }else if($reparto=="Javier jueves"){
                header("Location: repartoJavierJueves.php?pagina=".$pagina);   
            }else if($reparto=="Javier sabado"){
                header("Location: repartoJavierSabado.php?pagina=".$pagina);   
            }else if($reparto=="Viernes otro"){
                header("Location: repartoViernesOtro.php?pagina=".$pagina);   
            }else if($reparto=="Ex gagliano"){
                header("Location: repartoExGagliano.php?pagina=".$pagina);   
            }else{
                header("Location: reparto".$reparto.".php?pagina=".$pagina);
            }


    }else{
        echo '
            <script>
                alert("Error");
            </script>
        ';
    }

    
?>