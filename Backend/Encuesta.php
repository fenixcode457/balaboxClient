<?php
/* 

*/
require_once '../vendor/autoload.php';
require_once '../Conexion/conexion.php';

$app = new \Slim\Slim();


$app->get('/encuesta', function() use($db,$app) {
    $consulta= $db->query("select * from Satisfaccion;");

    while($fila=$consulta->fetch_assoc()){
         $productos[]=$fila;
    }

    echo json_encode($productos);
});



$app->post("/encuesta",function() use($db,$app){

    $consulta= "INSERT INTO Satisfaccion VALUES (null,"
    ."'{$app->request->post("Pregunta1")}',"
    ."'{$app->request->post("Pregunta2")}',"
    ."'{$app->request->post("Pregunta3")}',"
    ."'{$app->request->post("TicketSoporte_Ticket")}'"
    .")";

    $insert = $db->query($consulta);


    if($insert){

           $value = array("status" => "true", "message" => "Registro exitoso");
           $app->redirect("/estadia/FrontEnd/Cliente/Encuesta.php");
    }else{

            $value = array("status" => "false", "message" => "Registro no exitoso");

    }

    echo json_encode($value);

});
 


$app->run();




