<?php


session_start();
if ($_SESSION["acceso"] != "2") {
    header("location:index.html");
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="assets/img/logo.png" class="img-fluid" alt="f" width="176" height="44">
                </a>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="inicio.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                        <hr class="sidebar-divider my-0" />
                        <a class="nav-link " href="Perfil.php">
                            <i class="fas fa-user-alt"></i><span>Perfil</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="Proyecto.php">
                            <i class="fas fa-window-restore"></i><span>Proyectos</span></a>

                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="Panelcomentario.php">
                            <i class="fas fa-comments"></i><span>Comentarios</span></a>
                        <hr class="sidebar-divider my-0" />
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ofertas.php"><i class="fas fa-bullhorn"></i><span>Ofertas</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Cotizacion.php"><i class="fas fa-file-invoice-dollar"></i><span>Cotizaciones</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <!-- fin de la navbar de lado derecho-->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-danger shadow mb-4 topbar static-top" style="background-color: rgb(255,255,255);">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="text-white d-none d-lg-inline mr-2 text-white small"><?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"]); ?></span><i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="http://localhost/estadia/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Muro</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Historial</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div class="form-group row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Matricula:</label>
                                        <div class="col-sm-4">
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo $_POST['variable']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                </div>
                            </div>

                            <div style="height:350px; overflow-x:hidden; overflow-y:scroll;">
                                <table class="table" id="table1">
                                    <!-- para crear el muro se inserta en una tabla -->

                                </table>
                            </div>


                            <form id="form1">
                                <!--poner link del formulario de php-->
                                <div class="form-row">


                                    <div class="form-group col-md-12">
                                        <label for="">Mensaje:</label>
                                        <textarea name="Mensaje" id="mensaje" class="form-control" placeholder="texto" required></textarea>
                                    </div>


                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="posticket()" class="btn btn-primary">Registrar</button>
                                    </div>

                                </div>
                            </form>

                            <div class="row">
                                <div class="col-md-6 align-self-center">

                                    <!-- Modal para encuentras de satisfacción -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Encuesta de
                                                        satisfacción</h5>
                                                    <!----------------------------------------------------------->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                 <!-- El formulario cuenta con el id para invocarlo en jquery -->
                                                    <form id="formEncuesta" action="http://localhost/estadia/Backend/Encuesta.php/encuesta" method="POST">
                                                        <!--Formulario para registrar encuesta-->
                                                        <div class="form-group col-md-3" style="display:none;">
                                                            <label for="">Ticket:</label>
                                                            <input type="text" class="form-control" name="TicketSoporte_Ticket" id="TicketSoporte_Ticket" disabled>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">¿Qué te pareció la
                                                                atención recibida?</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta1" id="inlineRadio1" value="3">
                                                                <label class="form-check-label" for="inlineRadio1">Bueno</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta1" id="inlineRadio2" value="2">
                                                                <label class="form-check-label" for="inlineRadio2">Regular</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta1" id="inlineRadio3" value="1">
                                                                <label class="form-check-label" for="inlineRadio3">Malo</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">¿El tiempo de respuesta por parte del agente de soporte fue rápido?</label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta2" id="inlineRadio4" value="3">
                                                                <label class="form-check-label" for="inlineRadio1">Bueno</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta2" id="inlineRadio5" value="2">
                                                                <label class="form-check-label" for="inlineRadio2">Regular</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta2" id="inlineRadio6" value="1">
                                                                <label class="form-check-label" for="inlineRadio3">Malo</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleFormControlSelect1">¿Volverías usar este medio de comunicación? </label><br>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta3" id="inlineRadio7" value="3">
                                                                <label class="form-check-label" for="inlineRadio1">Si</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta3" id="inlineRadio8" value="2">
                                                                <label class="form-check-label" for="inlineRadio2">Tal vez</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="Pregunta3" id="inlineRadio9" value="1">
                                                                <label class="form-check-label" for="inlineRadio3">No</label>
                                                            </div>
                                                        </div>
                                                       
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" id="enviar" class="btn btn-success">Enviar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">

                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Balabox 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
    <script>
        var myvar = <?php echo $_SESSION["idUsuario"]; ?>;
        var proyecto = <?php echo $_POST['variable']; ?>


        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //ver
        var proyectoPost = <?php echo $_POST['variable']; ?>

        $(document).ready(function() {



            function getMuro() {

                $.ajax({
                      // Paso de parametros para el url en esta caso el id del proyecto
                    url: "./../../Backend/TicketSoporte.php/muro/" + proyectoPost,
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (typeof index.Ticket !== "object" && index.Ticket.length) {


                                 // Instruccion para apilar containers para generar las tablas
                                $("#table1").append("<div class='media border p-3'> <div class='media-body'><h5>"+index.Nombre
                                +":<small><i>&nbsp;"+index.Fecha+"</i></small></h5><p>"+index.Comentario+"</p></div><br>",

                                    "<div class='media border p-3'> <div class='media-body'><h5>Soporte:<small><i>&nbsp;"
                                    +index.FechaDos+"</i></small></h5><p>" + index.ComentarioDos + "</p></div><br>"
                                );
 
                                // Condición si el status es cerrado se le despliega 
                                if (index.Status == "Cerrado"){

                                    $("#exampleModal").modal("show");
                                    $("#TicketSoporte_Ticket").val(index.Ticket);
                                    
                                }
       
                            } else { // Si la funcion no se cumple de todos modos se muestra el comentario
                                 //funcion vacia para atrapar el error en caso de no contener los datos
                                if (typeof index.Ticket === "object") {

                                }
                                 
                                $("#table1").append("<div class='media border p-3'> <div class='media-body'><h5>"+index.Nombre
                                +":<small><i>&nbsp;"+index.Fecha+"</i></small></h5><p>"
                                +index.Comentario+"</p></div><br>",

                                );
                            }

                        });

                    }

                });


            }
       
            getMuro();
        });


        function posticket() {
            $("#form1").submit(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajax({
                    url: "./../../Backend/ComentarioCliente.php/comentario",
                    type: "post",
                    data: {

                        Comentario: $("#mensaje").val(),
                        ///Imagen: $("#apellidom").val(),
                        Proyecto_idProyecto: proyecto,
                        FK_Usuario: myvar

                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Registro exitoso", "Comentario registrado", "success");
                        document.getElementById("form1").reset();
                       

                       
                        swal({
                                title: "Comentario registrado ",
                                text: "Espera a que el departamento de soporte conteste el mensaje",
                                icon: "success",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    location.reload();
                                } else {
                                    swal("Your imaginary file is safe!");
                                }
                            });



                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Registro no exitoso", "Contacta con soporte", "error");

                    }


                });


                return false;

            });

        }

         //Formulario para contestar encuesta de satisfación
        $("#formEncuesta").submit(function(e) {
            e.preventDefault();

            $.ajax({
                //Direccion del BackEnd pa resivir los datos
                url: "./../../Backend/Encuesta.php/encuesta",
                type: "post",
                data: {
                    //Validar el contenido que selecciono el usuario
                    Pregunta1:$('input[name=Pregunta1]:checked').val(),               
                    Pregunta2: $('input[name=Pregunta2]:checked').val(),
                    Pregunta3: $('input[name=Pregunta3]:checked').val(),
                    TicketSoporte_Ticket: $("#TicketSoporte_Ticket").val()
                },
                success: function(response) {
                     // Si es correcto cerrar el formulario 
                    $("#exampleModal").modal("hide");

                }

            });
            return false;

        });
    </script>
</body>

</html>