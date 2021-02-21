<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();



$app->get('/comentarios', function() use($db,$app) {  
    $consulta= $db->query("SELECT `comentariocliente`.*, `ticketsoporte`.*
    FROM `comentariocliente` 
        LEFT JOIN `ticketsoporte` ON `ticketsoporte`.`FK_ComentarioSoporte` = `comentariocliente`.`idComentarioCliente`;");

    while($fila=$consulta->fetch_assoc()){
         $tipousuario[]=$fila;
    }

    echo json_encode($tipousuario);
});


function mysqlTimestampNow() {
    
    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d H:i:s ');
}

// funcion para insertar  en la tabla comentario soporte

$app->post("/comentario",function() use($db,$app){

    $timestamp =  mysqlTimestampNow();
 

    $consulta= "INSERT INTO comentariosoporte VALUES ("."'{$app->request->post("idComentarioSoporte")}',"."'$timestamp',"."'{$app->request->post("ComentarioDos")}',"."'{$app->request->post("Usuario_idUsuario")}'".")";

    $insert = $db->query($consulta);
   
    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");
           
    }else{

            $value = array("status" => "false", "message" => "Registro no exitoso");
          
    }

    echo json_encode($value);

});


function fecha() {
    
    date_default_timezone_set("America/Mexico_City");

    return date('Y-m-d');
}



$app->post("/ticketsoporte",function() use($db,$app){

    $timestamp =  fecha();
 

    $consulta= "INSERT INTO ticketsoporte VALUES (null,"
    ."'{$app->request->post("Status")}',"
    ."'$timestamp',"
    ."'{$app->request->post("FK_ComentarioCliente")}',"
    ."'{$app->request->post("FK_ComentarioSoporte")}'"  
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




