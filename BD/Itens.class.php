<?php
namespace BD;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

require 'Conexao.class.php';

class Itens {
    protected $id;
    protected $idSubCategoria;
    protected $montadora;
    protected $descricao;
    protected $image;
    protected $conn;
    
    public function __construct() {        
        $this->conn = new \BD\Conexao();
    }
    
    function getId() {
        return $this->id;
    }
    
    function getIdSubCategoria() {
        return $this->idCategoria;
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

    function setId($id) {
        $this->id = $id;
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
        
}

