<?php


session_start();
if ($_SESSION["acceso"] != "4") {
    header('location:http://localhost/estadia/index.php');
    exit;
}


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Registro Oferta</title>
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
                                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ..." />
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">
                                        <span class="text-white d-none d-lg-inline mr-2 small"><?php print($_SESSION["Nombre"] . " " . $_SESSION["ApellidoP"]); ?></span>
                                        <i class="fa fa-sign-out" style="color: rgb(255,255,255);"></i></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in"><a class="dropdown-item"  ><i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile</a><a class="dropdown-item" href="#"><i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Settings</a><a class="dropdown-item" href="#"><i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i> Activity log</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="http://localhost/estadia/logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>


                <!-- navbar parte de arriba -->


                <!--empieza el menu -->
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Registrar Oferta</h3>
                    </div>

                    <!-- Tab panes -->
                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0"><strong>Formulario de registro de oferta.</strong><br /></h6>
                                </div>
                                <div class="card-body">
                                    <form onsubmit="return false;" id="formUpload">
                                        <div class="form-row">
                                            <div class="form-group col-md-12"><label for>Nombre de la oferta:</label>
                                                <input type="text" class="form-control" name="NombreOferta" id="NombreOferta" required />
                                            </div><br />
                                            <div class="form-group col-md-6"><label for>Fecha Inicio:</label>
                                                <input type="date" class="form-control" name="FechaInicio" id="FechaInicio" required />
                                            </div>
                                            <div class="form-group col-md-6"><label for>Fecha Expiración:</label>
                                                <input type="date" class="form-control" name="FechaExpiracion" id="FechaExpiracion" required />
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
        <!--<script src="assets/js/Proyecto.js"></script>  -->
        <script>
            var myvar = <?php echo $_SESSION["idUsuario"]; ?>;
            var ruta = "<?php echo $_SESSION["Ruteo"]; ?>"; // configuracion de ruta para javascript

            JSON.parse = JSON.parse || function(str) {
                if (str === "")
                    str = '""';
                eval("var p=" + str + ";");
                return p;
            };



            function upload_img() {

                var formData = new FormData($("#formUpload")[0]);


                $.ajax({
                    type: 'POST',
                    url: ruta + "subirOferta.php",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) { // campos necesarios para la ejecución
                        var newfile = formData.get('image');
                        memoria = newfile.name;
                     
                        

                    }
                });

            }


            function postdata() {
                $("#formUpload").submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        url: "http://localhost/estadia/backend/Ofertas.php/oferta",
                        type: "post",

                        data: {

                            NombreOferta: $("#NombreOferta").val(),
                            FechaExpiracion: $("#FechaExpiracion").val(),
                            FechaInicio: $("#FechaInicio").val(),
                            Imagen: memoria,
                            Usuario_idUsuario: myvar



                        },
                        success: function(response) { // campos necesarios para la ejecución


                            document.getElementById("formUpload").reset();
                            swal("Registro  exitoso", "Nueva Empresa agregado", "success");




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