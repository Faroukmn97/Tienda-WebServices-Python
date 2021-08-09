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
    require_once('..\models\User.php');
    $user = new User();

    $body = json_decode(file_get_contents("php://input"),true);

    switch($_GET["op"]){
        case "GetAll":
            $data = $user->getUser();
            // para poder visualizar ahora los datos en json se añade en un json_encode
            echo json_encode($data);
        break;
        case "GetID":
            $data = $user->getUsersid($body["id_user"]);
            echo json_encode($data);
        break;

        case "LoginUser":
            //EXCEPCIONES
            // 1: Error de email
            // 2: Error de contraseña
            // 3: Usuario no existe
            $data = $user->login_user($body["emailuse"],$body["passworduse"]);
            $count=count($data);
            $json = json_encode($data);
            $row = json_decode($json);
            $response=new stdClass();
            $responsefinal=new stdClass();
            foreach ($row as $x) {
                $response->cod=$x->id_user;
                $response->username=$x->nameuse;
                $response->usermail=$x->emailuse;
                $response->pass=$x->passworduse;
            }
            if($count!=0){
                if($body["emailuse"]==$response->usermail)
                {
                    if($body["passworduse"]==$response->pass)
                    {
                        $responsefinal->state=true;
                        $responsefinal->detail="Logeado";
                        $responsefinal->userid=$response->cod;
                        $responsefinal->usename=$response->username;
                        $responsefinal->usemail=$response->usermail;
                        $responsefinal->usepassword=$response->pass;
                    }else{
                        $responsefinal->state=false;
                        $responsefinal->detail="Contraseña incorrecta";
                    }
                }else{
                    $responsefinal->state=false;
                    $responsefinal->detail="Email incorrecta";
                }

            }else{
                $responsefinal->state=false;
                $responsefinal->detail="No existe el usuario";
            }
            
           echo json_encode($responsefinal);
        break;
    }
?>