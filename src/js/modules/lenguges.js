$(document).ready(function() {
    $(".dropdown-content button").click(function() {
        $(".dropdown-content button").removeClass("selected");
        $(this).addClass("selected");
    });

    $("#esHome").addClass("selected");
});