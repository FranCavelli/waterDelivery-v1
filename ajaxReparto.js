//CONFIRMAR ELIMINAR//
function AlertarDeshacer(){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas deshacer esto?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_php();
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha deshecho'
            });
        }
      })
}

function mandar_php(){
    $.ajax({
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Deshecho!',
                text: 'Deshecho correctamente'
            }).then((result) => {
                window.location.href = "deshacerReparto.php";
            });
            
        },
    });
}

function AlertarDeshacerSeparado(){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas deshacer esto?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_phpSeparado();
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha deshecho'
            });
        }
      })
}

function mandar_phpSeparado(){
    $.ajax({
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Deshecho!',
                text: 'Deshecho correctamente'
            }).then((result) => {
                window.location.href = "deshacerRepartoSeparado.php";
            });
            
        },
    });
}

function AlertarDeshacerCuadrante(){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas deshacer esto?",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '✔',
        cancelButtonText: 'X'
      }).then((result) => {
        if (result.isConfirmed) {
            mandar_phpCuadrante();
        }else if(result.isDismissed){
            Swal.fire({
                icon: 'error',
                title: 'No se ha deshecho'
            });
        }
      })
}

function mandar_phpCuadrante(){
    $.ajax({
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Deshecho!',
                text: 'Deshecho correctamente'
            }).then((result) => {
                window.location.href = "deshacerRepartoCuadrante.php";
            });
            
        },
    });
}

//CONFIRMAR ELIMINAR//

var botonañadir = document.getElementsByClassName('añadirGastoRepartidorBoton')[0],
    añadirForm = document.getElementsByClassName('añadirGastoRepartidor')[0],
    contadorClicksBotonGastos = 0;
    
function añadirgastoRepartidor() {
    if(contadorClicksBotonGastos==0){
        añadirForm.style.display="block";
        contadorClicksBotonGastos = 1;
    }else{
        añadirForm.style.display="none";
        contadorClicksBotonGastos = 0;
    }
}

botonañadir.addEventListener('click', añadirgastoRepartidor);    