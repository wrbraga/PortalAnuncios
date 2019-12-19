<?php
namespace BD;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require 'Conexao.class.php';

class Itens {
    protected $id;
    protected $idCategoria;
    protected $idSubCategoria;
    protected $montadora;
    protected $descricao;
    protected $image;
    protected $preco;
    protected $conn;
    
    public function __construct() {        
        $this->conn = new \BD\Conexao();
    }
    
    public function __destruct() {
        $this->conn = NULL;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }
    
    function getIdSubCategoria() {
        return $this->idSubCategoria;
    }
    
    function getMontadora() {
        return $this->montadora;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getImage() {
        return stripslashes ($this->image);
    }
    
    function getPreco() {
        return $this->preco;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setIdCategoria($id) {
        $this->idCategoria = $id;
    }
    
    function setIdSubCategoria($id) {
        $this->idSubCategoria = $id;
    }
    
    function setMontadora($montadora) {
        $this->montadora = $montadora;
    }

    function setDescricao($texto) {
        $this->descricao = filter_var($texto, FILTER_SANITIZE_STRING);        
    }

    function setImage($image) {
        $this->image = addslashes($image);
    }
    
    function setPreco($valor) {
        $this->preco = filter_var($valor, FILTER_SANITIZE_NUMBER_FLOAT);
    }
        
}

