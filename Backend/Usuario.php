<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();


function mysqlTimestampNow()
{  //funcion para asignar la hora

    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d');
}

// Función para crear la matricula aleatoria del usuario

function generarCodigo($longitud) {
    $key = '';
    $pattern = '12345678904545';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
}  

$app->get('/tipo', function () use ($db, $app) {   // para extraer los campos del tipo usuario y llenar el combox del frontend
    $consulta = $db->query("SELECT Tipo_usuario,idTipoUsuario FROM `tipousuario`;");

    while ($fila = $consulta->fetch_assoc()) {
        $tipousuario[] = $fila;
    }

    echo json_encode($tipousuario);
});


/*  Ver los datos de la tabla usuario*/
$app->get('/usuarios', function () use ($db, $app) {
    $consulta = $db->query("SELECT `usuario`.*, `tipousuario`.* FROM `usuario` LEFT JOIN `tipousuario` ON
     `usuario`.`TipoUsuario_idUsuario` = `tipousuario`.`idTipoUsuario`;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $usuarios[] = $fila;
    }

    echo json_encode($usuarios);
});

/* funcion para poder ingresar  visualizar por id de usuario  */
$app->get('/datos/:id', function ($id) use ($db, $app) {
    $consulta = $db->query("SELECT `usuario`.*, `empresa`.*, `proyecto`.*
    FROM `usuario` 
        LEFT JOIN `empresa` ON `empresa`.`Usuario_idUsuario` = `usuario`.`idUsuario` 
        LEFT JOIN `proyecto` ON `proyecto`.`Empresa_idEmpresa` = `empresa`.`idEmpresa` WHERE idUsuario = $id;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $datos[] = $fila;
    }


    echo json_encode($datos);
});


/* Insertar datos de la tabla usuario*/
$app->post("/usuario", function () use ($db, $app) {

    $clave = hash('sha256', $app->request->post("Password")); // Metodos de seguridad
    $fecha =  mysqlTimestampNow();
    $key = generarCodigo(5);
    $eliminar = "0";
 

    $consulta = "INSERT INTO Usuario VALUES ($key,"
        . "'{$app->request->post("Nombre")}',"
        . "'{$app->request->post("ApellidoP")}',"
        . "'{$app->request->post("ApellidoM")}',"
        . "'{$app->request->post("Telefono")}',"
        . "'{$app->request->post("Email")}',"
        . "'{$clave}',"
        . "'$fecha',"
        . "'{$app->request->post("Imagen")}',"
        . "$eliminar,"
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
$app->put('/usuario/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE Usuario SET
                               Nombre = '{$request->params("Nombre")}',
                               ApellidoP = '{$request->params("ApellidoP")}',
                               ApellidoM = '{$request->params("ApellidoM")}',
                               Telefono = '{$request->params("Telefono")}',
                               Email  = '{$request->params("Email")}'
                               
                                
                         WHERE idUsuario=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});

/* Actualizar el crud solo contraseña */
$app->put('/password/:id', function ($id) use ($db, $app) {

  

    $clave = hash('sha256', $app->request->post("Password")); // Metodos de seguridad

    $sql = "UPDATE Usuario SET
    
                           Password = '$clave'
                                
                         WHERE idUsuario=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});


/* Actualizar para eliminar logicamente a los usuarios */
$app->put('/eliminar/:id', function ($id) use ($db, $app) {

    $request = $app->request;
    $sql = "UPDATE Usuario SET
    
                           Eliminar = '{$request->params("Eliminar")}'
                                
                         WHERE idUsuario=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});

$app->run();
