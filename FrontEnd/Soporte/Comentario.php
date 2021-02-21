<?php


session_start();
if ($_SESSION["acceso"] != "3") {
    header('location:http://localhost/estadia/index.php');
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro usuario</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>





</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(255,255,255);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">

                    <img src="assets/img/logo.png" class="img-fluid" alt="f" width="176" height="44">

                </a>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="inicio.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                        <hr class="sidebar-divider my-0"><a class="nav-link" href="index.html"><i class="fas fa-user-alt"></i><span>Clientes</span></a>
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="Proyectos.php"><i class="fas fa-window-restore"></i><span>Proyectos</span></a>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" href="Panelcomentario.php">
                            <i class="fas fa-comments"></i><span>Comentarios</span></a>

                    </li>
                    <hr class="sidebar-divider my-0">
                    </li>

                    <li class="nav-item" role="presentation"><a class="nav-link" href="register.html"><i class="fas fa-sticky-note"></i><span>Tickets</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
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

                                <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="text-white dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="text-white d-none d-lg-inline mr-2 small"><?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"]); ?></span>
                                        <i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i>
                                    </a>
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Registrar comentario</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de registro de comentario.</p>
                        </div>
                        <div class="card-body">
                            <br>
                            <div style="height:350px; overflow-x:hidden; overflow-y:scroll;">
                                <table class="table" id="table1">
                                    <!-- para crear el muro se inserta en una tabla -->

                                </table>
                            </div>

                            <form id="form">
                                <!--poner link del formulario de php-->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Mensaje:</label>
                                        <textarea name="Mensaje" id="comentarioDos" class="form-control" placeholder="texto" required></textarea>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">id:</label>
                                        <input type='input' name="idComentario" id="idcomentario" class="form-control" placeholder="texto" disabled></textarea>
                                    </div>
                                    <br>

                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="postdata()" class="btn btn-primary">Registrar</button>
                                    </div>

                                </div>
                            </form>
                            <!--fin del formulario-->

                        </div>
                    </div>
                    <br>
                    <div class="card shadow" id="ocultar">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Asignar ticket de soporte.</p>
                        </div>
                        <div class="card-body">
                            <form id="form2">
                                <!--poner link del formulario de php-->
                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label for="">Status:</label>

                                        <select class="custom-select mr-sm-2" name="Status" id="status" required>
                                            <option value="Abierto">Abierto</option>
                                            <option value="Proceso">Proceso</option>
                                            <option value="Cerrado">Cerrado</option>
                                        </select>
                                    </div>
                                    <br>

                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="postdataticket()" class="btn btn-primary">Registrar</button>
                                    </div>

                                </div>
                            </form>
                            <!--fin del formulario-->
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
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //ver

        var test, ticketid;
        var myvar = <?php echo $_SESSION["idUsuario"]; ?>; //id del usuario que esta respondiendo el comentario
        var IDcomenatriocliente = "<?php echo $_POST['variable']; ?>"; // id del comentario del cliente que quiere responder
        var divisiones = IDcomenatriocliente.split(" "); // 
        var idcomentariotemp = new Array();
        var randoNumero = Math.floor(Math.random() * 100000) + 1; // id random 



        $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios
            $("#ocultar").hide();

            function getMuro() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/TicketSoporte.php/muro/" + divisiones[1],
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (typeof index.Ticket !== "object" && index.Ticket.length) {



                                $("#table1").append("<div class='media border p-3'> <div class='media-body'><h5>" + index.Nombre + ":<small><i>&nbsp;" +
                                    index.Fecha + "</i></small></h5><p>" + index.Comentario + "</p></div><br>",

                                    "<div class='media border p-3'> <div class='media-body'><h5>Soporte:<small><i>&nbsp;" + index.FechaDos + "</i></small></h5><p>" +
                                    index.ComentarioDos + "</p></div><br>"

                                );




                            } else {

                                if (typeof index.Ticket === "object") {
                                    /* Instruccion para atrapar el error del comienzo de que comienze una 
                                                                      conversacion ya que la tabla estara con valores nulos*/

                                    "<div class='media border p-3'> <div class='media-body'><h5>" + index.Nombre + ":<small><i>&nbsp;" +
                                        index.Fecha + "</i></small></h5><p>" + index.Comentario + "</p></div><br>"

                                }


                                $("#table1").append(" <div class='media border p-3'> <div class='media-body'><h5>" +
                                    index.Nombre + ":<small><i>&nbsp;" + index.Fecha + "</i></small></h5><p>" + index.Comentario + "</p></div><br>"



                                );
                            }

                        });

                    }

                });


            }


            function getRandon() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/TicketSoporte.php/tabla",
                    type: "get",
                    async: false,
                    success: function(response) {

                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idComentarioSoporte.length) {

                                idcomentariotemp.push(index.idComentarioSoporte);

                            }


                            if (idcomentariotemp[i] == randoNumero) { //random comentario cliente

                                randoNumero = Math.floor(Math.random() * 100000);

                            } else {

                                $("#idcomentario").val(randoNumero);
                            }


                        });

                    }

                });
            }


            getRandon();
            getMuro();



        }); // necesario crear el backend de ticket



        //Guardar datos en la base de datos el crud de comentario soporte


        function postdata() {
            ticketid = $("#idcomentario").val()
            $("#form").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/Backend/ComentarioSoporte.php/comentario",
                    type: "post",
                    data: {

                        idComentarioSoporte: $("#idcomentario").val(),
                        ComentarioDos: $("#comentarioDos").val(),
                        Usuario_idUsuario: myvar,

                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Registro exitoso", "Nuevo comenatario agregado", "success");
                        document.getElementById("form").reset();
                        $("#ocultar").show();

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Registro no exitoso", "Contacta con soporte", "error");

                    }


                });


                return false;

            });
        }


        function postdataticket() {
            $("#form2").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/Backend/ComentarioSoporte.php/ticketsoporte",
                    type: "post",
                    data: {

                        Status: $("#status").val(),
                        FK_ComentarioCliente: IDcomenatriocliente,
                        FK_ComentarioSoporte: ticketid,


                    },
                    success: function(response) { // campos necesarios para la ejecución

                        document.getElementById("form2").reset();


                        swal({
                                title: "Comentario registrado ",
                                text: "Espera a que el cliente conteste el mensaje",
                                icon: "success",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    swal("Poof! Your imaginary file has been deleted!", {
                                        icon: "success",
                                    });
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
    </script>
</body>

</html>