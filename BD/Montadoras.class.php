<?php
namespace BD;

require dirname(__DIR__,1) . '/BD/Conexao.class.php';

class Montadoras {
    protected $id;
    protected $nome;
    protected $imagem;
    protected $conn;
    
    public function __construct() {        
        $this->conn = new \BD\Conexao();
    }
    
    function getId() {
        return $this->id;
    }
    
    function getNome() {
        return $this->nome;
    }
    
    function getImage() {
        return stripslashes ($this->image);
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setNome($nome) {
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);        
    }

    function setImage($image) {
        $this->image = addslashes($image);
    }
        
}