<?php
namespace App;

session_start();
header('Content-type: application/json'); 
require dirname(__DIR__,1) . '/App/manipularUsuario.php';
 
$usuario = new \App\ManipularUsuarios();

$retorno = $usuario->removerUsuario($_SESSION['loginID']);
  
if($retorno['statusQuery']) {    
    unset($_SESSION);
    session_destroy();
    
    echo json_encode(array('status' => 'success', 'message'=>'Excluído com sucesso!'));
} else {
    echo json_encode(array('status' => 'error', 'message'=>'Falha na exclusão do usuário!'));   
}