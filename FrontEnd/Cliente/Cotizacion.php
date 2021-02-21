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
    <title>Cotización</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


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
                            <i class="fas fa-user-alt"></i><span>Perfil</span></a></li>
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
                        <h3 class="text-dark mb-0">Registrar cotización</h3>
                        <a class="btn btn-warning text-dark btn-sm d-none d-sm-inline-block" role="button" href="Ver_cotizacion.php">
                            <i class="fas fa-file-alt fa-sm text-black-50"></i>&nbsp;Mostrar Cotizaciones</a>

                    </div>


                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div id="home" class="card tab-pane active ">

                            <div class="card-header py-3">
                                <p class="text-primary m-0 font-weight-bold">Formulario de registro de cotiazacíon.</p>
                            </div>
                            <div class="card-body">
                                <form onsubmit="return false;" id="formUpload">
                                    <!--poner link del formulario de php-->
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="">Titulo del proyecto:</label>
                                            <input type="text" class="form-control" name="NombreProyecto" id="nombreproyecto" onkeypress="return soloLetras(event)"  required>
                                        </div>
                                        <br>

                                        <div class="form-group col-md-3">
                                            <label for="">Servicio:</label>
                                            <select class="form-control" name="Tipo" id="tipo">
                                                <option value="1">Diseño de pagina web</option>
                                                <option value="2">Tienda en linea</option>
                                                <option value="3">Aplicacion móvil</option>
                                                <option value="4">Diseño de Logotipo</option>
                                                <option value="5">Diseño de Imagen Corporativa</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">Explicación:</label>
                                            <textarea name="Explicacion" id="explicacion" class="form-control" placeholder="texto"></textarea>

                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">Comentario:</label>
                                            <textarea name="Comentario" id="comentario" class="form-control" placeholder="texto"></textarea>

                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for="">Adjuntar documento:</label>
                                            <input type="file" name="doc" onchange=" upload_doc();" />
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

        var idUsuario = "<?php echo $_SESSION["idUsuario"]; ?>";
        var idEmpresa = 0,
            memoria = 0;
        var ruta = "<?php echo $_SESSION["Ruteo"]; ?>"; // configuracion de ruta para javascript


        $(document).ready(function() {

            function getDatos() {

                $.ajax({

                    url: "./../../Backend/Usuario.php/datos/" + idUsuario,
                    type: "get",
                    success: function(response) {
                        $.each(JSON.parse(response), function(i, index) {

                            if (index.idUsuario.length && i < 1) { // condicion para que la consulta solo seleccione una


                                idEmpresa = index.idEmpresa;



                            }

                        });

                    }

                });



            }
            getDatos();

        });


        //insercion de documento

        function upload_doc() {

            var formData = new FormData($("#formUpload")[0]);


            $.ajax({
                type: 'POST',
                url: ruta + "subirDocumento.php",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) { // campos necesarios para la ejecución
                    var newfile = formData.get('doc');

                    memoria = newfile.name;


                }
            });

        }



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
        //Guardar datos en la base de datos el crud de cotización


        function postdata() {
            $("#formUpload").submit(function(e) {
                e.preventDefault();
                e.stopImmediatePropagation();

                $.ajax({
                    url: "./../../backend/Cotizacion.php/cotizacion",
                    type: "post",

                    data: {

                        TituloDelProyecto: $("#nombreproyecto").val(),
                        Servicio: $("#tipo").val(),
                        Explicacion: $("#explicacion").val(),
                        Comentario: $("#comentario").val(),
                        Archivos: memoria,
                        Empresa_idEmpresa: idEmpresa



                    },
                    success: function(response) { // campos necesarios para la ejecución
                        swal("Registro  exitoso", "Nueva cotización", "success");
                        document.getElementById("formUpload").reset();





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