<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$con = mysql_connect('localhost','root','');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
mysql_select_db("ibar");

$id_estabelecimento    = mysql_real_escape_string($_POST['estabelecimento_id']);
$id_usuario  = mysql_real_escape_string($_POST['usuario_id']);

$sql = " delete from favoritos where estabelecimento_id = ".$id_estabelecimento . " and usuario_id = ".$id_usuario;

$result = mysql_query($sql);

if($result){
	echo "1";
	die();
}else{
	echo json_encode("error = ".mysql_error());
	//echo "error = ".mysql_error();
}
mysql_close();
?>.