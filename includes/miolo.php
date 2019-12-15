<?php
namespace includes;

require_once dirname(__DIR__,1) . '/includes/geral.php';
include_once dirname(__DIR__,1) . '/App/ManipularCategorias.php';
include_once dirname(__DIR__,1) . '/App/ManipularSubCategorias.php';

$objCatergorias = new \App\ManipularCategorias();
$objSubCatergorias = new \App\ManipularSubCategorias();

$col = 3;
$categorias = 5;

echo "<div class='bg-light'>";
echo "<div style='height: 15px '></div>"; 
echo "<div class='row'>";
$objCatergorias->listarCategorias();
$subcategorias = $objSubCatergorias->listarSubCategoria(1);

echo "<pre>";
//print_r($subcategorias);
echo "</pre>";

if($objCatergorias->categorias['registros'] > 0) {
    foreach ($objCatergorias->categorias['dados'] as $indice => $valor) {    
        $html = "<div class='col-lg-2'>";
        $html .= "    <div class='card-img border-bottom'>";
        $html .= '          <img src="data:image/jpeg;base64,'.base64_encode( $valor['imagem'] ).'"/>';
        $html .= "        <strong class='card-title text-info'>".$valor['titulo']."</strong>";
        $html .= "    </div>            ";
        $html .= "    <div class='list-group'>";       
        
        try {         
            $subcategorias = $objSubCatergorias->listarSubCategoria($valor['id']);
            if($objSubCatergorias->subcategorias['registros'] > 0) {
                foreach ($subcategorias as $item) {                
                  $html .= "      <a class='' href=''>". $item['titulo'] ."</a>";    
                }
            }
        } catch(PDOException $e) {
            $html .= "";
        }        

        $html .= "    </div>";
        $html .= "<div style='height: 15px '></div>"; 
        $html .= "</div>";         
        
        echo $html;
        
        
        //echo $objCatergorias->listarCategoria($valor['id']);
        if((($indice+1) % $categorias) == 0) {
            echo "</div><div class='row'>";
        }
    }
}
echo '</div></div>';
?>
