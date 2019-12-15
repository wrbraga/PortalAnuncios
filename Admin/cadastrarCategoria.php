<?php
namespace Admin;

require $_SERVER["DOCUMENT_ROOT"] . '/App/ManipularCategorias.php';    

$categoria = new \App\ManipularCategorias();

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {     

        $categoria->setTitulo($_POST['titulo']);        
                                
        $imgData = file_get_contents($_FILES['file']['tmp_name']);
        $imageProperties = getimageSize($_FILES['file']['tmp_name']);                
        $categoria->setImage($imgData);                

    }
}

$retorno = $categoria->incluirCategoria();

header('Content-type: application/json');
if($retorno['statusQuery']) {
   echo json_encode(array('status' => 'success', 'message'=>'Cadastro com sucesso OK'));
} else {
   echo json_encode(array('status' => 'error', 'message'=>'Falha no cadastro!'));   
}