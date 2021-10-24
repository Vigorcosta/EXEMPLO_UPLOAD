<?php
//Enviar mensagem para outra página
session_start();
//limitar as extensões?(Sim ou não)
$limitar_ext ="sim";
//extensões autorizadas
$extensoes_validas = array('.jpg', '.jpeg', '.bmp','.pdf');
//caminho absoluto onde os arquivo serão armazenados
$caminho_absoluto = 'upload/';
//limitar o tamanho de arquivo? (sim ou não)
$limitar_tamanho ='nao';
//tamanho limite do arquivo em bytes
$tamanho_bytes ='2000000';
//Se existe o arquivo, indica se ele deve ser sobrescrito(sim ou não)
$sobrescrever = 'não';
//elimina o tempo de execução	
set_time_limit(0);

	$erro= FALSE;
	$nome_arquivo = $_FILES['arquivo']['name']; 
	$tamanho_arquivo =$_FILES['arquivo']['size'];
    $arquivo_temporario = $_FILES['arquivo']['tmp_name'];

	
	
	if($nome_arquivo){

	if($sobrescrever == 'nao' && file_exists($caminho_absoluto.$nome_arquivo)){
	 $erro= TRUE;
	 $_SESSION['msbox'] = 'arquivo já existe já existe';
	 header('location: index.php');
	}
	if(($limitar_tamanho == 'sim') && ($tamanho_arquivo > $tamanho_bytes)){
	 $erro= TRUE;
	 $_SESSION['msbox'] = 'Arquivo deve ter no máximo de 2mb';
	 header('location: index.php');
	 }
		
	$ext = strrchr($nome_arquivo, '.');
		
	if($limitar_ext='sim' && !in_array($ext,$extensoes_validas)){
	$erro= TRUE;
	$_SESSION['msbox'] = 'Extensão de arquivo invalida para upload.';		
	header('location: index.php');
	} 
	
    if(!$erro && move_uploaded_file($arquivo_temporario, "$caminho_absoluto/$nome_arquivo")){
	$_SESSION['msbox'] = 'O arquivo de ' . $nome_arquivo. '	foi concluido com sucesso.';
	header('location: index.php');
	}
	else
	{
	$_SESSION['msbox'] = 'O arquivo não pode ser copiado para o servidor';
	header('location: index.php');
	}	
  }
else
{
	$nome_arquivo='';
	$_SESSION['msbox'] = 'Por favor, selecione o arquivo para enviar!';
	header('location: index.php');
}



?>
</body>
</html>