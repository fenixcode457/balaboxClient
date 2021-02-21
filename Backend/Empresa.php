<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();



/*  Ver los datos de la tabla empresa*/
$app->get('/empresas', function () use ($db, $app) {
    $consulta = $db->query("SELECT `empresa`.*, `usuario`.*
    FROM `empresa` 
        LEFT JOIN `usuario` ON `empresa`.`Usuario_idUsuario` = `usuario`.`idUsuario`;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $usuarios[] = $fila;
    }

    echo json_encode($usuarios);
});

/*  Ver los datos de la tabla empresa con id*/
$app->get('/empresa/:id', function ($id) use ($db, $app) {
    $consulta = $db->query("SELECT `empresa`.*, `usuario`.*
    FROM `empresa` 
        LEFT JOIN `usuario` ON `empresa`.`Usuario_idUsuario` = `usuario`.`idUsuario` WHERE idEmpresa=$id;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $usuarios[] = $fila;
    }

    echo json_encode($usuarios);
});


/* Insertar datos de la tabla empresa */
$app->post("/empresa", function () use ($db, $app) {



    $consulta = "INSERT INTO Empresa VALUES (null,"
        . "'{$app->request->post("NombreEmpresa")}',"
        . "'{$app->request->post("GiroEmpresa")}',"
        . "'{$app->request->post("ServicioDeInteres")}',"
        . "'{$app->request->post("ServicioDeInteres1")}',"
        . "'{$app->request->post("ServicioDeInteres2")}',"
        . "'{$app->request->post("ServicioDeInteres3")}',"
        . "'{$app->request->post("Usuario_idUsuario")}'"

        . ")";

    $insert = $db->query($consulta);


    if ($insert) {

        $value = array("status" => "true", "message" => "Registro exitoso");


        $app->redirect("/estadia/FrontEnd/Administrador/Reg_usuario.php");
    } else {

        $value = array("status" => "false", "message" => "Registro no exitoso");
    }

    echo json_encode($value);
});


/* Actualizar el crud */
$app->put("/empresa/:id", function ($id) use ($db, $app) {
    

    $request = $app->request;


    $sql = "UPDATE Empresa SET
        
        NombreEmpresa = '{$request->params("NombreEmpresa")}',
        GiroEmpresa = '{$request->params("GiroEmpresa")}',
        ServiciosDeInteres = '{$request->params("ServicioDeInteres")}',
        ServicioDeInteres1 = '{$request->params("ServicioDeInteres1")}',
        ServicioDeInteres2  = '{$request->params("ServicioDeInteres2")}',
        ServicioDeInteres3 = '{$request->params("ServicioDeInteres3")}',
        Usuario_idUsuario = '{$request->params("Usuario_idUsuario")}'
                               
       WHERE idEmpresa=$id";


$update = $db->query($sql);


    if ($update) {
        $result = array("STATUS" => "true", "message" => "Producto se ha actualizado correctamente!!!");
    } else {
        $result = array("STATUS" => "false", "message" => "Producto NO SE HA actualizado!!!");
    }

    echo json_encode($result);
});




$app->run();
