<?php //comercial.php
	
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	



  $data_pedido =  date("Y/m/d");
  $databr = implode("/",array_reverse(explode("/",$data_pedido)));
  /*

for ($x = 0 ; $x <=201 ; $x++){
       $id_cliente = "23";
/*
    $cnpj_cliente = "07787570000102"; 
$endereco_cliente = ""; 
$bairro_cliente = ""; 
$telefone_cliente = ""; 
$ie_cliente = ""; 
$cep_cliente = ""; 
$estado_cliente = "" ;
$cidade_cliente = "" ;
$endereco_entrega_cliente = "";
*/
	
$id_representante = "10004";

    
    
    
    
 $email_cliente_pedido = "email_teste@stress.com.br";
 $qtd_pedido = "2300";
 $valor_faca_pedido = "2";
 $valor_cyrel_pedido = "200";
 $valor_milheiro_pedido = "50";
 $processo_pedido = "digital";
 $trabalho_pedido = "nao";
 $obs_pedido = "obs padrao";
 $pedido_cliente_pedido = "134";
 $material_pedido = "raflex transparente";
 
 $nome_tinta_imp_pedido0 = "branco";
 $nome_tinta_imp_pedido1 = "pantone";
 $nome_tinta_imp_pedido2 = "preto";
 $nome_tinta_imp_pedido3 = "";
 $nome_tinta_imp_pedido4 = "";
 $nome_tinta_imp_pedido5 = "";
 $nome_tinta_imp_pedido6 = "";
 $nome_tinta_imp_pedido7 = "";
 
 $acabamento1_pedido = "verniz uv brilho";
 $acabamento2_pedido = "nenhum";
 
 $nome_serigrafica_pedido0 = "";
 $nome_serigrafica_pedido1 = "";
 $nome_serigrafica_pedido2 = "";
 $nome_serigrafica_pedido3 = "nao";
 $cond_pag_pedido1="15";
 $cond_pag_pedido2 ="30";
 
 
 $rotulagem_pedido = "automatica";
 $cond_pag_pedido = "10";
 
 $forma_pag_pedido0 = "cheque";
 $forma_pag_pedido1 = "";
 $forma_pag_pedido2 = ""; 
 
 $end_cobranca_pedido = "Rua Cachoeira, 1756";
 $opc_faturamento_pedido = "4";
 $tipo_frete_pedido = "megalabel";
 $transp_frete_pedido = "";
 $cnpj_frete_pedido = "";
 $tel_frete_pedido = "";
 $cid_frete_pedido = "";
 $est_frete_pedido = "";
 $empresa_nri_pedido = "";
 $telefone_nri_pedido = "";
 $cnpj_nri_pedido = "";
 $ie_nri_pedido = "";
 $endereco_nri_pedido = "";
 $cep_nri_pedido = "";
 $bairro_nri_pedido = "";
 $estado_nri_pedido = "";
 $cidade_nri_pedido = "";		
 
 
$ref_trabalho_pedido= "referencia padrao";

   $email_cliente_pedido="ricardo3845@gmail.com";




		
$sql = $mysqli->prepare("INSERT INTO `pedido_megalabel` (`id_pedido`, `data_pedido`, `email_cliente_pedido`, `qtd_pedido`, `valor_faca_pedido`, `valor_cyrel_pedido`, `valor_milheiro_pedido`, `processo_pedido`, `trabalho_pedido`, `obs_pedido`, `pedido_cliente_pedido`, `id_cliente`, `material_pedido`, `acabamento1_pedido`, `acabamento2_pedido`, `rotulagem_pedido`, `id_representante`, `cond_pag_pedido`, `end_cobranca_pedido`, `opc_faturamento_pedido`, `tipo_frete_pedido`, `transp_frete_pedido`, `cnpj_frete_pedido`, `tel_frete_pedido`, `cid_frete_pedido`, `est_frete_pedido`, `empresa_nri_pedido`, `cnpj_nri_pedido`, `endereco_nri_pedido`, `bairro_nri_pedido`, `telefone_nri_pedido`, `ie_nri_pedido`, `cep_nri_pedido`, `estado_nri_pedido`, `cidade_nri_pedido`, `ref_trabalho_pedido`, `cond_pag_pedido1`, `cond_pag_pedido2`) VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? )");

$sql->bind_param('sssssssssssssssssssssssssssssssssssss', $data_pedido, $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido, $processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $id_cliente, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $id_representante, $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido, $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido, $empresa_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido, $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido, $cidade_nri_pedido, $ref_trabalho_pedido, $cond_pag_pedido1, $cond_pag_pedido2);
$sql->execute();
$sql->store_result();	
            if ($sql->error ) printf("Error: %s.\n", $sql->error);							
