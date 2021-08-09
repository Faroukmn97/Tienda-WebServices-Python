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
    require_once('..\models\Order.php');
    $order = new Order();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAll":
            $data = $order->getOrders();
            // para poder visualizar ahora los datos en json se añade en un json_encode
            echo json_encode($data);
        break;
        case "GetID":
            $data = $order->getOrdersid($body["id_product"]);
            echo json_encode($data);
        break;
        case "Shopping":
            $data = $order->insert_order($body["id_user"],$body["id_product"],$body["date_order"],$body["state_order"],$body["address_order"],$body["phone_order"]);
            $response=new stdClass();
            $response->state=true;
            $response->detail="Order successfully added";
           echo json_encode($response);
        break;
        case "Product_order":
        $data = $order->getProduct_order();
        echo json_encode($data);
        break;
        case "Confirm_product":
        $json = json_encode($body["json_order"]);
        $row = json_decode($json);
        $response=new stdClass();
        $responseorder=new stdClass();
         foreach ($row as $x) {
                try {
                    $data = $order->confirm_order($x->id_order,$x->id_user,$x->id_product,$body["address_order"],$body["phone_order"]);
                    $response->state=true;
                    $response->detail="Con éxito";
                    $responseorder->id_user=$x->id_user;

                } catch (Exception $e) {
                    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
                    $response->state=false;
                    $response->detail="Sin éxito";
                }
            }
            if($response->state){
                $response->body=$order->getOrdersParams($responseorder->id_user,$body["address_order"],$body["phone_order"]);
                $response->header = $responseorder;
                echo json_encode($response);
            }
        break;
    }
?>