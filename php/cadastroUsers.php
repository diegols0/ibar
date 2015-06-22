<?php
$con = mysql_connect('localhost','root','');
//$con = mysql_connect('mysql.hostinger.com.br','u389212034_ibar','123456');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
//mysql_select_db("u389212034_ibar");
mysql_select_db("ibar");

	$nome 	= mysql_real_escape_string($_POST['nome']);
	$email 	= mysql_real_escape_string($_POST['email']);
	$senha 	= mysql_real_escape_string($_POST['senha']);
	$senha  = hash('sha256',$senha);


$sql = "insert into user(nome, email, senha) values ('".$nome."',
													 '".$email."',
													 '".$senha."')";

$result = mysql_query($sql);

if($result){
	echo "1";	
}else{
	echo "error = ".mysql_error();
}
mysql_close();
?>