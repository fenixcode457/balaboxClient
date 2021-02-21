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
                        <h3 class="text-dark mb-0">Actualizar usuario</h3><a class="btn btn-warning text-dark btn-sm d-none d-sm-inline-block" role="button" href="Reg_Departamento.php">
                            <i class="fas fa-industry fa-sm text-black-50"></i>&nbsp;Registrar Departamento</a>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de actualización de usuario.</p>
                        </div>
                        <div class="card-body">



                            <div class="row">
                                <div class="col">
                                    <p class="auto-style3">
                                        <input checked="checked" name="pago1" type="radio" value="Deposito" />
                                        <span class="auto-style4">
                                            Cambiar datos
                                        </span>
                                    </p>
                                </div>
                                <div class="col">
                                    <p class="auto-style3">
                                        <input name="pago1" type="radio" value="Ventanilla" /> &nbsp;
                                        <span class="auto-style4">
                                            Cambiar contraseña
                                        </span>
                                    </p>
                                </div>
                            </div>



                            <hr>

                            <div id="div1" style="display:active;">
                                <!-- Div actualizar-->
                                <form id="form">
                                    <!--poner link del formulario de php-->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Matricula:</label>
                                            <input type="text" value="<?php echo $_POST['variable']; ?>" class="form-control" name="Matricula" id="matricula" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre:</label>
                                            <input type="text" class="form-control" name="Nombre" id="nombre" onkeypress="return soloLetras(event)" required>
                                        </div>
                                        <br>
                                        <div class="form-group col-md-6">
                                            <label for="">Apellido Paterno:</label>
                                            <input type="text" class="form-control" name="ApellidoP" id="apellidop" onkeypress="return soloLetras(event)" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Apellido Materno:</label>
                                            <input type="text" class="form-control" name="ApellidoM" id="apellidom" onkeypress="return soloLetras(event)" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Teléfono:</label>
                                            <input type="text" class="form-control" name="Telefono" id="telefono" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="">Email:</label>
                                            <input type="email" class="form-control" name="Email" id="email" required>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Departamento:</label>
                                            <select class="form-control" name="TipoUsuario_idUsuario" id="tipousuario" required>
                                                <!-- en esta parte se utiliza json para llenar el select -->
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">Adjuntar imagen:</label>
                                            <input type="file" name="archivo" title="seleccionar archivo" id="importData" accept=".jpg,.doc,.pdf" />
                                        </div>

                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="p-2">
                                            <button type="submit" onclick="putdata()" class="btn btn-primary">Actualizar</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                            <div id="div2" style="display:none;">
                                <!-- Div password-->
                                <center>
                                    <form id="form2">

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="">Contraseña:</label>
                                                <input type="password" class="form-control" name="Password" id="password" required>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Repetir contraseña:</label>
                                                <input type="password" class="form-control" name="Password2" id="password2" required>
                                            </div>

                                        </div>
                                        <div class="d-flex flex-row-reverse">
                                            <div class="p-2">
                                                <button type="submit" onclick="putpassword()" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </div>

                                    </form>
                                </center>
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


            function getDatos() {

                $.ajax({

                    url: "../estadia/Backend/Usuario.php/datos/" + $("#matricula").val(),
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idUsuario.length) {

                                $("#nombre").val(index.Nombre);

                                $("#apellidop").val(index.ApellidoP),
                                    $("#apellidom").val(index.ApellidoM),
                                    $("#telefono").val(index.Telefono),
                                    $("#email").val(index.Email),

                                    $("#tipousuario").val() //revisar


                            }


                        });
                    }
                });

            }


            getDatos();

            getTipo();

        }); // necesario crear el backend de ticket

        //Validar solo telefono
        $('#telefono').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');

        });
        // funcion para poder mostrar los inputs 
        $("input[type=radio]").click(function(event) {
            var valor = $(event.target).val();
            if (valor == "Deposito") {
                $("#div1").show();
                $("#div2").hide();
            } else if (valor == "Ventanilla") {
                $("#div1").hide();
                $("#div2").show();
            } else {
                // Otra cosa
            }
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




        //Guardar datos en la base de datos el crud de usuario



        function putdata() {
            $("#form").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/backend/Usuario.php/usuario/" + $("#matricula").val(),
                    type: "put",

                    data: {

                        Nombre: $("#nombre").val(),
                        ApellidoP: $("#apellidop").val(),
                        ApellidoM: $("#apellidom").val(),
                        Telefono: $("#telefono").val(),
                        Email: $("#email").val(),



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


        function putpassword() {
            $("#form2").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/backend/Usuario.php/password/" + $("#matricula").val(),
                    type: "put",

                    data: {


                        Password: $("#password").val()


                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Actualización correcta", "Se asigno la nueva contraseña", "success");
                        document.getElementById("form2").reset();




                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("Actualización incorrecta", "Contacta con soporte", "error");

                    }


                });
                return false;

            });
        }
    </script>
</body>

</html>