<?php
/* 

BackEnd 

Para Generar cotizacion

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

function mysqlTimestampNow()
{  //funcion para asignar la hora

    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d');
}


$app->get('/cotizacion', function() use($db,$app) {
    $consulta= $db->query("select * from cotizacion;");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});

$app->get('/cotizacion/:id', function($id) use($db,$app) {
    $consulta= $db->query("SELECT `usuario`.*, `cotizacion`.*, `empresa`.* FROM `usuario` , `cotizacion` LEFT JOIN `empresa` ON `cotizacion`.`Empresa_idEmpresa` = `empresa`.`idEmpresa` where idUsuario = $id;
    ");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});


$app->get('/cotizacionid/:id', function($id) use($db,$app) {
    $consulta= $db->query("SELECT `cotizacion`.*, `empresa`.*
    FROM `cotizacion` 
        LEFT JOIN `empresa` ON `cotizacion`.`Empresa_idEmpresa` = `empresa`.`idEmpresa` where idCotizacion = $id;
    ");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});




$app->post("/cotizacion",function() use($db,$app){

    $fecha =  mysqlTimestampNow();
    $consulta2= $db->query("select * from cotizacion;");

    $consulta= "INSERT INTO cotizacion VALUES (null,"
    ."'{$app->request->post("TituloDelProyecto")}',"
    ."'{$app->request->post("Servicio")}',"
    ."'{$app->request->post("Explicacion")}',"
    ."'{$app->request->post("Comentario")}',"
    ."'{$app->request->post("Archivos")}',"
    ."'$fecha',"
    ."'{$app->request->post("Empresa_idEmpresa")}'"
    .")";

    $insert = $db->query($consulta);


    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");

        
    }else{

            $value = array("status" => "false", "message" => "Registro no exitoso");

    }

    echo json_encode($value);

});
 


$app->delete("/cotizacion/:id",function($idCotizacion) use($db,$app){

    $query="DELETE FROM  cotizacion WHERE idCotizacion={$idCotizacion}";

    $update=$db->query($query);
    

	if($update){
		$result = array("STATUS" => "true", "message" => "Se  se ha eliminado correctamente!!!");
	}else{
        $result = array("STATUS" => "false", "message" => "Producto NO SE HA eliminado!!!");
  
    }
    
	
	echo json_encode($result);
});



/* Actualizar el crud */
$app->put('/cotizacion/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE cotizacion SET
                               TituloDelProyecto  = '{$request->params("TituloDelProyecto")}',
                               Servicio = '{$request->params("Servicio")}',
                               Explicacion= '{$request->params("Explicacion")}',
                               Comentario = '{$request->params("Comentario")}'
                             
                         WHERE idCotizacion=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});


$app->run();




