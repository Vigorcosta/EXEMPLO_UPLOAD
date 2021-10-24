<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>DICA DE PHP - Upload de arquivo</title>
</head>
<body>

<h1 align="center">Upload de Arquivos</h1>
<form method="POST" action="multiplo.php" enctype="multipart/form-data">
<div align="center">
<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
<input class="borda" type="file" name="arquivo">
<input class="btn" type="submit" value="enviar">
</div>
</form>
<h2 align="center">

<!--ALERTA-->
<?php
session_start();
if(isset($_SESSION['msbox']))
	{
	echo $_SESSION['msbox'];
	unset($_SESSION['msbox']);	
	}
?>
</h2>
	
	
</body>
</html>

<style>
	.borda{border: 2px solid; width: 400px; border-radius: 5px; border-color: blueviolet; }
	.btn {padding: 5px; border: 2px solid;  border-radius: 5px; border-color: blueviolet; background-color: darkmagenta; color:white;}
	.btn:hover{background-color: blueviolet; color: white}
</style>