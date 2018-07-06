$("#formulario").submit(function(event) {
    //Almacena los datos sin refrescar el sitio web
    event.preventDefault();
    enviar();
});

function enviar() {
    //Toma los datos "name" y los lleva a un arreglo
    var datos = $("#formulario").serialize();
    console.log(datos);

    $.ajax({
        type: "post",
        url: "formulario.php",
        data: datos,
        success: function(texto) {
            if (texto == "exito") {
                correcto();
            } else {
                phperror(texto);
            }
        }
    });
}

function correcto() {
    $("#mensajeExito").removeClass("d-none");
    $('#mensajeError').addClass("d-none");
}

function phperror(texto) {
    $("#mensajeError").removeClass("d-none");
    $("#mensajeExito").addClass("d-none");
    $("#mensajeError").html(texto);
}