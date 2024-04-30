<?php

require('conexion_be.php');

$sql = "UPDATE clientes SET pasado=0 WHERE pasado=1";
$result = mysqli_query($conexion, $sql); 


?>