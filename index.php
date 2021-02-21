<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/estilo.css">


    <script>
        JSON.parse = JSON.parse || function(str) {
            if (str === "")
                str = '""';
            eval("var p=" + str + ";");
            return p;
        };
        //guardar


        $("#form").submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "http://localhost/estadia/loginBack.php/login",
                type: "post",
                data: {
                    Email: $("#Email").val(),
                    Password: $("#Password").val()
                },
                success: function(response) {


                    $("#form")[0].rest();


                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status);
                    alert(thrownError);
                }


            });
            return false;

        });
    </script>



</head>

<body class="main-style">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><img src="assets/img/Imagenes/login.png" style="width: 174px;"><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="cv.html">Inicio</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="hire-me.html">Registrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page div-dising">
        <div class="container div-center main-container">
        <br>
            <div class="border rounded shadow-sm">
            
                <h1 class="d-xl-flex justify-content-xl-center">Atención al cliente.</h1>
            </div>
            <section class="portfolio-block block-intro">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-5 offset-lg-1 text">
                            <h4 class="shadow-sm">Inicio de sesión</h4>
                            <form id="form" action="http://localhost/estadia/loginBack.php/login" method="post">
                                <!-- poner le javascript para leer el login-->
                                <h5 class="d-xl-flex justify-content-xl-start">Email:</h5>
                                <input class="form-control input-border" type="email" name="Email" placeholder="Email" id="Email" required>
                                <h5 class="d-xl-flex justify-content-xl-start">Contraseña:</h5>
                                <input class="form-control input-border" type="password" name="Password" placeholder="Contraseña" id="Password" required>
                                <br>
                                <button class="btn btn-outline-primary shadow-sm" role="button" href="#">Registro</button> &nbsp;
                                <button class="btn btn-outline-primary shadow-sm" type="submit" role="button" href="#">Iniciar sesión</button>
                                <br>
                                <hr>
                                <a class="already" href="#">Olvidaste la contraseña? Click aqui.</a>
                            </form>

                        </div>
                        <div class="col">
                            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active"><img class="w-100 d-block img-borde" src="assets/img/Imagenes/Captura.png" alt="Slide Image"></div>
                                    <div class="carousel-item"><img class="w-100 d-block img-borde" src="assets/img/Imagenes/image2.jpg" alt="Slide Image"></div>
                                    <div class="carousel-item"><img class="w-100 d-block img-borde" src="assets/img/Imagenes/image4.jpg" alt="Slide Image"></div>
                                </div>
                                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1"
                                        role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-1" data-slide-to="1"></li>
                                    <li data-target="#carousel-1" data-slide-to="2"></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>