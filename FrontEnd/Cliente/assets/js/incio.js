JSON.parse = JSON.parse || function(str) {
    if (str === "")
        str = '""';
    eval("var p=" + str + ";");
    return p;
};

$(document).ready(function() {


    $("#buscar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    function getCotizaciones() {

        $.ajax({

            url: "http://localhost/estadia/Backend/Cotizacion.php/cotizacion/" + idUsuario,
            type: "get",
            success: function(response) {
                $.each(JSON.parse(response), function(i, index) {

                    if (index.idCotizacion.length) {
                        $("#table1").append("<tr><td>" + index.TituloDelProyecto + "</td>" +
                            "<td>" + arregloFunciones[index.Servicio - 1] + "</td>" +
                            "<td><span type='button'  class='update btn btn-outline-primary' data-empresa='" + index.idCotizacion + "'>Actualizar</span></td>" +
                            "<td><span type='button'  class='delete btn btn-outline-danger' data-cotizacion='" + index.idCotizacion + "'>Eliminar</span></td>" +


                            "</tr>"


                        );

                    }

                });


            }

        });


    }

    getCotizaciones();


});