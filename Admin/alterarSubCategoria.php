<?php
namespace Admin;
require dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';    

$subcategoria = new \App\ManipularSubCategorias();
$subcategoria->setId($_POST['id']); 
$subcategoria->setIdCategoria($_POST['idcategoria']);
$subcategoria->setTitulo($_POST['descricao']);        

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {                                
        $imgData = file_get_contents($_FILES['file']['tmp_name']);
        $imageProperties = getimageSize($_FILES['file']['tmp_name']);                
        $subcategoria->setImage($imgData);                
    }
}

$retorno = $subcategoria->alterarSubCategoria();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Alteração com sucesso OK', 'imagem' => $imgData));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha na alteração!'));   
}