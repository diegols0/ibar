<?php


$con = mysql_connect('localhost','root','');
//$con = mysql_connect('mysql.hostinger.com.br','u389212034_ibar','123456');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
//mysql_select_db("u389212034_ibar");
mysql_select_db("ibar");
$id_estabelecimento  = mysql_real_escape_string($_GET['estabelecimento_id']);

$sql = " select * from estabelecimento where estabelecimento_id = ".$id_estabelecimento;

$result = mysql_query($sql);

if($result){
	$estabelecimento = mysql_fetch_object($result);
	

	$dados_estabelecimento['codigo_id'] 	= 	$estabelecimento->estabelecimento_id;
	$dados_estabelecimento['nome'] 	= 	utf8_encode($estabelecimento->nome);
	$dados_estabelecimento['imagem'] 	= 	$estabelecimento->imagem;

	
	echo json_encode($dados_estabelecimento);
	die();
}else{
	echo json_encode("error = ".mysql_error());
	//echo "error = ".mysql_error();
}
mysql_close();
?>.