<?php

$rep = "SEGUIR ACA";

?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>

function guardarUbicacion() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;

      $.post("test.php", { latitude: latitude, longitude: longitude }, function(data) {
        console.log(data);
      });
    });
  } else {
    console.log("Geolocation is not supported by this browser.");
  }
}

guardarUbicacion();

</script>