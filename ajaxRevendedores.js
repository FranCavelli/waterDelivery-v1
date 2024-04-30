//CONFIRMAR ELIMINAR//
function AlertarEliminar(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a este revendedor?",
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
        url: "php/crud/deleteRevendedor.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Revendedor eliminado correctamente'
            }).then((result) => {
                window.location.href = "php/crud/deleteRevendedor.php?id="+codigo;
            });
        },
    });
}

//CONFIRMAR ELIMINAR//

function AlertarEliminar2(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a este registro de revendedor?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_php2(codigo);
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha eliminado'
            });
        }
      })
}

function mandar_php2(codigo){
    parametros = { codigo };
    $.ajax({
        data: parametros,
        url: "eliminarRevendedorRestar.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Registro eliminado correctamente'
            }).then((result) => {
                window.location.href = "eliminarRevendedorRestar.php?id="+codigo;
            });
        },
    });
}
