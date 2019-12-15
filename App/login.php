<?php
namespace App;
session_start();

require dirname(__DIR__,1) . '/acessorios/Utilitarios.php';
require dirname(__DIR__,1) . '/BD/Login.class.php';

$util = new \acessorios\Utilitarios();
$senha = $util->tratarCampoTexto($_POST['senha']);
$email = $util->tratarCampoTexto($_POST['email']);

$objLogin = new \BD\Login($email, $senha);
$objLogin->executarLogin();

header('Content-type: application/json');
if($objLogin->status) {
    $_SESSION['loginAtivo'] = $objLogin->ativo;
    $_SESSION['loginNome'] = $objLogin->nome;
    $_SESSION['loginID'] = $objLogin->id;
    $_SESSION['loginNivel'] = $objLogin->nivel;
    
    echo json_encode(array('status' => 'success', 'message'=>'Login OK'));
} else {
    echo json_encode(array('status' => 'error', 'message'=>'Falha na autenticação!'));   
}
    
?>