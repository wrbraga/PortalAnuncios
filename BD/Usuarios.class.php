<?php
namespace BD;
require 'Conexao.class.php';

class Usuarios {
    protected $id;
    protected $nome;
    protected $endereco;
    protected $bairro;
    protected $estado;
    protected $cidade;
    protected $cep;
    protected $ddd;
    protected $telefone;
    protected $email;
    protected $hash;
    protected $dataInclusao;
    protected $ativo;
    protected $nivel;
    protected $cpfcnpj;
    protected $conn;
    
    public function __construct() {        
        $this->conn = new \BD\Conexao();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getBairro() {
        return $this->bairro;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getDdd() {
        return $this->ddd;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getHash() {
        return $this->hash;
    }

    public function getDataInclusao() {
        return $this->dataInclusao;
    }

    public function getAtivo() {
        return $this->ativo;
    }
    
    public function getNivel() {
        return $this->nivel;
    }
    
    public function getCPFCNPJ() {
        return $this->cpfcnpj;
    }
    
    public function setId($id) {                     
        $this->id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setNome($nome) {         
        $this->nome = filter_var($nome, FILTER_SANITIZE_STRING);
    }

    public function setEndereco($endereco) {
        $this->endereco = filter_var($endereco, FILTER_SANITIZE_STRING);
    }

    public function setBairro($bairro) {
        $this->bairro = filter_var($bairro, FILTER_SANITIZE_STRING);
    }

    public function setEstado($estado) {
        $this->estado = filter_var($estado, FILTER_SANITIZE_STRING);
    }

    public function setCidade($cidade) {
        $this->cidade = filter_var($cidade, FILTER_SANITIZE_STRING);
    }

    public function setCep($cep) {
        $this->cep = filter_var($cep, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setDdd($ddd) {
        $this->ddd = filter_var($ddd, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setTelefone($telefone) {
        $this->telefone = filter_var($telefone, FILTER_SANITIZE_NUMBER_INT);
    }

    public function setEmail($email) {
        $this->email = filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    
    public function setHash($hash) {
        $this->hash = $hash;
    }

    public function setDataInclusao($dataInclusao) {
        $this->dataInclusao = $dataInclusao;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
    
    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }
    
    public function setCPFCNPJ($valor) {
        $this->cpfcnpj = $valor;
    }
    
    public function getConn() {
        return $this->conn;
    }

}