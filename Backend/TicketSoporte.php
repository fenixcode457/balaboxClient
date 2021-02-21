<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();




$app->get('/tabla', function () use ($db, $app) {   // para extraer el ultimoo elemento de  la tabala comentario soporte
    $consulta = $db->query("SELECT * from comentariosoporte;");

    while ($fila = $consulta->fetch_assoc()) {
        $comentariosoporte[] = $fila;
    }

    echo json_encode($comentariosoporte);
});


/*  Ver los datos de la tabla usuario*/
$app->get('/ticket', function () use ($db, $app) {
    $consulta = $db->query("SELECT * FROM TicketSoporte;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $usuarios[] = $fila;
    }

    echo json_encode($usuarios);
});



/* consulta para el muro */



$app->get('/muro/:id', function ($id) use ($db, $app) {
    $consulta = $db->query("SELECT `comentariocliente`.*, `ticketsoporte`.*, `comentariosoporte`.*, `usuario`.*
    FROM `comentariocliente` 
        LEFT JOIN `ticketsoporte` ON `ticketsoporte`.`FK_ComentarioCliente` = `comentariocliente`.`idComentarioCliente` 
        LEFT JOIN `comentariosoporte` ON `ticketsoporte`.`FK_ComentarioSoporte` = `comentariosoporte`.`idComentarioSoporte` 
        LEFT JOIN `usuario` ON `comentariocliente`.`FK_Usuario` = `usuario`.`idUsuario`  WHERE Proyecto_idProyecto=$id;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $muro[] = $fila;
    }

    echo json_encode($muro);
});




$app->get('/proyecto/:id', function ($id) use ($db, $app) {
    $consulta = $db->query("SELECT `comentariocliente`.*, `ticketsoporte`.*, `comentariosoporte`.*, `usuario`.*
    FROM `comentariocliente` 
        LEFT JOIN `ticketsoporte` ON `ticketsoporte`.`FK_ComentarioCliente` = `comentariocliente`.`idComentarioCliente` 
        LEFT JOIN `comentariosoporte` ON `ticketsoporte`.`FK_ComentarioSoporte` = `comentariosoporte`.`idComentarioSoporte` 
        LEFT JOIN `usuario` ON `comentariocliente`.`FK_Usuario` = `usuario`.`idUsuario` 
        LEFT JOIN `empresa` ON `comentariocliente`.`FK_Usuario` = `empresa`.``Usuario_idUsuario`` 
         WHERE FK_Usuario=$id AND Status='Cerrado';");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $muro[] = $fila;
    }

    echo json_encode($muro);
});






/* Insertar datos de la tabla usuario*/
$app->post("/ticket", function () use ($db, $app) {

    $consulta = "INSERT INTO Usuario VALUES (null,"
        . "'{$app->request->post("Nombre")}',"
        . "'{$app->request->post("ApellidoP")}',"
        . "'{$app->request->post("ApellidoM")}',"
        . "'{$app->request->post("Telefono")}',"
        . "'{$app->request->post("Email")}',"
        . "'{$app->request->post("Password")}',"
        . "'{$app->request->post("Fecha_registro")}',"
        . "NULL,"
        . "'{$app->request->post("TipoUsuario_idUsuario")}'"
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
$app->put("/ticket/:id", function ($id) use ($db, $app) {

    $query = "UPDATE TipoUsuario SET"
        . "Tipo_usuario = '{$app->request->post("Tipo_usuario")}', "
        . "Descripcion = '{$app->request->post("Descripcion")}'"
        . " WHERE idTipoUsuario={$id}";

    $update = $db->query($query);


    if ($update) {
        $result = array("STATUS" => "true", "message" => "Producto se ha actualizado correctamente!!!");
    } else {
        $result = array("STATUS" => "false", "message" => "Producto NO SE HA actualizado!!!");
    }

    echo json_encode($result);
});


$app->run();
