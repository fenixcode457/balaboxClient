JSON.parse = JSON.parse || function (str) {
    if (str === "")
        str = '""';
    eval("var p=" + str + ";");
    return p;
};



//guardar
$(document).ready(function () {
    $("#form").submit(function (e) {


        $.ajax({
            url: "http://localhost/estadia/Backend/Tipousuario.php/departamento",
            type: "post",
            data: {
                Tipo_usuario: $("#departamento").val(),
                Descripcion: $("#descripcion").val()
            }

        })
            .done(function () {
                alert("èxito");
            })
            .fail(function () {
                alert("èxito");
            });

        return false;

    });
});


