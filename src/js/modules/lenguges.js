$(document).ready(function() {
    $(".dropdown-content button").click(function() {
        $(".dropdown-content button").removeClass("selected");
        $(this).addClass("selected");
    });

    // Establecer el botón "esHome" como seleccionado por defecto
    $("#esHome").addClass("selected");
});