<?php
namespace BD;

require_once dirname(__DIR__,1) . '/BD/Conexao.class.php';

class Login extends \BD\Conexao {
    
    private $senha;
    private $email;
    private $hash;    
    
    public $id;
    public $nome;    
    public $ativo;
    public $nivel;    
    public $status;
    public $retorno;
    
    public function __construct($email, $senha) {        
        parent::__construct();
        $this->senha = $senha;
        $this->email = $email;               
    }
    
    public function executarLogin() {
        $hash = $this->getHash($this->email);
        if(!is_null($hash)) {
            $sql = "SELECT * FROM tbUsuarios WHERE email = ? and hash = ?";

            $this->retorno = \BD\Conexao::ExecutarSQL($sql, array($this->email,  $hash));
            if($this->retorno['registros'] > 0) {
                $this->id =  $this->retorno['dados'][0]['id'];
                $this->nome =  $this->retorno['dados'][0]['nome'];
                $this->ativo =  $this->retorno['dados'][0]['ativo'];
                $this->nivel = $this->retorno['dados'][0]['nivel'];
                $this->status = $this->retorno['registros'];
            }
            
        } else {
            $this->status = 0;
        }
    }

    public function getHash($email) {
        $sql = "SELECT hash FROM tbUsuarios WHERE email = ?";
        $ret = \BD\Conexao::ExecutarSQL($sql, array($email));
        if($ret['registros'] > 0) {
            $this->hash = $ret['dados'][0]['hash'];
            return $this->hash;
        } else {
            $this->hash = null;
            return null;
        }
    }
    
    public static function setHash($senha) {
        return password_hash($senha, PASSWORD_DEFAULT);
    }   
                  
}

