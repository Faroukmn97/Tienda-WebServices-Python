<?php

    if (isset($_SERVER['HTTP_ORIGIN'])) {  
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");  
    header('Access-Control-Allow-Credentials: true');  
    header('Access-Control-Max-Age: 86400');   
    }  
  
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {  
      
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))  
            header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");  
      
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))  
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");  
    }

    header('Content-Type: application/json');
    require_once('..\config\connection.php');
    require_once('..\models\Product.php');
    $product = new Product();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAll":
            $data = $product->getProducts();
            // para poder visualizar ahora los datos en json se añade en un json_encode
            echo json_encode($data);
        break;
        case "GetID":
            $data = $product->getProductsid($body["id_product"]);
            echo json_encode($data);
        break;

        case "Insert":
            $data = $product->insert_product($body["namepro"],$body["descriptionpro"],$body["pricepro"],$body["statepro"],$body["rutaimg"]);
            echo "Insertado Correctamente";
        break;
    }
?>