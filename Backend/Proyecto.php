<?php
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';
/* Metodos de CRUD para el usuario */
$app = new \Slim\Slim();



/*  Ver los datos de la tabla proyecto*/
$app->get('/proyectos', function() use($db,$app) {
    $consulta= $db->query("SELECT * FROM `proyecto`;");

    while($fila=$consulta->fetch_assoc()){  //meter en un arreglo todos los datos 
         $proyecto[]=$fila;
    }

    echo json_encode($proyecto);
});

/*  Ver los datos de la tabla proyectos*/
$app->get('/datos/:id', function($id) use($db,$app) {
    $consulta= $db->query("SELECT * FROM `proyecto` where idProyecto= $id;");

    while($fila=$consulta->fetch_assoc()){  //meter en un arreglo todos los datos 
         $proyecto[]=$fila;
    }

    echo json_encode($proyecto);
});




/* Insertar datos de la tabla proyecto*/
$app->post("/proyecto",function() use($db,$app){


    $consulta= "INSERT INTO Proyecto VALUES (null,"
    ."'{$app->request->post("NombreProyecto")}',"
    ."'{$app->request->post("FechaEntrega")}',"
    ."'{$app->request->post("Nota")}',"
    ."'{$app->request->post("Tipo")}',"
    ."0,"
    ."NULL"
    .")";
    
    $insert = $db->query($consulta);
   

    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");
          

    }else{
            
            $value = array("status" => "false", "message" => "Registro no exitosoiii");
            
    }

    echo json_encode($value);

});
 

/* Actualizar el crud */



$app->put('/proyecto/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE Proyecto SET
                               NombreProyecto = '{$request->params("NombreProyecto")}',
                               FechaEntrega = '{$request->params("FechaEntrega")}',
                               Nota = '{$request->params("Nota")}',
                               Tipo = '{$request->params("Tipo")}'
                           
                                   
                         WHERE idProyecto=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});




$app->put('/asignar/:id', function ($id) use ($db, $app) {

    $request = $app->request;


    $sql = "UPDATE Proyecto SET
                               
                               Empresa_idEmpresa = '{$request->params("Empresa_idEmpresa")}'
                           
                                   
                         WHERE idProyecto=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});


// crud eliminiar
$app->put('/eliminar/:id', function ($id) use ($db, $app) {

    $request = $app->request;
    $sql = "UPDATE Proyecto SET
    
                           Eliminar = '{$request->params("Eliminar")}'
                                
                         WHERE idProyecto=$id";

    $update = $db->query($sql);

    if ($update) {
        $result = array("status" => "true", "message" => "Usuario modificado correctamente");
    } else {
        $result = array("status" => "false", "message" => "Usuario NO modificado");
    }
    echo json_encode($result);
});

$app->run();




