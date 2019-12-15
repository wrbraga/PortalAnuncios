<?php
namespace App;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/Itens.class.php';

class ManipularItens extends \BD\Itens {
    public $categorias;
    public $subcategorias;

    public function listarItens($complemento = null) {                        
        $sql = "SELECT * FROM tbSubCategorias ";
        if(!is_null($complemento)) {
            $sql .= $complemento;
        }
        $this->subcategorias = Conexao::ExecutarSQL($sql, NULL);
        if($this->subcategorias['registros'] > 0) {
            return $this->subcategorias['dados'];
        } else {
            return $this->subcategorias['dados'] = null;
        }
    }
    
    public function listarItem($idCategoria) {
        $sql = "SELECT * FROM tbSubCategorias WHERE idCategoria = ?";        
        $this->subcategorias = \BD\Conexao::ExecutarSQL($sql, array($idCategoria));          
        
        if($this->subcategorias['registros'] > 0) {
            $this->setId($this->subcategorias['dados'][0]['id']);
            $this->setIdCategoria($this->subcategorias['dados'][0]['idCategoria']);
            $this->setTitulo($this->subcategorias['dados'][0]['titulo']);
            $this->setImage($this->subcategorias['dados'][0]['imagem']);
            return $this->subcategorias['dados'];
        } else {
            return $this->subcategorias['dados'] = null;
        }
    }
   
    public function incluirItem() {
        $sql = "INSERT INTO `tbSubCategorias`(`id`, `idCategoria`, `titulo`, `imagem`) VALUES (NULL,?,?,?)"; 
        $dados = array($this->getIdCategoria(), $this->getTitulo(), $this->getImage());                
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function alterarItem() {
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
    
    public function excluirItem() {
        $sql = "DELETE FROM `tbSubCategorias` WHERE id = ?";        
        $dados = array($this->getId());
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
}
