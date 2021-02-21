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
    <title>Registro empresa</title>
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


                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Registrar Empresa</h3><a class="btn btn-warning text-dark btn-sm d-none d-sm-inline-block" role="button" id="myBtn3">
                            <i class="fas fa-user-friends fa-sm text-black-50"></i>&nbsp;Ver clientes</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de actualización de empresa.</p>
                        </div>
                        <div class="card-body">
                            <form id="form1">
                                <!--poner link del formulario de php-->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Nombre de la Empresa:</label>
                                        <input type="text" class="form-control" name="NombreEmpresa" id="nombrempresa" required>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-6">
                                        <label for="">Matricula de empresa:</label>
                                        <input type="text" value="<?php echo $_POST['variable']; ?>" class="form-control" name="Matricula" id="matricula" disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Giro de la empresa:</label>
                                        <input type="text" class="form-control" name="GiroEmpresa" id="giroempresa" onkeypress="return soloLetras(event)" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Matricula Dueño:</label>
                                        <input class="form-control" name="Usuario_idUsuario" id="idCliente" disabled>
                                        <span> </span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Servicio de su interés:</label>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="ServicioDeInteres" id="service">&nbsp;Diseño y Desarrollo Web (Páginas web, Tiendas en Línea, E-commerce etc.)</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="ServicioDeInteres1" id="service1">&nbsp;Diseño Gráfico (Logotipos, Imagen Corporativa, Publicidad etc.)</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="ServicioDeInteres2" id="service2">&nbsp;Desarrollo Móvil (Apps ó Videojuegos)</label>
                                        </div>
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="ServicioDeInteres3" id="service3">&nbsp;Animación Digital (Video Corporativo, Video animado, Motion Graphics etc.)</label>
                                        </div>
                                    </div>


                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="postdata()" class="btn btn-primary">Actualizar</button>
                                    </div>

                                </div>
                            </form>
                            <!--fin del formulario-->

                            <!---------------------------------- Modal ----------------------------------->
                            <div class="modal fade bd-example-modal-lg" id="myModal" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">

                                            <div class="form-group col-md-4">
                                                <h4>Lista de clientes</h4>
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
                                                        <th><b>Nombre</b></th>
                                                        <th><b>Apellido Paterno</b></th>
                                                        <th><b>Apellido Materno</b></th>
                                                        <th><b>Tipo usuario</b></th>
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

        <script>
            JSON.parse = JSON.parse || function(str) {
                if (str === "")
                    str = '""';
                eval("var p=" + str + ";");
                return p;
            };
            //ver

            var test, memoria = [];
            $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios



                $("#buscar").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#table1 tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });



                function getCliente() {

                    $.ajax({

                        url: "http://localhost/estadia/Backend/Usuario.php/usuarios",
                        type: "get",
                        success: function(response) {
                            $.each(JSON.parse(response), function(i, index) {

                                if (index.idUsuario.length) {

                                    if (index.Tipo_usuario == "Cliente" && index.Eliminar == 0) { // campo que solo llena los campos con usuario tipo cliente
                                        $("#table1").append("<tr><td>" + index.Nombre + "</td>" +
                                            "<td id='NombreTabla'>" + index.ApellidoP + "</td>" +
                                            "<td>" + index.ApellidoM + "</td>" +
                                            "<td>" + index.Tipo_usuario + "</td>" +
                                            "<td><span type='button'  data-dismiss='modal' class='delete btn btn-outline-success' data-usuario='" + index.idUsuario + "'>Seleccionar</span></td>" +
                                            "</tr>"

                                        );
                                    }


                                }

                            });

                            $(".delete").unbind("click").click(function() {
                                var $idCliente = $(this).data("usuario");
                                $("#idCliente").val($idCliente);


                            });


                        }
                    });

                }



                function getTipo() {

                    $.ajax({

                        url: "http://localhost/estadia/Backend/Empresa.php/empresa/" + $("#matricula").val(),

                        type: "get",
                        success: function(response) {
                            $.each(JSON.parse(response), function(i, index) {

                                if (index.idEmpresa.length && index.Eliminar == 0) {

                                    $("#nombrempresa").val(index.NombreEmpresa);

                                    $("#giroempresa").val(index.GiroEmpresa);
                                    $("#idCliente").val(index.Nombre);



                                    $("#idCliente").val(index.idUsuario);


                                    if (index.ServicioDeInteres == 1) { // extraer datos para actualizar 
                                        $("#service").attr("checked", true);
                                        memoria[0] = 1;
                                    }
                                    if (index.ServicioDeInteres1 == 1) {
                                        $("#service1").attr("checked", true);
                                        memoria[1] = 1;
                                    }
                                    if (index.ServicioDeInteres2 == 1) {
                                        $("#service2").attr("checked", true);
                                        memoria[2] = 1;
                                    }
                                    if (index.ServicioDeInteres3 == 1) {
                                        $("#service3").attr("checked", true);
                                        memoria[3] = 1;
                                    }


                                }

                            });

                        }
                    });

                }



                getTipo();
                getCliente();


            });

            //validar solo letras

            function soloLetras(e) {
                key = e.keyCode || e.which;
                tecla = String.fromCharCode(key).toLowerCase();
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
                especiales = "8-37-39-46";

                tecla_especial = false
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        tecla_especial = true;
                        break;
                    }
                }

                if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                    return false;
                }
            }



            //funcion para el model

            $("#myBtn3").click(function() {
                $("#myModal").modal({
                    backdrop: "static"
                });
            });

            //-------------
            $('#service').on('click', function() {
                if ($(this).is(':checked')) {
                    // Hacer algo si el checkbox ha sido seleccionado
                    memoria[0] = 1;

                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    memoria[0] = 0;

                }
            });
            $('#service1').on('click', function() {
                if ($(this).is(':checked')) {
                    // Hacer algo si el checkbox ha sido seleccionado
                    memoria[1] = 1;

                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    memoria[1] = 0;

                }
            });
            $('#service2').on('click', function() {
                if ($(this).is(':checked')) {
                    // Hacer algo si el checkbox ha sido seleccionado
                    memoria[2] = 1;

                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    memoria[2] = 0;

                }
            });
            $('#service3').on('click', function() {
                if ($(this).is(':checked')) {
                    // Hacer algo si el checkbox ha sido seleccionado
                    memoria[3] = 1;

                } else {
                    // Hacer algo si el checkbox ha sido deseleccionado
                    memoria[3] = 0;

                }
            });

            //Guardar datos en la base de datos el crud de empresa

            function postdata() {
                $("#form1").submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: "http://localhost/estadia/Backend/Empresa.php/empresa/" + $("#matricula").val(),
                        type: "put",
                        data: {

                            NombreEmpresa: $("#nombrempresa").val(),
                            GiroEmpresa: $("#giroempresa").val(),
                            ServicioDeInteres: memoria[0],
                            ServicioDeInteres1: memoria[1],
                            ServicioDeInteres2: memoria[2],
                            ServicioDeInteres3: memoria[3],
                            Usuario_idUsuario: $("#idCliente").val()


                        },
                        success: function(response) { // campos necesarios para la ejecución

                            swal("Actualización", "correcta", "success");


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