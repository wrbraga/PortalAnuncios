<?php
namespace BD;
error_reporting(E_ALL | E_STRICT | E_NOTICE);
ini_set('display_errors', 'On');

class Conexao {
    private static $servidor = "localhost";
    private static $usuario = "wesley";
    private static $senha = "senha";
    private static $bancoDeDados = "bdMeuSite";
    private static $pdo;
    
    public function __construct() {
        self::conectar();
    }
    
    public function __destruct() {
        self::$pdo = null;
    }


    public static function conectar() {
        $stringConexao = "mysql:host=" . self::$servidor . ";dbname=" . self::$bancoDeDados;        
        try {
            if(is_null(self::$pdo)) {                                
                self::$pdo = new \PDO($stringConexao, self::$usuario, self::$senha);
            }
            return self::$pdo;        
        } catch (PDOException $ex) {
            $ex->getMessage();
        }
        return null;
    }
    
    public static function ExecutarSQL($sql,$bind) {        
        $resultado = array();
        $stmt = Conexao::conectar()->prepare($sql);
        
        if(!is_null($bind)) {
            foreach ($bind as $indice => $valor) {
                $stmt->bindValue(($indice+1),$valor);
            }
        }
        
        if($stmt->execute()) {            
            $resultado['statusQuery'] = true;
            $resultado['registros'] = $stmt->rowCount();
            if($resultado['registros'] > 0) {
                $resultado['dados'] = $stmt->fetchAll(\PDO::FETCH_ASSOC);            
            }
        } else {
            $resultado['statusQuery'] = false;
            $resultado['dados'] = NULL;
            $resultado['registros'] = 0;
        }
        
        return $resultado;
    }
        
    
}
