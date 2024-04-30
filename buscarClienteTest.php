<?php
    include("php/conexion_be.php");
    include("php/fecha_be.php");

    session_start();

    $search = $_POST['search'];
    if(!empty($search)){
    $query = "SELECT * FROM clientes WHERE nombreCliente LIKE '$search%'";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die('Error'. mysqli_error($conexion));
    }
    $json = array();
    while($row = mysqli_fetch_array($result)) {
      $json[] = array(
        'nombre' => $row['nombreCliente'],
        'direccion' => $row['direccionCliente'],
        'id' => $row['id']
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
  }
?>