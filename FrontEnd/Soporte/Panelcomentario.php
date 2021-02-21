<?php

require_once '../../vendor/ruteo.php';
$ruta = new ruteo();


session_start();
if ($_SESSION["acceso"] != "3") {
    header("location:" . $ruta->ruta() . "/estadia/index.php");
    exit;
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Navbar de lado derecho -->
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
        <!-- fin de la navbar de lado derecho-->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <form action='Comentario.php' id='formulario' method='post' name='formulario'>
                    <input id='variable' name='variable' type='hidden' />


                </form>


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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="text-white d-none d-lg-inline mr-2 text-white small"><?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"]); ?></span> <!-- se pone la variable para mostrar el nombre-->

                                        <i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Profile</a><a class="dropdown-item" role="presentation" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Settings</a>
                                        <a class="dropdown-item" role="presentation" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" role="presentation" href="http://localhost/estadia/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                    <!-- Poner el link de cerraar sesión  -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Comentarios nuevos</h3>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-xl-12">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Selecciona el proyecto</h6>
                                    <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                        <div role="menu" class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a role="presentation" class="dropdown-item" href="#"> Action</a><a role="presentation" class="dropdown-item" href="#"> Another action</a>
                                            <div class="dropdown-divider"></div><a role="presentation" class="dropdown-item" href="#"> Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">

                                        </div>
                                        <div class="col-md-6">
                                            <div class="text-md-right dataTables_filter" id="dataTable_filter">
                                                <label>
                                                    <input type="search" class="form-control form-control-sm" id="buscar" aria-controls="dataTable" placeholder="Buscar">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table" id="table1">
                                            <tr>
                                                <th><b>Comentario</b></th>
                                                <th><b>Fecha</b></th>
                                                <th><b>Nombre proyecto</b></th>
                                                <th><b>Selección</b></th>

                                            </tr>
                                        </table>
                                    </div>
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
        var variableJs = "Esta es mi variable en JS";
        var myvar = <?php echo $_SESSION["idUsuario"]; ?>;
        var arregloFunciones = ["Diseño de pagina web", "Tienda en linea", "Aplicacion móvil", "Diseño de Logotipo", "Diseño de Imagen Corporativa"]; // arreglo para  mostrar los de partamentos 




        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };



        //funcion para enviar formulario
        function submitDetailsForm() {
            $("#formulario").submit();
        }


        $(document).ready(function() {


            $("#buscar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table1 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });




            function getDatos() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/ComentarioCliente.php/comentarios",
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idComentarioCliente.length) {

                                if (index.Status === null) {

                                    $("#table1").append("<tr><td>" + index.Comentario + "</td>" +
                                        "<td>" + index.Fecha + "</td>" +
                                        "<td>" + index.NombreProyecto + "</td>" +


                                        "<td><span type='button'  class='update btn btn-outline-success' data-dato='" + index.idComentarioCliente + " " + index.Proyecto_idProyecto + "'>Seleccionar</span></td>" +
                                        "</tr>"


                                    );

                                }

                            }

                        });

                        $(".update").click(function() {
                            var idComentarioCliente = $(this).data("dato");


                            document.getElementById("variable").value = idComentarioCliente;
                            submitDetailsForm(); //funcion pora enviar el id al actualizar



                        });

                    }

                });



            }
            getDatos();
        });

        //guardar en tabla comentario cliente
        function posticket() {
            $("#form1").submit(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajax({
                    url: "http://localhost/estadia/Backend/ComentarioCliente.php/comentario",
                    type: "post",
                    data: {

                        Comentario: $("#mensaje").val(),
                        ///Imagen: $("#apellidom").val(),
                        Proyecto_idProyecto: $("#proyecto").val(),
                        FK_Usuario: myvar

                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Registro exitoso", "Comentario registrado", "success");
                        document.getElementById("form1").reset();


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