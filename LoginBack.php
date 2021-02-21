<?php

require_once 'vendor/autoload.php';
require_once 'Conexion/conexion.php';
require_once 'vendor/ruteo.php';
$app = new \Slim\Slim();


$app->post('/login', function () use ($db, $app) {

    $User = $app->request->params("Email");
    $Passuser = $app->request->params("Password");
    $ruta = new ruteo();


    $consulta = $db->query("SELECT `usuario`.*, `tipousuario`.*
    FROM `usuario` 
        LEFT JOIN `tipousuario` ON `usuario`.`TipoUsuario_idUsuario` = `tipousuario`.`idTipoUsuario` WHERE Email='{$User}';"); // Poner id


    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $emails[] = $fila["Email"];
        $idUsuario[] = $fila["idUsuario"];
        $Passwords[] = $fila["Password"];
        $Nombre[] =  $fila["Nombre"];
        $ApellidoP[] =  $fila["ApellidoP"];
        $ApellidoM[] =  $fila["ApellidoM"];
        $Puesto[] = $fila["Tipo_usuario"];
        $Eliminar[] = $fila["Eliminar"];
        $TipoUsuario[] = $fila["TipoUsuario_idUsuario"];
    }



    if (isset($emails[0]) && isset($Passwords[0])) {

        $clave = hash('sha256', $Passuser); // Metodos de seguridad

    } else {

        $emails[0] = "nada";
        $Passwords[0] = "nada";
        $Eliminar[0] = "null";
    }



    if (strcmp($emails[0], $User) == 0 && strcmp($Passwords[0], $clave) == 0  && $Eliminar[0] == 0) {


        if (session_status() == PHP_SESSION_NONE) {

            session_start();
            $_SESSION["acceso"] = $TipoUsuario[0];
            $_SESSION["Nombre"] = $Nombre[0];
            $_SESSION["ApellidoP"] = $ApellidoP[0];
            $_SESSION["ApellidoM"] = $ApellidoM[0];
            $_SESSION["Puesto"] = $Puesto[0];
            $_SESSION["Email"] = $emails[0];
            $_SESSION["idUsuario"] = $idUsuario[0];
            $_SESSION["Ruteo"] = $ruta->ruta();

            switch ($_SESSION["acceso"]) {
                case 1:

                    $app->redirect("/estadia/FrontEnd/Administrador/inicio.php");
                    break;
                    //case "1":
                    /*echo "es cliente";
                    $clave=base64_decode($clave);
                    print($clave);
                    $_SESSION["acceso"]="1";
                    print "<a href='privado.php'>link</a>";
                    break;
                */
                case 2:
                    $app->redirect("/estadia/FrontEnd/Cliente/inicio.php");
                    break;

                case 3:

                    $app->redirect("/estadia/FrontEnd/Soporte/inicio.php");
                    break;

                case 4:

                    $app->redirect("/estadia/FrontEnd/Marketing/inicio.php");
                    break;
            }
        }
    } else {


        $app->redirect("/estadia/error.php");
    }
});


$app->run();
