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
    <title>Actualizar usuario</title>
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
                        <h3 class="text-dark mb-0">Actualizar proyecto</h3><a class="btn btn-warning text-dark btn-sm d-none d-sm-inline-block" role="button" href="Reg_Departamento.php">
                            <i class="fas fa-industry fa-sm text-black-50"></i>&nbsp;Registrar Departamento</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de actualización de proyecto.</p>
                        </div>

                        <div class="card-body">
                            <form id="form">
                                <!--poner link del formulario de php-->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Matricula:</label>
                                        <input type="text" value="<?php echo $_POST['variable']; ?>" class="form-control" name="Matricula" id="matricula" disabled>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Nombre del proyecto:</label>
                                        <input type="text" class="form-control" name="NombreProyecto" id="nombreproyecto" required>
                                    </div>
                                    <br>
                                    <div class="form-group col-md-3">
                                        <label for="">Fecha entrega:</label>
                                        <input type="date" class="form-control" name="FechaEntrega" id="fechaentrega">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Tipo:</label>
                                        <select class="form-control" name="Tipo" id="tipo">
                                            <option value="1">Diseño de pagina web</option>
                                            <option value="2">Tienda en linea</option>
                                            <option value="3">Aplicacion móvil</option>
                                            <option value="4">Diseño de Logotipo</option>
                                            <option value="5">Diseño de Imagen Corporativa</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="">Nota:</label>
                                        <textarea name="Nota" id="nota" class="form-control" placeholder="texto"></textarea>

                                    </div>



                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="putdata()" id="prueba" class="btn btn-primary">Registrar</button>
                                    </div>

                                </div>
                            </form>
                            <!--fin del formulario-->


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

    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };


        $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios


            function getDatos() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/Proyecto.php/datos/" + $("#matricula").val(),
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idProyecto.length) {

                                $("#nombreproyecto").val(index.NombreProyecto);

                                $("#fechaentrega").val(index.FechaEntrega),
                                    $("#tipo").val(index.Tipo),
                                    $("#nota").val(index.Nota)




                            }


                        });
                    }
                });

            }

            getDatos();



        });



        //Guardar datos en la base de datos el crud de usuario



        function putdata() {
            $("#form").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/backend/Proyecto.php/proyecto/" + $("#matricula").val(),
                    type: "put",

                    data: {

                        NombreProyecto: $("#nombreproyecto").val(),
                        FechaEntrega: $("#fechaentrega").val(),
                        Nota: $("#tipo").val(),
                        Tipo: $("#nota").val()


                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Actualización correcta", "Se asigno la empresa", "success");




                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Actualización incorrecta", "Contacta con soporte", "error");

                    }


                });
                return false;

            });
        }



        // funcion para actualizar la contraseña
    </script>
</body>

</html>