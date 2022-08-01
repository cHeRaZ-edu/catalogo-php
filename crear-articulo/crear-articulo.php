<?php
    require_once('../env.php');
    require_once('../db.php');
    require_once('../Modelos/Articulo.php');
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $articulo = json_decode(file_get_contents('php://input'),true);
        $conn = db::connect();
        $articulo = Articulo::create($conn,$articulo);
        $conn->close();
        $response = ['status'=>200,'message'=> 'Se ha creado con exito.'];
        echo json_encode($response);
    }
?>