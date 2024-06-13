$(document).ready(function () {
    $('.insertarCitaBtn').click(function () {
        var pacienteId = $(this).data('id');
        var nombrePaciente = $(this).closest('tr').find('td').first().text();

        // id y nombre del paciente en el modal
        $('#pacienteId').val(pacienteId);
        $('#nombrePaciente').text(nombrePaciente);
        // mostrar modal
        $('#crearCitaModal').modal('show');
    });

    // Manejar el formulario de creación de cita
    $('#formCrearCita').submit(function (e) {
        e.preventDefault();

        // Obtener los datos del formulario y usar 'crear'
        var formData = $(this).serialize() + '&accion=crear';

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_citas.php',
            data: formData,
            success: function (response) {
                alert(response);
                location.reload();
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });

    });

    // $('#formEditarCita').submit(function(e) {
    //     e.preventDefault(); // Prevenir el comportamiento predeterminado del formulario

    //     // Obtener los datos del formulario y agregar la acción 'actualizar'
    //     var formData = $(this).serialize() + '&accion=actualizar';

    //     // Enviar los datos mediante AJAX
    //     $.ajax({
    //         type: 'POST',
    //         url: '../controllers/gestor_citas.php',
    //         data: formData,
    //         success: function(response) {
    //             alert(response); // Mostrar mensaje de éxito o error
    //             console.log(response);
    //             $('#editarCitaModal').modal('hide'); // Ocultar el modal después de guardar
    //             location.reload(); // Recargar la página para actualizar la tabla de citas
    //         },
    //         error: function(xhr, status, error) {
    //             // Mostrar el mensaje de error en la consola
    //             console.error("Error en la solicitud AJAX:");
    //             console.error(xhr);
    //             console.error(status);
    //             console.error(error);

    //             // Mostrar un mensaje de error al usuario
    //             alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
    //         }
    //     });
    // });

    // $('.editarCitaBtn').click(function () {
    //     var citaId = $(this).data('cita-id');
    //     var pacienteId = $(this).data('paciente-id');
    //     var fecha = $(this).data('fecha');
    //     var hora = $(this).data('hora');
    //     var servicioId = $(this).data('servicio-id');
    //     var observaciones = $(this).data('observaciones');

    //     $('#citaId').val(citaId); 
    //     $('#pacienteId').val(pacienteId);
    //     $('#fechaCitaEditar').val(fecha);
    //     $('#horaCitaEditar').val(hora); 
    //     $('#servicioCitaEditar').val(servicioId); 
    //     $('#observacionesCitaEditar').val(observaciones);

    //     // Mostrar el modal de edición de cita
    //     $('#editarCitaModal').modal('show');
    // });

    $('.eliminarCitaBtn').click(function () {
        // Obtener el ID de la cita a eliminar
        var citaId = $(this).data('cita-id');

        // Mostrar el modal (ventana) de confirmación antes de eliminar
        $('#eliminarCitaModal').modal('show');

        // Asignar el ID de la cita al botón de eliminar en el modal
        $('#confirmarEliminarCita').data('id', citaId);
    });

    // Confirmar la eliminación de la cita
    $('#confirmarEliminarCita').click(function () {
        var citaId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_citas.php',
            data: { id: citaId, accion: 'eliminar' },
            success: function (response) {
                alert(response);
                alert("La cita se ha eliminado exitosamente");
                 // Ocultar el modal
                $('#eliminarCitaModal').modal('hide');
                location.reload(); 
            },
            error: function (xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });
});