$last_id = $sql->insert_id; 
$sql->close();
                      

	$id_area1="2";
$id_area2="3";
$id_area3="9";
$id_area4="4";
$id_area5="5";  
$stmt= $mysqli->prepare("INSERT INTO responsaveis  
VALUES 
('5', ?, ?), 
('11', ?, ?), 
('10', ?, ?), 
('63', ?, ?), 
('14', ?, ?)");


$stmt->bind_param('ssssssssss', $id_area1, $last_id, $id_area2, $last_id, $id_area3, $last_id, $id_area4, $last_id, $id_area5, $last_id);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	
$stmt->close();  





$stmt = $mysqli->prepare("INSERT INTO fluxo (`id_area`, `id_pedido`, `id_user`) VALUES ('1', ?, '5')");
$stmt->bind_param('s', $last_id);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->close();            							

	 
	 


$stmt = $mysqli->prepare( "INSERT INTO tinta_imp_pedido  VALUES 
( ? , 0, ?),
( ? , 1, ?),
( ? , 2, ?),
( ? , 3, ?),
( ? , 4, ?),
( ? , 5, ?),
( ? , 6, ?),
( ? , 7, ?)");
$stmt->bind_param('ssssssssssssssss', $last_id, $nome_tinta_imp_pedido0, $last_id, $nome_tinta_imp_pedido1, $last_id, $nome_tinta_imp_pedido2, $last_id, $nome_tinta_imp_pedido3, $last_id, $nome_tinta_imp_pedido4, $last_id, $nome_tinta_imp_pedido5, $last_id, $nome_tinta_imp_pedido6, $last_id, $nome_tinta_imp_pedido7);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->close();            
			
			
			
	

$stmt = $mysqli->prepare("INSERT INTO serigrafica_pedido VALUES 
( ? , 0, ?),
( ? , 1, ?),
( ? , 2, ?),
( ? , 3, ?)");
$stmt->bind_param('ssssssss', $last_id, $nome_serigrafica_pedido0, $last_id, $nome_serigrafica_pedido1, $last_id, $nome_serigrafica_pedido2, $last_id, $nome_serigrafica_pedido3);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->close();            

						
$stmt = $mysqli->prepare("INSERT INTO tipo_pag_pedido 
VALUES 
( ? ,'0', ?),
( ? ,'1', ?),
( ? ,'2', ?)");
$stmt->bind_param('ssssss', $last_id, $forma_pag_pedido0, $last_id, $forma_pag_pedido1, $last_id, $forma_pag_pedido2);
$stmt->execute();
$stmt->store_result();
             if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->close();






/*
$to = "pedido.mega@hotmail.com";
$subject = "Pedido: $last_id Cliente: $nome_cliente ";
$message = "Pedido $last_id 
Informaчѕes do pedido.
Email Cliente: $email_cliente_pedido
Valor Faca: $valor_faca_pedido
Valor Cyrel: $valor_cyrel_pedido
Valor Milheiro: $valor_milheiro_pedido
Quantidade: $qtd_pedido
Trabalho antigo?: $trabalho_pedido
Alteraчуo: $obs_pedido
Rotulagem: $rotulagem_pedido
Material: $material_pedido
Acabamento 1: $acabamento1_pedido
Acabamento 2: $acabamento2_pedido
Tinta Impressуo: $nome_tinta_imp_pedido0, $nome_tinta_imp_pedido1, $nome_tinta_imp_pedido2, $nome_tinta_imp_pedido3
Serigrafica: $nome_serigrafica_pedido0, $nome_serigrafica_pedido1, $nome_serigrafica_pedido2, $nome_serigrafica_pedido3
Condiчуo de Pgato.: $cond_pag_pedido
Formas de Pagamento: $forma_pag_pedido0, $forma_pag_pedido1, $forma_pag_pedido2
Endereчo de Cobranчa: $end_cobranca_pedido
Opчуo de Faturamento: $opc_faturamento_pedido
Tipo de frete: $tipo_frete_pedido
Transportadora: $transp_frete_pedido
Cnpj Frete: $cnpj_frete_pedido
Telefone Frete: $tel_frete_pedido
Cidade Frete: $cid_frete_pedido
Estado Frete: $est_frete_pedido
";
$from = "ricardo@rixd.com.br";
$headers = "From:" . $from;
mail($to,$subject,$message,$headers);
*/


			 	}	
			 		



	

$mysqli->close();
	

    

	
?>