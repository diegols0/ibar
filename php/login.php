<?php
$con = mysql_connect('localhost','root','');
//$con = mysql_connect('mysql.hostinger.com.br','u389212034_ibar','123456');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
//mysql_select_db("u389212034_ibar");
mysql_select_db("ibar");

$login = mysql_real_escape_string($_POST['login']);
$senha 	= mysql_real_escape_string($_POST['senha']);
$senha  = hash('sha256',$senha);

$sql = "select * from user where email = '".$login."' and senha = '".$senha."'";

$result = mysql_query($sql);

if($result){
	$usuario = mysql_fetch_object($result);
	if($usuario->usuario_id) echo "1";
	else echo "0";
}else{
	echo "error = ".mysql_error();
}
mysql_close();
?>