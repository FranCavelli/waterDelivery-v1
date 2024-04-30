<html>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="ajax.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

    include('php/conexion_be.php');

    if(isset($_POST['id'])){
        $id = $_POST['id'];
    }else{
        die('query fail');
    }

    $query = "DELETE FROM gastos WHERE id=$id";
    $result = mysqli_query($conexion, $query);



    
?>