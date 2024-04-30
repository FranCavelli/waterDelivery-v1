<?php

    include("../conexion_be.php");

    if(isset($_POST['saveTask'])){
        $codigoCliente = $_POST['numeroCliente'];
        $nombreCliente = $_POST['nombreCliente'];
        $direccionCliente = $_POST['direccionCliente'];
        $saldoAnteriorCliente = $_POST['saldoAnteriorCliente'];
        $reparto = $_POST['reparto'];
        $reparto2 = $_POST['reparto2'];
        
        if($saldoAnteriorCliente==""){
            $saldoAnteriorCliente="0";
        }
        
        if($reparto=="Ruta"OR"Lunes"){
            $repartoDia="Lunes";
        }else if($reparto=="Martes"){
            $repartoDia="Martes";
        }else if($reparto=="Miercoles"OR"Ex Gagliano"){
            $repartoDia="Miercoles";
        }else if($reparto=="Jueves"OR"Javier jueves"){
            $repartoDia="Jueves";
        }else if($reparto=="Viernes"OR"Viernes otro"){
            $repartoDia="Viernes";
        }else if($reparto=="Sabado"OR"Javier Sabado"OR"Agustin"){
            $repartoDia="Sabado";
        }

        $paraManana = $repartoDia;
        
        if(str_contains(strtolower($direccionCliente), 'san martin')OR str_contains(strtolower($direccionCliente), 'uriburu') OR str_contains(strtolower($direccionCliente), 'estrada') OR str_contains(strtolower($direccionCliente), 'posadas')OR str_contains(strtolower($direccionCliente), 'tedin')OR str_contains(strtolower($direccionCliente), 'rodriguez')OR str_contains(strtolower($direccionCliente), 'san lorenzo')OR str_contains(strtolower($direccionCliente), 'cementerio')OR str_contains(strtolower($direccionCliente), 'chiquilo')OR str_contains(strtolower($direccionCliente), 'fioretta')OR str_contains(strtolower($direccionCliente), 'los olmos')OR str_contains(strtolower($direccionCliente), 'los aromos')OR str_contains(strtolower($direccionCliente), 'tucuman')OR str_contains(strtolower($direccionCliente), 'obligado')OR str_contains(strtolower($direccionCliente), 'andrade')OR str_contains(strtolower($direccionCliente), 'spano')OR str_contains(strtolower($direccionCliente), 'newbery')OR str_contains(strtolower($direccionCliente), 'suipacha')OR str_contains(strtolower($direccionCliente), 'neuvery')OR str_contains(strtolower($direccionCliente), 'lavalle')OR str_contains(strtolower($direccionCliente), 'sarfield')OR str_contains(strtolower($direccionCliente), 'valle')OR str_contains(strtolower($direccionCliente), 'moreno')OR str_contains(strtolower($direccionCliente), 'massey')OR str_contains(strtolower($direccionCliente), 'tuñon')OR str_contains(strtolower($direccionCliente), 'luis')OR str_contains(strtolower($direccionCliente), 'vigilancia')OR str_contains(strtolower($direccionCliente), 'formosa')){
            $cuadrante = "1";
        }else if(str_contains(strtolower($direccionCliente), 'mayo')OR str_contains(strtolower($direccionCliente), 'urquiza')OR str_contains(strtolower($direccionCliente), 'guemes')OR str_contains(strtolower($direccionCliente), 'rawson')OR str_contains(strtolower($direccionCliente), 'ituzaingo')OR str_contains(strtolower($direccionCliente), 'buchardo')OR str_contains(strtolower($direccionCliente), 'pirovano')OR str_contains(strtolower($direccionCliente), 'lopez')OR str_contains(strtolower($direccionCliente), 'fonavi')OR str_contains(strtolower($direccionCliente), 'arenales')OR str_contains(strtolower($direccionCliente), 'heras')OR str_contains(strtolower($direccionCliente), 'chacabuco')OR str_contains(strtolower($direccionCliente), 'villegas')OR str_contains(strtolower($direccionCliente), 'rodriguez')OR str_contains(strtolower($direccionCliente), 'tedin')OR str_contains(strtolower($direccionCliente), 'yrigoyen')OR str_contains(strtolower($direccionCliente), 'de oca')OR str_contains(strtolower($direccionCliente), 'peña')OR str_contains(strtolower($direccionCliente), 'pueyrredon')OR str_contains(strtolower($direccionCliente), 'sarmiento')){
            $cuadrante = "2";
        }else if(str_contains(strtolower($direccionCliente), 'alem')OR str_contains(strtolower($direccionCliente), 'rivadavia')OR str_contains(strtolower($direccionCliente), 'laprida')OR str_contains(strtolower($direccionCliente), 'saavedra')OR str_contains(strtolower($direccionCliente), 'surce')OR str_contains(strtolower($direccionCliente), 'tiseyra')OR str_contains(strtolower($direccionCliente), 'colon')OR str_contains(strtolower($direccionCliente), 'ayacucho')OR str_contains(strtolower($direccionCliente), 'salta')OR str_contains(strtolower($direccionCliente), 'ancalu')OR str_contains(strtolower($direccionCliente), 'ortega')OR str_contains(strtolower($direccionCliente), 'triunfo')OR str_contains(strtolower($direccionCliente), 'hernandez')OR str_contains(strtolower($direccionCliente), 'gutierrez')OR str_contains(strtolower($direccionCliente), 'almafuerte')OR str_contains(strtolower($direccionCliente), 'huergo')OR str_contains(strtolower($direccionCliente), 'balcarce')OR str_contains(strtolower($direccionCliente), 'ameghino')OR str_contains(strtolower($direccionCliente), 'paz')OR str_contains(strtolower($direccionCliente), 'pelegrini')OR str_contains(strtolower($direccionCliente), 'belgrano')OR str_contains(strtolower($direccionCliente), '9 de julio')){
            $cuadrante = "3";
        }else if(str_contains(strtolower($direccionCliente), 'mitre')OR str_contains(strtolower($direccionCliente), 'alvear')OR str_contains(strtolower($direccionCliente), 'avellaneda')OR str_contains(strtolower($direccionCliente), 'caseros')OR str_contains(strtolower($direccionCliente), 'brown')OR str_contains(strtolower($direccionCliente), 'bron')OR str_contains(strtolower($direccionCliente), 'broun')OR str_contains(strtolower($direccionCliente), 'mejia')OR str_contains(strtolower($direccionCliente), 'junta')OR str_contains(strtolower($direccionCliente), 'pringles')OR str_contains(strtolower($direccionCliente), 'viamonte')  OR str_contains(strtolower($direccionCliente), 'maipu')OR str_contains(strtolower($direccionCliente), 'guardia')OR str_contains(strtolower($direccionCliente), 'menarvino')OR str_contains(strtolower($direccionCliente), 'chañar')OR str_contains(strtolower($direccionCliente), 'chanar')OR str_contains(strtolower($direccionCliente), 'tiseyra')OR str_contains(strtolower($direccionCliente), 'saavedra')OR str_contains(strtolower($direccionCliente), 'drago')OR str_contains(strtolower($direccionCliente), 'cordoba')OR str_contains(strtolower($direccionCliente), 'alsina')OR str_contains(strtolower($direccionCliente), 'fuego')OR str_contains(strtolower($direccionCliente), 'alberdi')OR str_contains(strtolower($direccionCliente), 'alverdi')OR str_contains(strtolower($direccionCliente), 'santa cruz')OR str_contains(strtolower($direccionCliente), 'obrero')OR str_contains(strtolower($direccionCliente), 'cha?ar')OR str_contains(strtolower($direccionCliente), 'chubut')OR str_contains(strtolower($direccionCliente), 'hipolito'))
            $cuadrante = "4";
        }else{
            $cuadrante = "0";
        }
        

        $query = "INSERT INTO clientes(numeroCliente, nombreCliente, direccionCliente, saldoAnteriorCliente, reparto, reparto2, paraManana, repartoDia, cuadrante) 
        VALUES('$codigoCliente', '$nombreCliente', '$direccionCliente', '$saldoAnteriorCliente', '$reparto', '$reparto2', '$paraManana', '$repartoDia', '$cuadrante')";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado) {
            die("Query failed");
        }
            $_SESSION['message'] = 'Cliente guardado correctamente.';

            header("Location: ../../clientesEditar.php");
    

?>