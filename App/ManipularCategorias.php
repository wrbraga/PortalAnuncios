<?php
namespace App;

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/Categorias.class.php';

class ManipularCategorias extends \BD\Categorias {
    public $categorias;
    public $subcategorias;
    
    public function __destruct() {
        $this->categorias = null;
        $this->subcategorias = null;
        parent::__destruct();
    }
    
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
    
    public function listarCategoria($idCategoria) {
        $sql = "SELECT * FROM tbCategorias WHERE id = ?";        
        $this->categorias = \BD\Conexao::ExecutarSQL($sql, array($idCategoria));          
        
        if($this->categorias['registros'] > 0) {
            $this->setId($this->categorias['dados'][0]['id']);
            $this->setTitulo($this->categorias['dados'][0]['titulo']);
            $this->setImage($this->categorias['dados'][0]['imagem']);
            return $this->categorias['dados'];
        } else {
            return $this->categorias['dados'] = null;
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
