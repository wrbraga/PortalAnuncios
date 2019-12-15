<?php
	function exibir($texto) {
		echo $texto . "<br>";
	}
	exibir($_POST['nome']);
	exibir($_POST['idade']);
	exibir($_POST['email']);
	
	echo "<a href='index.php'>Voltar</a>"
?>