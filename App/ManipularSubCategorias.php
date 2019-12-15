<?php
namespace App;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/SubCategorias.class.php';

class ManipularSubCategorias extends \BD\SubCategorias {
    public $categorias;
    public $subcategorias;

    public function listarSubCategorias($complemento = null) {                        
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
    
    public function listarSubCategoria($idCategoria) {
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
    
    public function listarItens($idCategoria) {
        try {        
            $sql = "SELECT tbItens.descricao FROM `tbItens` WHERE tbItens.idCategoria = ?";
            $this->itens = \BD\Conexao::ExecutarSQL($sql, array($idCategoria));                
            return $this->itens;
        } catch(PDOException $e) {
            return null;
        }
    }

    public function totalSubCategorias() {
        $sql = "SELECT * FROM tbSubCategorias";
        $dados = \BD\Conexao::ExecutarSQL($sql, NULL);                
        return $dados['registros'];        
    }
    
    public function idCategorias() {
        $sql = "SELECT id FROM tbSubCategorias";
        $dados = \BD\Conexao::ExecutarSQL($sql, NULL);
        $ret = array();
        for($i = 0; $i < $dados['registros']; $i++) {
            $ret[] = $dados['dados'][$i]['id'];
        }
        return $ret;
        
    }
    
    public function incluirSubCategoria() {
        $sql = "INSERT INTO `tbSubCategorias`(`id`, `idCategoria`, `titulo`, `imagem`) VALUES (NULL,?,?,?)"; 
        $dados = array($this->getIdCategoria(), $this->getTitulo(), $this->getImage());                
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function alterarSubCategoria() {
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
    
    public function excluirSubCategoria() {
        $sql = "DELETE FROM `tbSubCategorias` WHERE id = ?";        
        $dados = array($this->getId());
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
}
