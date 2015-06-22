<?php


$con = mysql_connect('localhost','root','');
//$con = mysql_connect('mysql.hostinger.com.br','u389212034_ibar','123456');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
//mysql_select_db("u389212034_ibar");
mysql_select_db("ibar");

$codigo = $_POST['codigo'];


$sql = "select * from estabelecimento where estabelecimento_id ='".$codigo."'";

$result = mysql_query($sql);


if($result){
	
	while($bar = mysql_fetch_array($result)) {
		$bar_add['codigo'] 	= $bar['estabelecimento_id'];
		$bar_add['nome'] 	= utf8_encode($bar['nome']);
		$bar_add['imagem'] 	= utf8_encode($bar['imagem']);
		

		$bares['bares'][] = $bar_add;

	}
	
	echo json_encode($bares);//('teste');
	die();
}else{
	echo json_encode("error = ".mysql_error());
	//echo "error = ".mysql_error();
}
mysql_close();
?>.