$(document).ready(function(){
    console.log('Jquery is working');
    fetchGastos();
    $('#form-Gastos').submit(function(e){
        const postData = {
            nombre: $('#nombre').val(),
            costo: $('#costo').val() 
        };
        $.post('añadirGasto.php', postData, function(response) {
            fetchGastos();
            $('#form-Gastos').trigger('reset');
        });
        e.preventDefault();
    });
    
    function fetchGastos(){       
        $.ajax({
            url: 'añadirGastoListar.php',
            type: 'GET',
            success: function (response){
                var gastos = JSON.parse(response);
                var template = '';
                gastos.forEach(gasto => {
                    template += `
                    <tr gastoId="${gasto.id}">
                        <td class="invisible">${gasto.id}</td>
                        <td>${gasto.nombre}</td>
                        <td>${gasto.costo}</td>
                        <td>${gasto.fecha}</td>
                        <td><a class="eliminarGasto botonEliminar" onclick="AlertarEliminar(${gasto.id});"><i class="fa-solid fa-trash-can"></i>Eliminar</a></td>
                    </tr>
                    `
                });
                $('#gastosAñadirTotales').html(template);
            }
        });
    } 

});
//CONFIRMAR ELIMINAR//
function AlertarEliminar(codigo){
    Swal.fire({
        icon: 'warning',
        title: '¿Estás seguro?',
        text: "¿Deseas eliminar esto?",
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
    parametros = { id: codigo };
    $.ajax({
        data: parametros,
        url: "eliminarGasto.php",
        type: "POST",
        beforeSend: function() {},
        success: function() {
            Swal.fire({
                icon: 'success',
                title: '¡Eliminado!',
                text: 'Se ha eliminado correctamente'
            }).then((result) => {
                window.location.href = "gastos.php"
            });
            
        },
    });
}

//CONFIRMAR ELIMINAR//