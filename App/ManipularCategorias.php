<?php
namespace App;

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/Categorias.class.php';

class ManipularCategorias extends \BD\Categorias {
    public $categorias;
    public $subcategorias;

    public function listarCategorias($complemento = null) {                        
        $sql = "SELECT * FROM tbCategorias ";
        if(!is_null($complemento)) {
            $sql .= $complemento;
        }
        $this->categorias = \BD\Conexao::ExecutarSQL($sql, NULL);
        if($this->categorias['registros'] > 0) {
            return $this->categorias['dados'];
        } else {
            return $this->categorias['dados'] = null;
        }
    }
    
//    public function listarCategoria($idCategoria) {
//        $sql = "SELECT * FROM tbCategorias WHERE id = ?";        
//        $dados = Conexao::ExecutarSQL($sql, array($idCategoria));          
//
//        $html = "<div class='col-lg-2'>";
//        $html .= "    <div class='card-img border-bottom'>";
//        $html .= '          <img src="data:image/jpeg;base64,'.base64_encode( $dados['dados'][0]['imagem'] ).'"/>';
//        $html .= "        <strong class='card-title text-info'>".$dados['dados'][0]['titulo']."</strong>";
//        $html .= "    </div>            ";
//        $html .= "    <div class='list-group'>";
//       
//        try {         
//            $this->listarItens($dados['dados'][0]['id']);
//            if($this->itens['registros']) {
//                foreach ($this->itens['dados'] as $item) {                
//                  $html .= "      <a class='' href=''>". $item['descricao'] ."</a>";    
//                }
//            }
//        } catch(PDOException $e) {
//            $html .= "";
//        }        
//
//        $html .= "    </div>";
//        $html .= "<div style='height: 15px '></div>"; 
//        $html .= "</div>";                    
//        
//        return $html;
//    }
    
    public function listarItens($idCategoria) {
        try {        
            $sql = "SELECT tbItens.descricao FROM `tbItens` WHERE tbItens.idCategoria = ?";
            $this->itens = \BD\Conexao::ExecutarSQL($sql, array($idCategoria));                
            return $this->itens;
        } catch(PDOException $e) {
            return null;
        }
    }

    public function totalCategorias() {
        $sql = "SELECT * FROM tbCategorias";
        $dados = \BD\Conexao::ExecutarSQL($sql, NULL);                
        return $dados['registros'];        
    }
    
    public function idCategorias() {
        $sql = "SELECT id FROM tbCategorias";
        $dados = \BD\Conexao::ExecutarSQL($sql, NULL);
        $ret = array();
        for($i = 0; $i < $dados['registros']; $i++) {
            $ret[] = $dados['dados'][$i]['id'];
        }
        return $ret;
        
    }
    
    public function incluirCategoria() {
        $sql = "INSERT INTO `tbCategorias`(`id`, `titulo`, `imagem`) VALUES (NULL,?,?)"; 
        $dados = array($this->getTitulo(),$this->getImage());
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function alterarCategoria() {
        $sql = "UPDATE `tbCategorias` SET `titulo` = ?";
        $dados = array($this->getTitulo());
        if(!empty($this->getImage())) {
            $sql .= ",`imagem` = ? "; 
            $dados[] = $this->getImage();
        }
        $sql .= " WHERE id=?";
        $dados[] = $this->getId();
        
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function excluirCategoria() {
        $sql = "DELETE FROM `tbCategorias` WHERE id = ?";        
        $dados = array($this->getId());
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
}
