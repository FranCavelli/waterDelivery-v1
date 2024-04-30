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

    if(isset($_GET['id'])) {
        $idCliente = $_GET['id'];
        $pagina = $_GET['pagina'];

        $queryBuscar = "SELECT * FROM clientes WHERE id='$idCliente'";
        $resultadoBuscar = mysqli_query($conexion, $queryBuscar);
        if(mysqli_num_rows($resultadoBuscar) > 0){
            $row = mysqli_fetch_array($resultadoBuscar);
            $numeroClienteMomento = $row['numeroCliente']; //10
            $reparto = $row['reparto'];
        }

        $query="SELECT * FROM clientes WHERE numeroCliente < '$numeroClienteMomento'  ORDER BY numeroCliente DESC LIMIT 1"; //Me da el de arriba
        $resultado = mysqli_query($conexion, $query);
        if(mysqli_num_rows($resultado) > 0){
            $row = mysqli_fetch_array($resultado);
            $idClienteDeseado = $row['id']; //5
            $numeroClienteDeseado = $row['numeroCliente']; //5

            $numeroClienteMediador = $numeroClienteMomento;  //10

            $numeroClienteMomento = $numeroClienteDeseado; //5

            $numeroClienteDeseado = $numeroClienteMediador;  //10

            $queryMomento = "UPDATE clientes SET numeroCliente='$numeroClienteMomento' WHERE id='$idCliente'";
            $resultadoMomento= mysqli_query($conexion, $queryMomento);
    
            $queryDeseado = "UPDATE clientes SET numeroCliente='$numeroClienteDeseado' WHERE id='$idClienteDeseado'";
            $resultadoDeseado= mysqli_query($conexion, $queryDeseado);
    
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
        }

    }else{
        echo '
            <script>
                alert("Error");
            </script>
        ';
    }

    
?>