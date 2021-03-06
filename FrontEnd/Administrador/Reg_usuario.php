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
    <title>Registro usuario</title>
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
                        <h3 class="text-dark mb-0">Registrar usuario</h3><a class="btn btn-warning text-dark btn-sm d-none d-sm-inline-block" role="button" href="Reg_Departamento.php">
                            <i class="fas fa-industry fa-sm text-black-50"></i>&nbsp;Registrar Departamento</a>
                    </div>

                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de registro de usuario.</p>
                        </div>

                        <div class="card-body">
                            <form onsubmit="return false;" id="formUpload">
                                <!-- formulario -->
                                <div class="form-row">
                                    <div class="form-group col-md-12">
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
                                        <input type="text" class="form-control" name="Telefono" id="telefono" size="10" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Email:</label>
                                        <input type="email" class="form-control" name="Email" id="email" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Contraseña:</label>
                                        <input type="password" class="form-control" name="Password" id="password" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Repetir contraseña:</label>
                                        <input type="password" class="form-control" name="Password2" id="password2" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Departamento:</label>
                                        <select class="form-control" name="TipoUsuario_idUsuario" id="tipousuario" required>
                                            <!-- en esta parte se utiliza json para llenar el select -->
                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="">Adjuntar imagen:</label>
                                        <input type="file" name="image" onchange="upload_img();" />
                                    </div>

                                </div>
                                <div class="d-flex flex-row-reverse">
                                    <div class="p-2">
                                        <button type="submit" onclick="postdata()" class="btn btn-primary">Registrar</button>
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

    <script type="text/javascript">
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //ver

        var test;
        var ruta = "<?php echo $_SESSION["Ruteo"]; ?>"; // configuracion de ruta para javascript
        $(document).ready(function() { // funcion para llenar el select con la llave foranea de usuarios

            function getTipo() {

                $.ajax({

                    url: ruta + "Backend/Usuario.php/tipo",
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

        }); // necesario crear el backend de ticket

        //Validar solo telefono


        $("#telefono").on("keypress", function(event) {
            if ((event.which > 31 && (event.which < 48 || event.which > 57)) || $(this).val().length == 10) {

                return false;
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


        //insercion de imagen

        function upload_img() {

            var formData = new FormData($("#formUpload")[0]);


            $.ajax({
                type: 'POST',
                url: ruta + "subidaImagen.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) { // campos necesarios para la ejecución
                    var newfile = formData.get('image');
                    memoria = newfile.name;


                }
            });

        }

        //Guardar datos en la base de datos el crud de usuario



        function postdata() {
            $("#formUpload").submit(function(e) {
                e.preventDefault();


                if ($("#password").val() == $("#password2").val()) { //condicion de validacion de contraseñas iguales

                    $.ajax({
                        url: "./../../Backend/Usuario.php/usuario",
                        type: "post",
                        data: {

                            Nombre: $("#nombre").val(),
                            ApellidoP: $("#apellidop").val(),
                            ApellidoM: $("#apellidom").val(),
                            Telefono: $("#telefono").val(),
                            Email: $("#email").val(),
                            Password: $("#password").val(),
                            Imagen: memoria,
                            TipoUsuario_idUsuario: test
                        },
                        success: function(response) { // campos necesarios para la ejecución

                            swal("Registro exitoso", "Nuevo usuario agregado", "success");
                            document.getElementById("formUpload").reset();

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            swal("Registro no exitoso", "Contacta con soporte", "error");

                        }


                    });


                } else {

                    swal("Contraseñas no coinciden", "ingresa la misma contraseña", "error");

                }



                return false;

            });
        }
    </script>
</body>

</html>