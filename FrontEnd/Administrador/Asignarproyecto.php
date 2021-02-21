<?php


session_start();
if ($_SESSION["acceso"] != "1") {
    header('location:http://localhost/estadia/index.php');
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro proyecto</title>
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
                <!--empieza el menu -->
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Registrar Proyecto</h3>
                        <!-- Nav tabs -->
                    </div>



                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Formulario de asignación de empresa.</p>
                    </div>

                    <div class="card-body">
                        <div class="alert alert-secondary alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Importante!</strong> Para que te aparezcan los proyectos es importante asignar una empresa.
                        </div>
                        <div class="row">
                            <div class="col-lg-7 col-xl-5">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="text-primary font-weight-bold m-0">Asignar empresa</h6>

                                    </div>
                                    <div class="card-body">

                                        <form id="formproyecto">
                                            <!--poner link del formulario de php-->
                                            <div class="form-row">



                                                <div class="form-group col-md-12">
                                                    <label for="">Nombre de la empresa:</label>
                                                    <input type="text" class="form-control" name="NombreEmpresa" id="NombreEmpresa" disabled>

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Matricula de la empresa:</label>
                                                    <input type="text" class="form-control" name="idEmpresa" id="Empresa" disabled>

                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="">Nombre del proyecto:</label>
                                                    <input type="text" class="form-control" name="NombreProyecto" id="NombreProyecto" disabled>

                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="">Matricula del proyecto:</label>
                                                    <input type="text" class="form-control" name="idProyecto" id="idProyecto" disabled>
                                                </div>
                                                <br>





                                            </div>
                                            <div class="d-flex flex-row-reverse">
                                                <div class="p-2">
                                                    <button type="submit" onclick="putdata()" class="btn btn-primary">Actualizar</button>
                                                </div>

                                            </div>
                                        </form>
                                        <!--fin del formulario-->




                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-xl-7">
                                <div class="card shadow mb-4">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h6 class="text-primary font-weight-bold m-0">Proyectos creados</h6>
                                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                            <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in" role="menu">
                                                <a class="dropdown-item" role="presentation" href="#myBtn4" id="myBtn4"> Empresas</a>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="table-responsive table mt-2" id="dataTable2" role="grid" aria-describedby="dataTable_info">
                                            <table class="table" id="table2">
                                                <tr>
                                                    <th><b>Nombre proyecto</b></th>
                                                    <th><b>Tipo</b></th>
                                                    <th><b>Fecha entrega</b></th>
                                                    <th><b>Empresa</b></th>
                                                    <th><b>Selección</b></th>
                                                </tr>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Modal para desplegar tabla completa -->

                            <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="form-group col-md-4">
                                                <h4>Lista de empresas</h4>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <input type="search" id="buscar" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar">

                                            </div>
                                            <div class="form-group col-md-3">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                                            </div>

                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                <table class="table" id="table1">
                                                    <tr>
                                                        <th><b>Nombre Empresa</b></th>
                                                        <th><b>Dueño</b></th>
                                                        <th><b>Email</b></th>
                                                        <th><b>Telefono</b></th>
                                                        <th><b>Selección</b></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- Fin Modal -->


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
        <!--<script src="assets/js/Proyecto.js"></script>  -->
        <script>
            JSON.parse = JSON.parse || function(str) {
                if (str === "")
                    str = '""';
                eval("var p=" + str + ";");
                return p;
            };

            function getProyectos() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/Proyecto.php/proyectos",
                    type: "get",
                    async: false,
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idProyecto.length) {


                                if (index.Empresa_idEmpresa == null) {
                                    $("#table2").append("<tr><td>" + index.NombreProyecto + "</td>" +
                                        "<td id='NombreTabla'>" + arregloFunciones[index.Tipo - 1] + "</td>" +
                                        "<td>" + index.FechaEntrega + "</td>" +
                                        "<td>" + index.Empresa_idEmpresa + "</td>" +
                                        "<td><span type='button'  data-dismiss='modal' class='delete btn btn-outline-success' data-proyecto='" + index.idProyecto + "-" + index.NombreProyecto + "'>Seleccionar</span></td>" +
                                        "</tr>"

                                    );
                                }

                            }

                        });

                        $(".delete").unbind("click").click(function() {
                            var $idProyecto = $(this).data("proyecto");
                            var arreglo2 = $idProyecto.split("-");
                            $("#idProyecto").val(arreglo2[0]);
                            $("#NombreProyecto").val(arreglo2[1]);




                        });

                    }

                });
            }

            $.ajax({

                url: "http://localhost/estadia/Backend/Empresa.php/empresas",
                type: "get",
                async: false,
                success: function(response) {
                    $.each(JSON.parse(response), function(i, index) {

                        if (index.idEmpresa.length) {

                            if (index.TipoUsuario_idUsuario == "2") { // campo que solo llena los campos con usuario y la tabla empresa
                                $("#table1").append("<tr><td>" + index.NombreEmpresa + "</td>" +
                                    "<td id='NombreTabla'>" + index.Nombre + "</td>" +
                                    "<td>" + index.Telefono + "</td>" +
                                    "<td>" + index.Email + "</td>" +
                                    "<td><span type='button'  data-dismiss='modal' class='delete2 btn btn-outline-success' data-tipo='" + index.idEmpresa + "-" + index.NombreEmpresa + "'>Seleccionar</span></td>" +
                                    "</tr>"

                                );
                            }


                        }

                    });

                    $(".delete2").unbind("click").click(function() {
                        var $idEmpresa = $(this).data("tipo");
                        var arreglo = $idEmpresa.split("-");


                        $(".alert").alert('close');
                        $("#Empresa").val(arreglo[0]);
                        $("#NombreEmpresa").val(arreglo[1])


                    });


                }
            });

            var arregloFunciones = ["Diseño de pagina web", "Tienda en linea", "Aplicacion móvil", "Diseño de Logotipo", "Diseño de Imagen Corporativa"]; // arreglo para  mostrar los de partamentos 
            var bandera = 0;
            $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios



                $("#buscar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#table1 tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });



                getProyectos();


            });

            //funcion para el model

            $("#myBtn4").click(function() {
                $("#myModal").modal({
                    backdrop: "static"
                });
            });



            function putdata() {


                $("#formproyecto").submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: "http://localhost/estadia/backend/Proyecto.php/asignar/" + $("#idProyecto").val(),
                        type: "put",

                        data: {

                            Empresa_idEmpresa: $("#Empresa").val()



                        },
                        success: function(response) { // campos necesarios para la ejecución



                            swal("Actualización correcta", "Se asigno la empresa ", "success");
                            document.getElementById("formproyecto").reset();



                            swal({
                                    title: "Se asigno la empresa ",
                                    text: "Espera a que el departamento de soporte conteste el mensaje",
                                    icon: "success",
                                    buttons: true,
                                    dangerMode: false,
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
        </script>
</body>

</html>