<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
</head>
<body>
<?php
	$hostname = "localhost";
	$user = "root";
	$password = "wesley";
	$db = "classificados";
	
	$connect = mysqli_connect($hostname,$user,$password,$db);
	
	if(mysqli_connect_error()) {
		echo mysqli_connect_error();
	} else {
		$sql = "select * from anuncios";
		$query = mysqli_query($connect,$sql);
		$dados = mysqli_fetch_array($query);
		
		foreach($dados as $i => $inf) {
			echo "<li>" . $i . " = " . $inf . "</li>";
		}
		
	}
	
	mysqli_close($connect);
?>
</body>
</html>