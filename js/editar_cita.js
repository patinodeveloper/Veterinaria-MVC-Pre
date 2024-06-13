$(document).ready(function() {
    // evento de clic en el botón "Editar Cita"
    $('.editarCitaBtn').click(function() {
        var citaId = $(this).data('cita-id');
        var fecha = $(this).closest('tr').find('td:eq(0)').text();
        var hora = $(this).closest('tr').find('td:eq(1)').text();
        var servicioActual = $(this).closest('tr').find('td:eq(6)').text(); 
        var observaciones = $(this).closest('tr').find('td:eq(7)').text();
    
        $('#fechaCitaEditar').val(fecha);
        $('#horaCitaEditar').val(hora);
         // Mostrar el servicio actual en el campo de texto
        $('#servicioActualCita').val(servicioActual);
        $('#observacionesCitaEditar').val(observaciones);
    
        $('#guardarCambiosBtn').data('cita-id', citaId);
    });

    // Evt de clic en el botón "Guardar Cambios"
    $('#guardarCambiosBtn').click(function() {
        // Obtener los datos del form de edición
        var citaId = $(this).data('cita-id');
        var fecha = $('#fechaCitaEditar').val();
        var hora = $('#horaCitaEditar').val();
        var servicio = $('#servicioCitaEditar').val(); // Obtener el valor seleccionado del select
        var observaciones = $('#observacionesCitaEditar').val();

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: '../models/actualizar_cita.php',
            data: {
                id: citaId,
                fecha: fecha,
                hora: hora,
                servicio: servicio,
                observaciones: observaciones
            },
            success: function(response) {
                // funciona ...
                alert("La cita se actualizó correctamente.");
                console.log(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                // errorrr
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });
});

