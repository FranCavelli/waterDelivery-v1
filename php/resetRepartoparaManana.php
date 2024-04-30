<?php

require('conexion_be.php');

$sql = "UPDATE clientes SET pasado=0, paraManana=1 WHERE paraManana=2";
$result = mysqli_query($conexion, $sql); 


?>