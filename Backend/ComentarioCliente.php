<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();



$app->get('/comentarios', function() use($db,$app) {  
    // Union de las tablas para poder ingresar dependiendo el proyecto
    $consulta= $db->query("SELECT `comentariocliente`.*, `ticketsoporte`.*, `proyecto`.*
    FROM `comentariocliente` 
        LEFT JOIN `ticketsoporte` ON `ticketsoporte`.`FK_ComentarioCliente` = `comentariocliente`.`idComentarioCliente` 
        LEFT JOIN `proyecto` ON `comentariocliente`.`Proyecto_idProyecto` = `proyecto`.`idProyecto`;");

    //Llenar todo los resultados en un arreglo
    while($fila=$consulta->fetch_assoc()){
         $comentarioCliente[]=$fila;      
    }

    echo json_encode($comentarioCliente);
});


function mysqlTimestampNow() {
    
    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d H:i:s ');
}

// funcion para insertar  en la tabla comentario cliente

$app->post("/comentario",function() use($db,$app){

    $timestamp =  mysqlTimestampNow();
 

    $consulta= "INSERT INTO comentariocliente VALUES (null,"
    ."'{$app->request->post("Comentario")}',"
    ."'$timestamp',"
    ."'{$app->request->post("Imagen")}',"
    ."'{$app->request->post("Proyecto_idProyecto")}',"
    ."'{$app->request->post("FK_Usuario")}'"  
    .")";

    $insert = $db->query($consulta);
   
    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");
           
    }else{

            $value = array("status" => "false", "message" => "Registro no exitoso");
          
    }

    echo json_encode($value);

});
 

$app->put("/ticket/:id",function($id) use($db,$app){

    $query="UPDATE TipoUsuario SET"
    . "Tipo_usuario = '{$app->request->post("Tipo_usuario")}', "
    . "Descripcion = '{$app->request->post("Descripcion")}'"
    . " WHERE idTipoUsuario={$id}";

    $update=$db->query($query);
    

	if($update){
		$result = array("STATUS" => "true", "message" => "Producto se ha actualizado correctamente!!!");
	}else{
		$result = array("STATUS" => "false", "message" => "Producto NO SE HA actualizado!!!");
	}
	
	echo json_encode($result);
});


$app->run();




