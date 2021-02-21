<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Encuesta</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //guardar

        
        $("#form").submit(function(e) {
            e.preventDefault();
           // Función ajax metodo post
            $.ajax({
                url: "./../../Backend/Encuesta.php/encuesta",
                type: "post",
                data: {

                    // mandar los valores establecidos por el cliente dentro del dormulario
                    Pregunta1: $("#Pregunta1").val(),
                    Pregunta2: $("#Pregunta2").val(),
                    Pregunta3: $("#Pregunta3").val(),
                    TicketSoporte_Ticket: $("#TicketSoporte_Ticket").val()
                },
                success: function(response) {

                  // Resetear el formulario
                    $("#form")[0].rest();

                }


            });
            return false;

        });

        //ver


        $(document).ready(function() {

            function getEncuesta() {

                $.ajax({

                    url: "./../../Backend/TicketSoporte.php/ticket",
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.Ticket.length) {

                                $("#TicketSoporte_Ticket").append("<option>" + index.Ticket + "</option>");



                            }

                        });

                    }

                });


            }
            getEncuesta();
        });
    </script>



</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(255,255,255);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>Balabox</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="inicio.php"><i class="fas fa-tachometer-alt"></i><span>Inicio</span></a>
                        <a class="nav-link" href="profile.html"><i class="fas fa-user"></i><span>Mis datos</span></a></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="table.html"><i class="fas fa-table"></i><span>Ver usuarios</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Reg_usuario.php"><i class="fas fa-user-circle"></i><span>Registrar usuario</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Registrar empresa</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav> <!-- fin de la navbar de lado derecho-->
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="text-white d-none d-lg-inline mr-2 text-white small">Valerie
                                            Luna</span><i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity
                                            log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Reporte de ticket</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Ticket cerrado.</p>
                        </div>
                        <div class="card-body">
                            <div id="containterform" class="row">
                                <div class="col-sm-8">

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger">
                                                    <h5 class="modal-title text-white" id="exampleModalLabel">Encuesta de
                                                        satisfacción</h5>
                                                    <!---->
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span class="text-white" aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <form id="form" action="http://localhost/estadia/Backend/Encuesta.php/encuesta" method="POST">
                                                        <!--Formulario para registrar encuesta-->
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
                                                        <div class="form-group col-md-3">
                                                            <label for="">Ticket:</label>
                                                            <select class="form-control" name="TicketSoporte_Ticket" id="TicketSoporte_Ticket">
                                                                <!-- en esta parte se utiliza json para llenar el select -->
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-success">Enviar</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" unbisible>
                                        ticket
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>