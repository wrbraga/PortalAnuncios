<?php
require_once dirname(__DIR__,1) . '/App/manipularUsuario.php';
require_once dirname(__DIR__,1) . '/BD/Login.class.php';

$u = new ManipularUsuarios();

$ret = $u->listarUsuarios();

if($ret['statusQuery'] == true) {
    foreach ($ret['dados'] as $nome) {
        echo "<br>Encontrei : " . $nome['nome'] . " - " . $nome['dataInclusao'] . " - " .$nome['ativo'];
    }
}
$u->listarUsuario(1);

echo "<br>Nome Pelo método GET: " . $u->getNome();
echo "<br>Estado Pelo método GET: " . $u->getEstado(). "<br>";

$email = "wrbraga@yahoo.com.br";
$l = new Login($email, "123");
echo "<pre>";
print_r($l->retorno);
echo "</pre>";
$ret = $l->setHash($l->getHash($email));
echo "HASH: ";
print_r($ret);
echo "<p>";

$arq = array();
foreach(array_diff(scandir('../img/'), array('..', '.')) as $a) {
    if(strripos($a, ".png")) {
        $arq[] = $a;
    }
    
}

print_r($arq);
?>



<hr>
<a href="../index.php">Voltar</a>