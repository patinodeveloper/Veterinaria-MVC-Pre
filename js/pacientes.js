$(document).ready(function() {
    
    $('#formAgregarPaciente').submit(function(e) {
        e.preventDefault();

        // Obtener los datos del formulario
        var formData = $(this).serialize() + '&accion=crear';

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_pacientes.php',
            data: formData,
            success: function(response) {
                alert(response); // Mostrar el mensaje de respuesta
                location.reload(); // Recargar la página después de agregar el paciente
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });

    // evento de clic en el botón "Editar Paciente"
    $('.editarPacienteBtn').click(function() {
        // Obtener los datos del pacient
        var pacienteId = $(this).data('id');
        var nombre = $(this).data('nombre');
        var especie = $(this).data('especie');
        var raza = $(this).data('raza');
        var edad = $(this).data('edad');
        var propietario = $(this).data('propietario');
        var telefono = $(this).data('telefono');
        var direccion = $(this).data('direccion');
        
        // mostrar ID (depuraicon)
        console.log("ID del Paciente:", pacienteId);
        
        // Mostrar el ID del paciente en la GUI
        $('#idPacienteMostrado').text("ID del Paciente: " + pacienteId);
        
        // pasar los valores al formulario de edición
        $('#idPacienteMostrado').val(pacienteId);
        $('#nombrePacienteEditar').val(nombre);
        $('#especiePacienteEditar').val(especie);
        $('#razaPacienteEditar').val(raza);
        $('#edadPacienteEditar').val(edad);
        $('#propietarioPacienteEditar').val(propietario);
        $('#telefonoPacienteEditar').val(telefono);
        $('#direccionPacienteEditar').val(direccion);
    });

    $('#formEditarPaciente').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize() + '&accion=actualizar';

        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_pacientes.php',
            data: formData,
            success: function(response) {
                console.log(response);
                alert(response);
                location.reload();
            },            
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });

    // evento de clic en el botón "Eliminar"
    $('.eliminarPacienteBtn').click(function() {
        var pacienteId = $(this).data('id');
        $('#eliminarPaciente').data('id', pacienteId);
    });

    // Confirmar la eliminación del paciente
    $('#eliminarPaciente').click(function() {
        var pacienteId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_pacientes.php',
            data: { id: pacienteId, accion: 'eliminar' },
            success: function(response) {
                alert(response);
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });

});