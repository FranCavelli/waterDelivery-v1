//CONFIRMAR ELIMINAR//
function AlertarEliminar(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a este cliente?",
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
        url: "php/crud/deleteTask.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Cliente eliminado correctamente'
            }).then((result) => {
                window.location.href = "php/crud/deleteTask.php?id="+codigo;
            });
        },
    });
}

//CONFIRMAR ELIMINAR//
//2//
function AlertarEliminarVerBoton(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a este registro?",
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
        url: "eliminarClienteRestar.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Registro eliminado correctamente'
            }).then((result) => {
                window.location.href = "eliminarClienteRestar.php?id="+codigo;
            });
        },
    });
}
//3//
function AlertarEliminarVerBotonBuscar(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar a este registro?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_php3(codigo);
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha eliminado'
            });
        }
      })
}

function mandar_php3(codigo){
    parametros = { codigo };
    $.ajax({
        data: parametros,
        url: "eliminarClienteRestar.php",
        type: "GET",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Registro eliminado correctamente'
            }).then((result) => {
                window.location.href = "eliminarClienteRestar.php?id="+codigo;
            });
        },
    });
}
