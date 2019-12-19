<?php
namespace App;

require dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';    
$objeto = new \App\ManipularSubCategorias();

$id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
$html = "<option value=0 selected disabled>Subcategoria</option>";

$objeto->listarSubCategoria($id);

foreach ($objeto->subcategorias['dados'] as $info) {
    $html .= "<option value=" . $info['id'].">" . $info['titulo'] . "</option>";
}
echo $html;