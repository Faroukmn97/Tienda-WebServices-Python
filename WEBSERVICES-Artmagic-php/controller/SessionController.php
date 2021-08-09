<?php 
header('Access-Control-Allow-Origin: *');
session_start();
$response=new stdClass();
if(!isset($_SESSION['id_user'])){
	$response->state=false;
	$response->detail="No esta logeado";
	$response->open_login=true;
}else{
	$response->state=true;
	$response->detail="Esta logeado";
}
header('Content-Type: application/json');
echo json_encode($response);
?>