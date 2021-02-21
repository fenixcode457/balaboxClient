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
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };

        var idUsuario = <?php echo $_SESSION["idUsuario"]; ?>

        $(document).ready(function() {

            function getDatos() {

                $.ajax({

                    url: "./../../Backend/Usuario.php/datos/" + idUsuario,
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idUsuario.length && i < 1) { // condicion para que la consulta solo seleccione una


                                $("#image2").attr("src", "./../../Imagenes/" + index.Imagen);
                                $("#empresa").html(index.NombreEmpresa);
                                $("#giro").html(index.GiroEmpresa);


                            }



                        });

                    }

                });



            }
            getDatos();



        });
    </script>
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
                    <h3 class="text-dark mb-4">Inicio</h3>
                    <div class="row mb-3">
                        <div class="col-lg-3">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Foto perfil</p>
                                </div>
                                <div class="card-body text-center shadow">
                                    <img class="rounded-lg mb-3 mt-4" id="image2" width="160" height="160">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Datos</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username">
                                                                <strong>Email</strong></label>
                                                            <h5><?php print($_SESSION["Email"]); ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email">
                                                                <strong>Nombre</strong></label>
                                                            <h5><?php print($_SESSION["Nombre"]); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name">
                                                                <strong>Apellido Paterno</strong></label>
                                                            <h5><?php print($_SESSION["ApellidoP"]); ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="last_name">
                                                                <strong>Apellido Materno</strong></label>
                                                            <h5><?php print($_SESSION["ApellidoM"]); ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Datos de tu empresa</p>

                                        </div>
                                        <div class="card-body">

                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="empresa">
                                                                <strong>Nombre empresa:</strong></label>
                                                            <h5 id="empresa"></h5>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="giro">
                                                                <strong>Giro de la empresa</strong></label>
                                                            <h5 id="giro"></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group">


                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">


                                                        </div>
                                                    </div>
                                                </div>
                                                <!--poner boton para futura actualizacion -->
                                            </form>
                                        </div>
                                    </div>
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