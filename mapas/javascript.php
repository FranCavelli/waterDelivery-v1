<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Aguas Del Parque</title>
</head>
<body>
    <div id="map"></div>
<?php
    require('../php/conexion_be.php');

    $query = "SELECT * FROM usuarios";
    $result = mysqli_query($conexion,$query);

?>
<script>
    function iniciarMap() {
        var coord = {lat: -34.8683605 ,lng: -61.5296207};
        var map = new google.maps.Map(document.getElementById('map'),{
            zoom: 14,
            center: coord
        });
        <?php while ($row = @mysqli_fetch_assoc($result)){ ?>
        var marker<?php echo $row['nombreUsuario']; ?> = new google.maps.Marker({
            position: {<?php echo "lat: ".$row['lat']." ,lng: ".$row['lng'] ?>},
            clickable: true,
            optimized: true,
            map: map,
            labelClass: "labels",
            icon: "<?php if($row['nombreUsuario']=="Oficina"){
                    echo "../media/factory.png";
                    }else{ echo "../media/car.png";}?>"
        });
        var contentString<?php echo $row['nombreUsuario']; ?> =
        '<div id="content">' +
        '<h1 id="firstHeading" class="firstHeading"><?php echo $row['nombreUsuario'] ?></h1>' +
        '<div id="bodyContent">' +
        "<p> <?php echo $row['cargo'] ?> </p>" +
        "</div>" +
        "</div>";

    var infowindow<?php echo $row['nombreUsuario']; ?> = new google.maps.InfoWindow({
        content: contentString<?php echo $row['nombreUsuario']; ?>,
        ariaLabel: "Uluru",
    });
    marker<?php echo $row['nombreUsuario']; ?>.addListener("click", () => {
    infowindow<?php echo $row['nombreUsuario']; ?>.open({
      anchor: marker<?php echo $row['nombreUsuario']; ?> ,
      map,
    });
  });
<?php } ?>
    }
    
</script>
</body>
</html>
<script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMap"
defer></script>
