<?php
   session_start();
   $userx = isset($_POST['userx'])?$_POST['userx']:null;
   $emailusx = isset($_POST['emailusx'])?$_POST['emailusx']:null;
   $nameusx = isset($_POST['nameusx'])?$_POST['nameusx']:null;
   $detailuserx = isset($_POST['detailuserx'])?$_POST['detailuserx']:null;
    $response=new stdClass();
    
    if(is_null($userx) || is_null($emailusx) || is_null($nameusx)|| is_null($detailuserx)){
       $response->state=false;
       $response->detail="No logeado";
        echo json_encode($response);
    }else{
        $_SESSION['id_user']=$userx;
        $_SESSION['nameus']=$nameusx;
        $_SESSION['usermail']=$emailusx;
        $_SESSION['passworduse']=$detailuserx;
       // $response->$nameusx;
        $response->state=true;
        $response->detail="Logeado";
        echo json_encode($response);
    } 
?>