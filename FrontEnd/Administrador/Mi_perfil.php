<?php

require_once '../../vendor/ruteo.php';
$ruta = new ruteo();

session_start();
if ($_SESSION["acceso"] != "1") {
    header("location:" . $ruta->ruta() . "/estadia/index.php");
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(255,255,255);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="assets/img/logo.png" class="img-fluid" alt="f" width="176" height="44">

                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="inicio.php"><i class="fas fa-tachometer-alt"></i><span>Inicio</span></a>
                        <a class="nav-link" href="Mi_perfil.php"><i class="fas fa-user"></i><span>Mis datos</span></a>
                    </li>
                    <li class="nav-item" role="presentation"></li>
                    <hr class="sidebar-divider my-0" />

                    <li class="nav-item" role="presentation"><a class="nav-link" href="Reg_usuario.php"><i class="fas fa-user-circle"></i><span>Registrar usuario</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ver_usuarios.php"><i class="fas fa-table"></i><span>Ver usuarios</span></a></li>
                    <hr class="sidebar-divider my-0" />

                    <li class="nav-item" role="presentation"><a class="nav-link" href="Reg_Empresa.php"><i class="far fa-user-circle"></i><span>Registrar empresa</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ver_empresas.php"><i class="fas fa-building"></i><span>Ver empresas</span></a></li>
                    <hr class="sidebar-divider my-0" />

                    <li class="nav-item" role="presentation"><a class="nav-link" href="Reg_Proyecto.php"><i class="fas fa-passport"></i></i><span>Registrar proyecto</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ver_proyecto.php"><i class="far fa-file"></i></i><span>Ver proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Asignarproyecto.php"><i class="far fa-edit"></i></i><span>Asignar proyectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="Ver_cotizacion.php"><i class="fas fa-file-pdf"></i></i><span>Ver cotización</span></a></li>


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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="text-white d-none d-lg-inline mr-2 text-white small"><?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"]); ?></span> <!-- varaible para la sesion -->
                                        <i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i></a>


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
                    <h3 class="text-dark mb-4">Mis datos</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Datos registrados</p>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-8 align-self-center">
                                    <div class="card" style="width: 30rem;">
                                        <div class="card-body">
                                            <h5 class="card-title">Nombre:&nbsp;<?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"] . " " . $_SESSION["ApellidoM"]); ?></h5>
                                            <h6 class="card-title">Email:&nbsp;<?php print($_SESSION["Email"]); ?></h6>
                                            <h6 class="card-title">Puesto:&nbsp;<?php print($_SESSION["Puesto"]); ?></h6>
                                            <a href="#" class="btn btn-primary">Actualizar datos</a>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <img src="image1.jpg" class="img-thumbnail" style="width: 250px;" alt="Responsive image">

                                </div>


                            </div>
                            <div class="row">

                                <div class="col-md-6">

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
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //ver

        var test;
        $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios

            function getTipo() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/Usuario.php/tipo",
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idTipoUsuario.length) {
                                $("#tipousuario").append("<option>" + index.Tipo_usuario + "</option>");

                                $("#tipousuario").click(function() {


                                    if (index.Tipo_usuario == $("#tipousuario").val()) {
                                        test = index.idTipoUsuario;
                                    }

                                });

                            }


                        });
                    }
                });

            }



            getTipo();






            $("#myBtn").click(function() {
                $("#myModal").modal();
            });










        });
    </script>
</body>

</html>