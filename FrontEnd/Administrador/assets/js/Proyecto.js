JSON.parse = JSON.parse || function(str) {
    if (str === "")
        str = '""';
    eval("var p=" + str + ";");
    return p;
};
//ver

var arregloFunciones = ["Diseño de pagina web", "Tienda en linea", "Aplicacion móvil", "Diseño de Logotipo", "Diseño de Imagen Corporativa"]; // arreglo para  mostrar los de partamentos 
var bandera = 0;
$(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios



    $("#buscar").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table1 tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });


    function getProyectos() {

        $.ajax({

            url: "http://localhost/estadia/Backend/Proyecto.php/proyectos",
            type: "get",
            success: function(response) {
                $.each(JSON.parse(response), function(i, index) {

                    if (index.idProyecto.length) {


                        if (index.Empresa_idEmpresa == null) {
                            $("#table2").append("<tr><td>" + index.NombreProyecto + "</td>" +
                                "<td id='NombreTabla'>" + arregloFunciones[index.Tipo - 1] + "</td>" +
                                "<td>" + index.FechaEntrega + "</td>" +
                                "<td>" + index.Empresa_idEmpresa + "</td>" +
                                "<td><span type='button'  data-dismiss='modal' class='delete btn btn-outline-success' data-proyecto='" + index.idProyecto + "'>Seleccionar</span></td>" +
                                "</tr>"

                            );
                        }

                    }

                });

                $(".delete").unbind("click").click(function() {
                    var $idProyecto = $(this).data("proyecto");
                    $("#idProyecto").val($idProyecto);


                });

            }

        });
    }

    $.ajax({

        url: "http://localhost/estadia/Backend/Empresa.php/empresas",
        type: "get",
        success: function(response) {
            $.each(JSON.parse(response), function(i, index) {

                if (index.idEmpresa.length) {

                    if (index.TipoUsuario_idUsuario == "2") { // campo que solo llena los campos con usuario y la tabla empresa
                        $("#table1").append("<tr><td>" + index.NombreEmpresa + "</td>" +
                            "<td id='NombreTabla'>" + index.Nombre + "</td>" +
                            "<td>" + index.Telefono + "</td>" +
                            "<td>" + index.Email + "</td>" +
                            "<td><span type='button'  data-dismiss='modal' class='delete2 btn btn-outline-success' data-tipo='" + index.idEmpresa + "'>Seleccionar</span></td>" +
                            "</tr>"

                        );
                    }


                }

            });

            $(".delete2").unbind("click").click(function() {
                var $idEmpresa = $(this).data("tipo");
                $(".alert").alert('close');
                $("#Empresa").val($idEmpresa);


            });


        }
    });


    getProyectos();


});
//funcion para el model

$("#myBtn4").click(function() {
    $("#myModal").modal({
        backdrop: "static"
    });
});



// funcion de navegaacion

$(".nav-tabs a").click(function() {
    $(this).tab('show');
});



//Guardar datos en la base de datos el crud de proyecto




function postdata() {
    $("#form1").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/estadia/backend/Proyecto.php/proyecto",
            type: "post",

            data: {

                NombreProyecto: $("#nombreproyecto").val(),
                FechaEntrega: $("#fechaentrega").val(),
                Nota: $("#nota").val(),
                Tipo: $("#tipo").val()



            },
            success: function(response) { // campos necesarios para la ejecución

                swal("Registro  exitoso", "Nueva Empresa agregado", "success");
                document.getElementById("form1").reset();


            },
            error: function(xhr, ajaxOptions, thrownError) {
                swal("Registro no exitoso", "Contacta con soporte", "error");

            }


        });
        return false;

    });
}

// funcion actualizar



function putdata() {
    $("#formproyecto").submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: "http://localhost/estadia/backend/Proyecto.php/proyecto/" + $("#idProyecto").val(),
            type: "put",

            data: {

                Empresa_idEmpresa: 4



            },
            success: function(response) { // campos necesarios para la ejecución

                swal("Actualizacion correcta", "Se asigno la empresa", "success");
                document.getElementById("formproyecto").reset();


            },
            error: function(xhr, ajaxOptions, thrownError) {
                swal("Registro no exitosnnno", "Contacta con soporte", "error");

            }


        });
        return false;

    });
}