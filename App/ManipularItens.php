<?php
namespace App;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/Itens.class.php';

class ManipularItens extends \BD\Itens {
    public $itens;
    
    public function __destruct() {
        $this->itens = NULL;                
        parent::__destruct();        
    }

    public function listarItens($complemento = null) {                        
        $sql = "SELECT * FROM tbItens ";
        if(!is_null($complemento)) {
            $sql .= $complemento;
        }
        $this->itens = \BD\Conexao::ExecutarSQL($sql, NULL);
        if($this->itens['registros'] > 0) {
            return $this->itens['dados'];
        } else {
            return $this->itens['dados'] = null;
        }
    }
    
    public function listarItem($id) {
        $sql = "SELECT * FROM tbItens WHERE id = ?";        
        $this->itens = \BD\Conexao::ExecutarSQL($sql, array($id));
        
        if($this->itens['registros'] > 0) {
            $this->setId($this->itens['dados'][0]['id']);
            $this->setIdCategoria($this->itens['dados'][0]['idCategoria']);
            $this->setTitulo($this->itens['dados'][0]['titulo']);
            $this->setImage($this->itens['dados'][0]['imagem']);
            return $this->itens['dados'];
        } else {
            return $this->itens['dados'] = null;
        }
    }
   
    public function incluirItem() {
        $sql = "INSERT INTO `tbItens`(`id`, `idSubCategoria`, `montadora`, `descricao`, `preco`, `imagem`) VALUES (NULL,?,?,?,?,?,?)"; 
        $dados = array($this->getId(), $this->getIdSubCategoria(), $this->getMontadora(), $this->getDescricao(), $this->getPreco(), $this->getImage());
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function alterarItem() {
        $sql = "UPDATE `tbItens` SET `idSubCategoria` = ?, `montadora` = ?, `descricao` = ?";
        $dados = array($this->getIdSubCategoria(), $this->getMontadora(), $this->getDescricao());
        if(!empty($this->getImage())) {
            $sql .= ",`imagem` = ? "; 
            $dados[] = $this->getImage();
        }
        $sql .= " WHERE id = ?";
        $dados[] = $this->getId();
        
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function excluirItem() {
        $sql = "DELETE FROM `tbItens` WHERE id = ?";        
        $dados = array($this->getId());
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
}
