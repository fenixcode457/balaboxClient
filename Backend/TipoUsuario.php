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


$app->get('/departamento', function() use($db,$app) {
    $consulta= $db->query("select * from TipoUsuario;");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});

$app->get('/departamento/:id', function($id) use($db,$app) {
    $consulta= $db->query("select * from TipoUsuario WHERE idTipoUsuario = $id;");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});



$app->post("/departamento",function() use($db,$app){

    $consulta= "INSERT INTO TipoUsuario VALUES (null,"
    ."'{$app->request->post("Tipo_usuario")}',"
    ."'{$app->request->post("Descripcion")}'"
    .")";

    $insert = $db->query($consulta);


    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");
        
    }else{

            $value = array("status" => "false", "message" => "Registro no exitoso");

    }

    echo json_encode($value);

});
 

$app->delete("/departamento/:id",function($idTipoUsuario) use($db,$app){

    $query="DELETE FROM  TipoUsuario WHERE idTipoUsuario={$idTipoUsuario}";

    $update=$db->query($query);
    

	if($update){
		$result = array("STATUS" => "true", "message" => "Producto se ha actualizado correctamente!!!");
	}else{
        $result = array("STATUS" => "false", "message" => "Producto NO SE HA eliminado!!!");
        $app->redirect("http://localhost/estadia/FrontEnd/Error/errorEliminacion.php");
  
    }
    
	
	echo json_encode($result);
});



/* Actualizar el crud */
$app->put('/departamento/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE Tipousuario SET
                               Tipo_usuario = '{$request->params("Tipo_usuario")}',                            
                               Descripcion  = '{$request->params("Descripcion")}'
                               
                                
                         WHERE idTipoUsuario=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});



$app->run();




