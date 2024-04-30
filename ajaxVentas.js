//CONFIRMAR ELIMINAR//
function AlertarEliminar(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a esta venta?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_php(codigo);
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha eliminado'
            });
        }
      })
}

function mandar_php(codigo){
    parametros = { codigo };
    $.ajax({
        data: parametros,
        url: "php/crud/deleteTaskVenta.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Venta eliminada correctamente'
            }).then((result) => {
                window.location.href = "php/crud/deleteTaskVenta.php?id="+codigo;
            });
        },
    });
}