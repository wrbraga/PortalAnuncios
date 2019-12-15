<?php
namespace acessorios;

class Utilitarios {
    public function tratarCampoTexto($texto) {         
         return htmlentities($texto, ENT_QUOTES, 'UTF-8');
    }
    
    public function dataAtual() {
        
    }
    
    // Tipo 0 - Nome; 1 - Sigla
    public function retornaInfoEstados($tipo) {
        require_once $_SERVER["DOCUMENT_ROOT"] . '/acessorios/listaEstados.php';
        $objEstados = json_decode($listaDeEstados);
        $estados = $objEstados->UF;
        $ret = array();
        
        foreach ( $estados as $e) {
            if($tipo == 0) {
                $ret[] = $e->nome;
            } else {
                $ret[] = $e->sigla;
            }
        }
        return $ret;
    }
    /***
     * $id - É o ID do estado
     * $tipo - É 0 para NOME e 1 para SIGLA
     */
    public function retornaNomeEstado($id, $tipo) {
        $lista = $this->retornaInfoEstados($tipo);
        return $lista[$id];
    }
              
}