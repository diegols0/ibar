<?php
echo "string";die();
$con = mysql_connect('localhost','root','');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
mysql_select_db("ibar");

$codigoEstabelecimento  = mysql_real_escape_string($_POST['codigoEstabelecimento']);
$codigoUsuario  = mysql_real_escape_string($_POST['codigoUsuario']);

$sql = " insert into favoritos (usuario_id,
							estabelecimento_id)
					VALUES
					('".$codigoUsuario."',
					'".$codigoEstabelecimento."')";

$result = mysql_query($sql);

if($result){
	echo "1";
}else{
	echo "error = ".mysql_error();
}
mysql_close();
?>