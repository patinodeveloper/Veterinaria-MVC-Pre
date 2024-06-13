$(document).ready(function() {
    $('#formAgregarProducto').submit(function(e) {
        e.preventDefault();

        // Obtener los datos del formulario
        var formData = $(this).serialize() + '&accion=crear';

        // Enviar los datos mediante AJAX
        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_productos.php',
            data: formData,
            success: function(response) {
                alert(response); 
                // Recargar la página después de agregar el producto
                location.reload(); 
            },
            error: function(xhr, status, error) {
                console.error(error);
                alert("Error al procesar la solicitud. Por favor, inténtelo de nuevo.");
            }
        });
    });

    // EVT de clic en el botón "Editar"
    $('.editarProductoBtn').click(function() {
        var productoId = $(this).data('id');
        var nombre = $(this).data('nombre');
        var descripcion = $(this).data('descripcion');
        var categoria = $(this).data('categoria');
        var precio = $(this).data('precio');
        var cantidad = $(this).data('cantidad');
        
        // Pasar valores al formulario de edición
        $('#productoId').val(productoId);
        $('#nombreProductoEditar').val(nombre);
        $('#descripcionProductoEditar').val(descripcion);
        $('#categoriaProductoEditar').val(categoria);
        $('#precioProductoEditar').val(precio);
        $('#cantidadProductoEditar').val(cantidad);
    });

    // form de edición
    $('#formEditarProducto').submit(function(event) {
        event.preventDefault();
        var formData = $(this).serialize() + '&accion=actualizar';

        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_productos.php',
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

    // Evt de clic en el botón "Eliminar"
    $('.eliminarProductoBtn').click(function() {
        var productoId = $(this).data('id');
        $('#confirmarEliminarProducto').data('id', productoId);
    });

    // Confirmar la eliminación del producto
    $('#confirmarEliminarProducto').click(function() {
        var productoId = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: '../controllers/gestor_productos.php',
            data: { id: productoId, accion: 'eliminar' },
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
