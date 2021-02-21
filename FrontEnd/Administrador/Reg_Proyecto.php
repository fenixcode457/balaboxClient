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
                    </div>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="card tab-pane active ">

                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Formulario de registro de proyecto.</p>
                            </div>
                            <div class="card-body">
                                <form id="form1">
                                    <!--poner link del formulario de php-->
                                    <div class="form-row">
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
                                            <button type="submit" onclick="postdata()" id="prueba" class="btn btn-primary">Registrar</button>
                                        </div>

                                    </div>
                                </form>
                                <!--fin del formulario-->

                            </div>




                        </div>


                        <!--opcion dos de sub menu eliminar -->

                        <div id="menu2" class="container tab-pane fade"><br>
                            <h3>Menu 2</h3>
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
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
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idProyecto.length) {


                                if (index.Empresa_idEmpresa == null) {
                                    $("#table2").append("<tr><td>" + index.NombreProyecto + "</td>" +
                                        "<td id='NombreTabla'>" + arregloFunciones[index.Tipo - 1] + "</td>" +
                                        "<td>" + index.FechaEntrega + "</td>" +
                                        "<td>" + index.Empresa_idEmpresa + "</td>" +
                                        "<td><span type='button'  data-dismiss='modal' class='delete btn btn-outline-success' data-proyecto='" + index.idProyecto + "'>Seleccionar</span></td>" +
                                        "</tr>"

                                    );
                                }

                            }

                        });

                        $(".delete").unbind("click").click(function() {
                            var $idProyecto = $(this).data("proyecto");
                            $("#idProyecto").val($idProyecto);



                        });

                    }

                });
            }

            $.ajax({

                url: "http://localhost/estadia/Backend/Empresa.php/empresas",
                type: "get",
                success: function(response) {
                    $.each(JSON.parse(response), function(i, index) {

                        if (index.idEmpresa.length) {

                            if (index.TipoUsuario_idUsuario == "2") { // campo que solo llena los campos con usuario y la tabla empresa
                                $("#table1").append("<tr><td>" + index.NombreEmpresa + "</td>" +
                                    "<td id='NombreTabla'>" + index.Nombre + "</td>" +
                                    "<td>" + index.Telefono + "</td>" +
                                    "<td>" + index.Email + "</td>" +
                                    "<td><span type='button'  data-dismiss='modal' class='delete2 btn btn-outline-success' data-tipo='" + index.idEmpresa + "'>Seleccionar</span></td>" +
                                    "</tr>"

                                );
                            }


                        }

                    });

                    $(".delete2").unbind("click").click(function() {
                        var $idEmpresa = $(this).data("tipo");
                        $(".alert").alert('close');
                        $("#Empresa").val($idEmpresa);


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



            // funcion de navegaacion

            $(".nav-tabs a").click(function() {
                $(this).tab('show');
            });



            //Guardar datos en la base de datos el crud de proyecto


            function postdata() {
                $("#form1").submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: "http://localhost/estadia/backend/Proyecto.php/proyecto",
                        type: "post",

                        data: {

                            NombreProyecto: $("#nombreproyecto").val(),
                            FechaEntrega: $("#fechaentrega").val(),
                            Nota: $("#nota").val(),
                            Tipo: $("#tipo").val()



                        },
                        success: function(response) { // campos necesarios para la ejecución


                            document.getElementById("form1").reset();
                            $('#form1').load(location.href + " #form1");

                            swal("Registro  exitoso", "Nueva Empresa agregado", "success");




                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Registro no exitoso", "Contacta con soporte", "error");

                        }


                    });
                    return false;

                });
            }

            // funcion actualizar



            function putdata() {
                $("#formproyecto").submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: "http://localhost/estadia/backend/Proyecto.php/proyecto/" + $("#idProyecto").val(),
                        type: "put",

                        data: {

                            Empresa_idEmpresa: $("#Empresa").val()



                        },
                        success: function(response) { // campos necesarios para la ejecución

                            swal("Actualizacion correcta", "Se asigno la empresa", "success");
                            document.getElementById("formproyecto").reset();

                            setTimeout('document.location.reload()', 2500);


                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Registro no exitosnnno", "Contacta con soporte", "error");

                        }


                    });
                    return false;

                });
            }
        </script>
</body>

</html>