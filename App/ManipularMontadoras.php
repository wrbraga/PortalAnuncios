<?php
namespace App;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require_once dirname(__DIR__,1) . '/includes/geral.php';
require_once dirname(__DIR__,1) . '/BD/Montadoras.class.php';

class ManipularMontadoras extends \BD\Montadoras {
    public $montadoras;

    public function listarMontadoras($complemento = null) {                        
        $sql = "SELECT * FROM tbMontadora ";
        if(!is_null($complemento)) {
            $sql .= $complemento;
        }
        $this->montadoras = Conexao::ExecutarSQL($sql, NULL);
        if($this->montadoras['registros'] > 0) {
            return $this->montadoras['dados'];
        } else {
            return $this->montadoras['dados'] = null;
        }
    }
    
    public function listarMontadora($id) {
        $sql = "SELECT * FROM tbMontadora WHERE id = ?";        
        $this->montadoras = \BD\Conexao::ExecutarSQL($sql, array($idCategoria));          
        
        if($this->montadoras['registros'] > 0) {
            $this->setId($this->montadoras['dados'][0]['id']);
            $this->setNome($this->montadoras['dados'][0]['nome']);
            $this->setImage($this->montadoras['dados'][0]['imagem']);
            return $this->montadoras['dados'];
        } else {
            return $this->montadoras['dados'] = null;
        }
    }
   
    public function incluirMontadora() {
        $sql = "INSERT INTO `tbMontadora`(`id`, `nome`, `imagem`) VALUES (NULL,?,?)"; 
        $dados = array($this->getId(), $this->getNome(), $this->getImage());                
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function alterarMontadora() {
        $sql = "UPDATE `tbMontadora` SET `nome` = ?";
        $dados = array($this->getNome());
        if(!empty($this->getImage())) {
            $sql .= ",`imagem` = ? "; 
            $dados[] = $this->getImage();
        }
        $sql .= " WHERE id=?";
        $dados[] = $this->getId();
        
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function excluirMontadora() {
        $sql = "DELETE FROM `tbMontadora` WHERE id = ?";        
        $dados = array($this->getId());
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
}
