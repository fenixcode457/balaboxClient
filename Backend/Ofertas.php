<?php
/* 
Función Get
Necesita:  $db = conexión, $app = objeto de Slim
Paso de parámetros: ninguno
Salida:   Consulta para visualizar todo el crud.
---------------------------------------------------
Función Post
Necesita:  $db = conexión, $app = objeto de Slim
Paso de parámetros: ninguno
Salida: Consulta para insertar
--------------------------------------------------
Función Put
Necesita:  $db = conexión, $app = objeto de Slim
Paso de parámetros: idUsuario
Salida: Consulta para actualizar
--------------------------------------------------
Función Delete
Necesita:  $db = conexión, $app = objeto de Slim
Paso de parámetros: idUsuario
Salida: Consulta para eliminar

*/
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';

$app = new \Slim\Slim();


$app->get('/ofertas', function () use ($db, $app) {
    $consulta = $db->query("select * from Ofertas;");

    while ($fila = $consulta->fetch_assoc()) {
        $ofertas[] = $fila;
    }

    echo json_encode($ofertas);
});


/* funcion para poder ingresar  visualizar por id de oferta  */
$app->get('/oferta/:id', function ($id) use ($db, $app) {

    $consulta = $db->query("SELECT * from Ofertas WHERE idOfertas=$id;");

    while ($fila = $consulta->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $datos[] = $fila;
    }


    echo json_encode($datos);
});





$app->post("/oferta", function () use ($db, $app) {

    $consulta = "INSERT INTO Ofertas VALUES (null,"
        . "'{$app->request->post("NombreOferta")}',"
        . "'{$app->request->post("FechaExpiracion")}',"
        . "'{$app->request->post("FechaInicio")}',"
        . "'{$app->request->post("Imagen")}',"
        . "'{$app->request->post("Usuario_idUsuario")}'"
        . ")";

    $insert = $db->query($consulta);


    if ($insert) {

        $value = array("status" => "true", "message" => "Registro exitoso");
    } else {

        $value = array("status" => "false", "message" => "Registro no exitoso");
    }

    echo json_encode($value);
});




/* Eliminar oferta  */
$app->delete("/oferta/:id", function ($idOferta) use ($db, $app) {

    $imagen = "SELECT Imagen FROM  Ofertas WHERE idOfertas={$idOferta}";


    $datos = $db->query($imagen);
  

    while ($fila = $datos->fetch_assoc()) {  //meter en un arreglo todos los datos 
        $imagenOferta[] = $fila["Imagen"];
    
    }

    $query = "DELETE FROM  Ofertas WHERE idOfertas={$idOferta}";

    $delete = $db->query($query);


   $nombreArchivo = "../Ofertas/".$imagenOferta[0];

   touch($nombreArchivo);
   unlink($nombreArchivo);

  if ($delete) {
        $result = array("STATUS" => "true", "message" => "Producto se ha actualizado correctamente!!!");
    } else {
        $result = array("STATUS" => "false", "message" => "Producto NO SE HA eliminado!!!");
    }


    echo json_encode($result);
});




/* Actualizar el crud */
$app->put('/oferta/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE Ofertas SET
                               NombreOferta = '{$request->params("NombreOferta")}', 
                               FechaExpiracion = '{$request->params("FechaExpiracion")}', 
                               FechaInicio = '{$request->params("FechaInicio")}'
                                                    
                                                       
                         WHERE idOfertas=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});



$app->run();
