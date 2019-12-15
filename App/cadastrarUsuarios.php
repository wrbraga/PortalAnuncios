<?php
namespace App;
require dirname(__DIR__,1) . '/App/manipularUsuario.php';    

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
$usuario->setHash($_POST['password']);    
$usuario->setDataInclusao(date("Y-m-d"));    
$usuario->setAtivo(TRUE);                    
$usuario->setNivel(1);

$retorno = $usuario->incluirUsuario();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Cadastro com sucesso OK'));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha no cadastro!'));   
}
    