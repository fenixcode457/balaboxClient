<?php

require_once '../../vendor/ruteo.php';
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
                        <h3 class="text-dark mb-0">Actualizar Oferta</h3>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Formulario de actualización de oferta.</p>
                        </div>
                        <div class="card-body">



                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Foto perfil</p>
                            </div>
                            <div class="card-body text-center shadow">
                                <img class="rounded-lg mb-3 mt-4" id="image2" width="160" height="160">
                            </div>


                            <hr>

                            <div id="div1" style="display:active;">
                                <!-- Div actualizar-->
                                <form form onsubmit="return false;" id="formUpload">
                                    <!--poner link del formulario de php-->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="">Id Oferta:</label>
                                            <input type="text" value="<?php echo $_POST['variable']; ?>" class="form-control" name="Matricula" id="matricula" disabled>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre oferta:</label>
                                            <input type="text" class="form-control" name="NombreOferta" id="NombreOferta" onkeypress="return soloLetras(event)" required>
                                        </div>
                                        <br>
                                        <div class="form-group col-md-6">
                                            <label for="">Fecha inicio:</label>
                                            <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" onkeypress="return soloLetras(event)" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Fecha final:</label>
                                            <input type="date" class="form-control" name="FechaExpiracion" id="FechaExpiracion" onkeypress="return soloLetras(event)" required>
                                        </div>


                                    </div>
                                    <div class="d-flex flex-row-reverse">
                                        <div class="p-2">
                                            <button type="submit" onclick="putdata()" class="btn btn-primary">Actualizar</button>
                                        </div>

                                    </div>
                                </form>
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




            function getDatos() {

                $.ajax({

                    url: "http://localhost/estadia/Backend/Ofertas.php/oferta/" + $("#matricula").val(),
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idOfertas.length) {

                                $("#image2").attr("src", "./../../Imagenes/" + index.Imagen);

                                $("#NombreOferta").val(index.NombreOferta);
                                $("#FechaInicio").val(index.FechaInicio),
                                $("#FechaExpiracion").val(index.FechaExpiracion)



                            }


                        });
                    }
                });

            }


            getDatos();


        }); // necesario crear el backend de ticket


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
                    alert(memoria);

                }
            });

        }


        //Actualizar datos tabla ofertas



        function putdata() {
            $("#formUpload").submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: "http://localhost/estadia/backend/Ofertas.php/oferta/" + $("#matricula").val(),
                    type: "put",

                    data: {

                        NombreOferta: $("#NombreOferta").val(),
                        FechaExpiracion: $("#FechaExpiracion").val(),
                        FechaInicio: $("#FechaInicio").val()
                        

                    },
                    success: function(response) { // campos necesarios para la ejecución

                        swal("Actualización correcta", "Se actualizo la oferta", "success");




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