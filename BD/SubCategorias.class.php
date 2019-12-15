<?php
namespace BD;

include_once dirname(__DIR__,1) . '/BD/Conexao.class.php';
use BD\Conexao as ConexaoSubCategoria;

class SubCategorias {
    protected $id;
    protected $idCategoria;
    protected $titulo;
    protected $image;
    protected $conn;
    
    public function __construct() {        
        $this->conn = new ConexaoSubCategoria();
    }
    
    function getId() {
        return $this->id;
    }
    
    function getIdCategoria() {
        return $this->idCategoria;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getImage() {
        return stripslashes ($this->image);
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setIdCategoria($id) {
        $this->idCategoria = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = filter_var($titulo, FILTER_SANITIZE_STRING);        
    }

    function setImage($image) {
        $this->image = addslashes($image);
    }
        
}

