<?php
namespace App;

require dirname(__DIR__,1) . '/App/ManipularItens.php';    
$objeto = new \App\ManipularItens();

//if (count($_FILES) > 0) {
if (is_uploaded_file($_FILES['file']['tmp_name'])) {                                                       
    $imgData = file_get_contents($_FILES['file']['tmp_name']);
    $imageProperties = getimageSize($_FILES['file']['tmp_name']);                
    $objeto->setImage($imgData);                
}

$objeto->setIdCategoria($_POST['idCategoria']);
$objeto->setIdSubCategoria($_POST['idSubCategoria']);
$objeto->setMontadora($_POST['idMontadora']);
$objeto->setDescricao($_POST['descricao']);
$objeto->setPreco($_POST['preco']);

$retorno = $objeto->incluirItem();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Cadastro com sucesso OK'));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha no cadastro!'));   
}