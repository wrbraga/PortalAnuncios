<?php
namespace Admin;

require $_SERVER["DOCUMENT_ROOT"] . '/App/ManipularCategorias.php';    

$categoria = new \App\ManipularCategorias();
$categoria->setId($_POST['id']); 

$retorno = $categoria->excluirCategoria();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Exclusão com sucesso OK'));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha na exclusão!'));   
}