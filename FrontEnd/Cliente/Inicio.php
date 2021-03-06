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
    <title>Inicio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap-table@1.18.1/dist/bootstrap-table.min.js"></script>


    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };

        var idUsuario = <?php echo $_SESSION["idUsuario"]; ?>;
        var arregloFunciones = ["Diseño de pagina web", "Tienda en linea", "Aplicacion móvil", "Diseño de Logotipo", "Diseño de Imagen Corporativa"]; // arreglo para  mostrar los de partamentos 



        function detailFormatter(index, row) {

            return '<ul>' + '<li>' + 'Nombre empresa: ' + row.NombreEmpresa + '</li>' + '<br>' + '<li>' + 'Nombre del Proyecto: ' + row.NombreProyecto + '</li>' + '<br>' + '<li>' + 'Tipo de Proyecto: ' + arregloFunciones[row.Tipo - 1] + '</li>' + '</ul>'

        }

        var $table = $('#table');
        var $button = $('#button');



        $(document).ready(function() {

            function getDatos() {

                $.ajax({

                    url: "./../../Backend/Ofertas.php/ofertas",
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idOfertas.length) { // condicion para que la consulta solo seleccione una


                                if (i < 1) {

                                    $("#demo").append(



                                        "<div class='carousel-item active'>" + "<img src=./../../Ofertas/" + index.Imagen + " class='d-block w-100' width='1100' height='400'>" +




                                        "</div>"


                                    );

                                } else {

                                    $("#demo").append(



                                        "<div class='carousel-item'>" + "<img src=./../../Ofertas/" + index.Imagen + " class='d-block w-100'   width='1100' height='400'>" +




                                        "</div>"


                                    );

                                };




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
                            <i class="fas fa-user-alt"></i><span>Perfil</span></a>
                    </li>
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
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Inicio</h3>
                    </div>
                    <div class="row">

                        <div class="col-lg-9 col-xl-6 ">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Proyectos</h6>
                                </div>

                                <div class="card-body container-fluid" style=" padding: 5px;">


                                    <table id="table" data-toggle="table" data-height="460" data-detail-view="true" data-detail-formatter="detailFormatter" data-url="./../../Backend/Usuario.php/datos/ + <?php echo $_SESSION["idUsuario"]; ?>">

                                        <thead>
                                            <tr>
                                                <th data-field="NombreProyecto">Nombre Proyecto</th>
                                                <th data-field="FechaEntrega">Fecha Entrega</th>

                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-6">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Comentario status</h6>
                                </div>
                                <div  class="card-body container-fluid" style=" padding: 5px;">

                                    <table id="table2" data-toggle="table" data-height="460" data-url="./../../Backend/TicketSoporte.php/proyecto/ + <?php echo $_SESSION["idUsuario"]; ?>" data-row-attributes="rowAttributes">

                                        <thead>
                                            <tr>
                                                <th data-field="Status">Status Proyecto</th>
                                                <th data-field="FechaTicket">Fecha de cierre</th>

                                            </tr>
                                        </thead>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Ofertas</h6>
                                </div>
                                <div class="card-body">

                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                        <div id="demo" class="carousel-inner">

                                        </div>

                                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Solicitar  cotización<br /><br /></h6>
                                </div>
                                <div class="card-body"></div>
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