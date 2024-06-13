$(document).ready(function() {
    // Función para cargar los servicios desde el servidor
    function cargarServicios() {
        $.ajax({
            type: 'GET',
            url: '../models/servicios.php',
            dataType: 'json',
            success: function(servicios) {
                // Llenar el campo de selección con los servicios obtenidos
                var selectServicios = $('#servicioCita, #servicioCitaEditar');
                selectServicios.empty(); // Limpiar opciones existentes
                selectServicios.append('<option value="">Seleccione un servicio</option>'); // Opción por defecto

                // Agregar cada servicio como una opción en el campo de selección
                $.each(servicios, function(index, servicio) {
                    selectServicios.append('<option value="' + servicio.id + '">' + servicio.nombre + '</option>');
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error al cargar los servicios. Por favor, inténtelo de nuevo.");
            }
        });
    }

    // Llamar a la función 
    cargarServicios();
});
