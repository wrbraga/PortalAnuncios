<?php
namespace App;

require dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';    
$objeto = new \App\ManipularSubCategorias();

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {                                                       
        $imgData = file_get_contents($_FILES['file']['tmp_name']);
        $imageProperties = getimageSize($_FILES['file']['tmp_name']);                
        $objeto->setImage($imgData);                
    }
}

$objeto->setTitulo($_POST['titulo']);
$objeto->setIdCategoria($_POST['id']);

$retorno = $objeto->incluirSubCategoria();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Cadastro com sucesso OK'));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha no cadastro!'));   
}