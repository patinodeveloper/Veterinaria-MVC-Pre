$(document).ready(function() {
    // Obtener la URL actual de la página
    var url = window.location.pathname;
    // Obtener el nombre del archivo de la URL
    var filename = url.substring(url.lastIndexOf('/') + 1);

    // Iterar sobre los elementos de la barra de navegación
    $('.navbar-nav .nav-link').each(function() {
        // Obtener el valor del atributo href de cada enlace
        var href = $(this).attr('href');
        // Verificar si la URL de la página actual coincide con el valor del atributo href
        if (filename === href) {
            // Agregar la clase 'active' al elemento padre del enlace
            $(this).parent().addClass('active');
        }
    });
});
