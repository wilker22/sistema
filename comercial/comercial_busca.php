<?php
	
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_repre($mysqli) == true) {


if ($_POST['alfabeto'] ){
	$alfabeto = $_POST['alfabeto'];


$busca_alfabeto = ''.$alfabeto.'%';	
//$busca_alfabeto = "%s%";	

$stmt = $mysqli->prepare("SELECT `nome_cliente`, `id_cliente` FROM `cliente_megalabel` WHERE `nome_cliente` LIKE  ? ");
$stmt->bind_param('s', $busca_alfabeto);
$stmt->execute();
$stmt->store_result();
    if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	
$stmt->bind_result($nome_cliente, $id_cliente);

	$dataString = '';

if ($stmt->num_rows>0){
while($stmt->fetch()){
	      
		$dataString .= $nome_cliente.'|'.$id_cliente.'||';
		
	      	}
	      	}
	      	else{
		      	$dataString .= "Nao existe Cliente que comece com essa letra|0||";
	      	}
$stmt->close();
$mysqli->close();
	echo $dataString;
	exit();

	}



	if(isset($_POST['results_box2']) ){
	
	$id_cliente = $_POST['results_box2'];
	
	$stmt = $mysqli->prepare("SELECT * 
FROM  `cliente_megalabel` 
WHERE  `id_cliente` = ?");
$stmt->bind_param('s', $id_cliente);
$stmt->execute();
$stmt->store_result();
           if ($stmt->error ) printf("Error: %s.\n", $sql->error);								
$stmt->bind_result($id_cliente, $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente);
   $dataString = '';
		
while($stmt->fetch()){
	      
		$dataString .= $id_cliente.'|'.$nome_cliente.'|'.$cnpj_cliente.'|'.$endereco_cliente.'|'.$bairro_cliente.'|'.$telefone_cliente.'|'.$ie_cliente.'|'.$cep_cliente.'|'.$estado_cliente.'|'.$cidade_cliente.'|'.$endereco_entrega_cliente.'||';
		
	      	}
$stmt->close();
$mysqli->close();
	echo $dataString;
	exit();

   
    
    }	
$mysqli->close();
	}


else { 
   // The correct POST variables were not sent to this page.
   echo 'Invalid Request';
}
?>