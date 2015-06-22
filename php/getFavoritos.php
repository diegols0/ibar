<?php
setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


$con = mysql_connect('localhost','root','');
if(!$con) die('Não foi possivel conectar: '.mysql_error());
mysql_select_db("ibar");


$usuario  = mysql_real_escape_string($_GET['usuario']);
	
	$sql = " 
	 SELECT U.nome, E.nome FROM user U, favoritos F, estabelecimento E WHERE F.estabelecimento_id = E.estabelecimento_id and U.usuario_id = F.usuario_id".$usuario;


$result = mysql_query($sql);

if($result){
	
	while($dados = mysql_fetch_array($result)) {
		
		$dados_add['codigo'] 	= $dados['codigo_posto'];
		$dados_add['nome'] 	 	= utf8_encode($dados['nome']);
		$dados_add['imagem']  = $dados['imagem'];

		$dados['postos'][] = $dados_add;
	}
	
	echo json_encode($dados);//('teste');
	die();
}else{
	echo json_encode("error = ".mysql_error());
	//echo "error = ".mysql_error();
}
mysql_close();
?>.