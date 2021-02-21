<?php

require_once '../../vendor/ruteo.php';
require_once '../../Backend/EliminacionAutomatica.php';
$ruta = new ruteo();

session_start();
if ($_SESSION["acceso"] != "4") {
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };

        //ver
        function submitDetailsForm() {
            $("#formulario").submit();
        }



        let date = new Date()

        let day = date.getDate()
        let month = date.getMonth() + 1
        let year = date.getFullYear()

        if (month < 10) {
            EneSep = year + "-0" + month + "-" + day
        } else {
            OctDic = year + "-" + month + "-" + day
        }

        $(document).ready(function() {


            $("#buscar").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table1 tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });


            var cont = 0;

            function getOfertas() {

                $.ajax({

                    url: "../../Backend/Ofertas.php/ofertas",
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idOfertas.length) {
                                $("#table1").append("<tr><td>" + index.NombreOferta + "</td>" +
                                    "<td>" + index.FechaInicio + "</td>" +
                                    "<td>" + index.FechaExpiracion + "</td>" +
                                    "<td><span type='button'  class='update btn btn-outline-primary' data-oferta='" + index.idOfertas + "'>Actualizar</span></td>" +
                                    "<td><span type='button' class='delete btn btn-outline-danger' data-delete='" + index.idOfertas + "'>Eliminar</span></td>" +


                                    "</tr>"


                                );

                            

                            }


                        });




                        $(".update").unbind("click").click(function() {
                            var idOfertas = $(this).data("oferta");

                            document.getElementById("variable").value = idOfertas;
                            submitDetailsForm(); //funcion pora enviar el id al actualizar




                        });



                        // Eliminar de partamento

                        $(".delete").unbind("click").click(function() {
                            swal({
                                    title: "¿Seguro que lo quieres eliminar?",
                                    text: "Si se elimina perderás lo guardado",
                                    icon: "warning",
                                    buttons: true,
                                    dangerMode: true,
                                    buttons: ["Cancelar", "Acepto"],

                                })
                                .then((willDelete) => {
                                    if (willDelete) {
                                        swal("Lo eliminaste correctamente", {
                                            icon: "success",
                                        });

                                        $.ajax({

                                            url: "http://localhost/estadia/Backend/Ofertas.php/oferta/" + $(this).data("delete"),
                                            type: "delete",
                                            success: function(response) {
                                                $("#table1").html("<tr><th><b>Nombre oferta</b></th><th><b>Fecha inicio</b></th><th><b>Fecha exparacion</b></th><th><b>Actualizar</b></th><th><b>Eliminar</b></th></tr>");
                                                getOfertas();


                                            },
                                            error: function(xhr, ajaxOptions, thrownError) {
                                                swal("Eliminacion erronea", "Contacta con soporte", "error");

                                            }

                                        });

                                    } else {
                                        swal("Por poco lo eliminas :)");
                                    }
                                });


                        });


                    }

                });


            }
            getOfertas();
        });
    </script>


</head>

<body id="page-top">
    <div id="wrapper">

        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(255,255,255);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <img src="../Cliente/assets/img/logo.png" class="img-fluid" alt="f" width="176" height="44">
                </a>
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="inicio.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                        <hr class="sidebar-divider my-0" /><a class="nav-link" href="Reg_oferta.php"><i class="fas fa-clipboard-list"></i><span>Registrar oferta</span></a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Ver_oferta.php"><i class="fas fa-chalkboard-teacher"></i><span>Ver oferta</span></a>
                        <hr class="sidebar-divider my-0" />
                    </li>
                    <li class="nav-item"><a class="nav-link" href="login.html"></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>


        <!-- fin de la navbar de lado derecho-->
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">

                <form action='Act_oferta.php' id='formulario' method='post' name='formulario'>
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
                    <h3 class="text-dark mb-4">Empresas</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Empresas registradas</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                        <label>Ver&nbsp;<select class="form-control form-control-sm custom-select custom-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label>
                                    </div>
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
                                        <th><b>Nombre oferta</b></th>
                                        <th><b>Fecha Inicio</b></th>
                                        <th><b>Fecha expiracion</b></th>


                                        <th><b>Actualizar</b></th>
                                        <th><b>Eliminar</b></th>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Listado 1 de 10 </p>
                                </div>
                                <div class="col-md-6">
                                    <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination">
                                            <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                        </ul>
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
</body>

</html>