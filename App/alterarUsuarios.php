<?php
namespace App;

session_start();
require dirname(__DIR__,1) . '/App/manipularUsuario.php';    
require dirname(__DIR__,1) . '/acessorios/Utilitarios.php';    
    
$util = new \acessorios\Utilitarios();
$usuario = new \App\ManipularUsuarios();

$usuario->setNome($_POST['nome']);        
$usuario->setEndereco($_POST['endereco']);
$usuario->setBairro($_POST['bairro']);
$usuario->setEstado($_POST['estados']);
$usuario->setCidade($_POST['cidade']);
$usuario->setCep($_POST['cep']);
$usuario->setDdd($_POST['ddd']);
$usuario->setTelefone($_POST['telefone']);
$usuario->setEmail($_POST['email']);    

if(!is_null($_POST['password']) && !is_null($_POST['password2'])) {
    if($_POST['password'] == $_POST['password2']) {
        $usuario->setHash($_POST['password']);    
    } else {
         $usuario->setHash(null);    
    }
} else {
     $usuario->setHash(null);    
}

$usuario->setId($_POST['id']);

$retorno = $usuario->alterarUsuario();

header('Content-type: application/json');    
if($retorno['statusQuery']) {
    echo json_encode(array('status' => 'success', 'message'=>'Alteração com sucesso!'));
} else {
    echo json_encode(array('status' => 'error', 'message'=>'Falha na alteração dos dados!'));   
}
