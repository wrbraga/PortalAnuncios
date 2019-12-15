<?php
namespace App;

require dirname(__DIR__,1) . '/BD/Usuarios.class.php';
require dirname(__DIR__,1) . '/BD/Login.class.php';

class ManipularUsuarios extends \BD\Usuarios {
    protected $dados;
    
    public function listarUsuario($id) {       
        $sql = "SELECT * FROM tbUsuarios WHERE id = ?";        
        $retorno = \BD\Conexao::ExecutarSQL($sql, array($id));  
        
        if($retorno['registros'] > 0) {
            $this->setId($retorno['dados'][0]['id']);
            $this->setNome($retorno['dados'][0]['nome']);
            $this->setEndereco($retorno['dados'][0]['endereco']);
            $this->setBairro($retorno['dados'][0]['bairro']);
            $this->setEstado($retorno['dados'][0]['estado']);
            $this->setCidade($retorno['dados'][0]['cidade']);
            $this->setCep($retorno['dados'][0]['cep']);
            $this->setDdd($retorno['dados'][0]['ddd']);
            $this->setTelefone($retorno['dados'][0]['telefone']);
            $this->setEmail($retorno['dados'][0]['email']);
            $this->setHash($retorno['dados'][0]['hash']);
            $this->setDataInclusao($retorno['dados'][0]['dataInclusao']);
            $this->setAtivo($retorno['dados'][0]['ativo']);            
        }
        return $retorno;
    }
    
    public function listarUsuarios() {
        $sql = "SELECT * FROM tbUsuarios"; 
        $retorno = \BD\Conexao::ExecutarSQL($sql, NULL);

        if($retorno['registros'] > 0) {
            $this->dados = $retorno['dados'];
        } else {
            return $retorno['dados'] = null;
        }
    }
    
    public function incluirUsuario() {
        $sql = "INSERT INTO `tbUsuarios`(`id`, `nome`, `endereco`, `bairro`, `estado`, `cidade`, `cep`, `ddd`, `telefone`, `email`, `hash`, `dataInclusao`, `ativo`, `nivel`) VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?)";        
        $hash = \BD\Login::setHash($this->hash);
        $dados = array($this->nome,$this->endereco, $this->bairro, $this->estado, $this->cidade, $this->cep, $this->ddd, $this->telefone, $this->email, $hash, $this->dataInclusao, $this->ativo, $this->nivel);
        
        return \BD\Conexao::ExecutarSQL($sql, $dados);          
    }
    
    public function removerUsuario($id) {
        $sql = "DELETE FROM `tbUsuarios` WHERE id = ?";        
        $dados = array($id);
        return \BD\Conexao::ExecutarSQL($sql, $dados);  
    }
    
    public function alterarUsuario() {
        try {
            $sql = "UPDATE `tbUsuarios` SET `nome` = ?, `endereco` = ?, `bairro` = ?, `estado` = ?, `cidade` = ?, `cep` = ?, `ddd` = ?, `telefone` = ?, `email` = ?";
            $dados = array($this->nome,$this->endereco, $this->bairro, $this->estado, $this->cidade, $this->cep, $this->ddd, $this->telefone, $this->email);
            if(!is_null($this->hash)) {
                $sql .= ", `hash` = ? WHERE `id` = ?";        
                $hash = \BD\Login::setHash($this->hash);
                $dados[] = $hash;
                $dados[] = $this->getId();
                        
            } else {
                $sql .= " WHERE `id` = ?";        
                $dados = array($this->nome,$this->endereco, $this->bairro, $this->estado, $this->cidade, $this->cep, $this->ddd, $this->telefone, $this->email, $this->getId());
            }                
            $ret = \BD\Conexao::ExecutarSQL($sql, $dados);         
            return $ret;
        } catch (PDOException $mensagem) {
            echo "Error na alteração dos dados do usuário: " . $mensagem->getMessage();
        }
    }
    
    public function retornaIdPorCPF($cpf) {
        
    }
    
    public function retornaIdPorEmail($email) {
        
    }
}    


