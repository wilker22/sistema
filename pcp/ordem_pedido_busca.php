<?php

		include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_pcp($mysqli) == true) {


 if (isset($_POST['verpedido'])){
 
$id_pedido = $_POST['id_pedido'];

    $stmt = $mysqli->prepare("SELECT   id_cliente ,  id_pedido ,  data_pedido ,  email_cliente_pedido ,  qtd_pedido ,  valor_faca_pedido ,  valor_cyrel_pedido ,  valor_milheiro_pedido , processo_pedido ,  trabalho_pedido ,  obs_pedido ,  pedido_cliente_pedido ,  material_pedido ,  acabamento1_pedido ,  acabamento2_pedido ,  rotulagem_pedido ,  id_representante ,   cond_pag_pedido ,  end_cobranca_pedido ,  opc_faturamento_pedido ,  tipo_frete_pedido ,  transp_frete_pedido ,   cnpj_frete_pedido ,  tel_frete_pedido ,  cid_frete_pedido ,  est_frete_pedido ,   empresa_nri_pedido ,  cnpj_nri_pedido ,  endereco_nri_pedido ,  bairro_nri_pedido ,   telefone_nri_pedido ,  ie_nri_pedido ,  cep_nri_pedido ,  estado_nri_pedido ,   cidade_nri_pedido ,  nome_cliente ,  cnpj_cliente ,  endereco_cliente ,  bairro_cliente ,  telefone_cliente ,  ie_cliente ,  cep_cliente ,  estado_cliente ,  cidade_cliente ,  endereco_entrega_cliente, ref_trabalho_pedido, cond_pag_pedido1, cond_pag_pedido2  
FROM   pedido_megalabel  
NATURAL JOIN cliente_megalabel
WHERE   id_pedido  = ? ");
   $stmt->bind_param('s', $id_pedido);
    $stmt->execute();
        $stmt->bind_result($id_cliente, $id_pedido, $data_pedido, $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido,$processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $id_representante,  $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido,  $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido,  $empresa_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido,  $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido,  $cidade_nri_pedido, $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente, $ref_trabalho_pedido, $cond_pag_pedido1, $cond_pag_pedido2);

$stmt->fetch();
	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
$stmt->close();
		 	   
		 	   $stmt=$mysqli->prepare("SELECT `nome_representante` FROM `representantes` WHERE `id_representante` = ?");
		 	   $stmt->bind_param('s', $id_representante);   
		 	   $stmt->execute();
               $stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);
	           $stmt->bind_result($nome_representante);	    	           
	           $stmt->fetch();
	           $stmt->close();
	           
	           $stmt = $mysqli->prepare("SELECT `nf_data` FROM data_nf WHERE `id_pedido` = ?");
	           $stmt->bind_param('s', $id_pedido);
	           $stmt->execute();
	           $stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);
	           $stmt->bind_result($nf_data); 
	           $stmt->fetch();
	           if($stmt->num_rows >0){
	      $nf_data_br = implode("-",array_reverse(explode("-",$nf_data)));
	           }
	           else{
		       $nf_data_br = "NP";
	           }
	           $stmt->close();

	      
	echo <<< _END
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">
	<script>

    
     </script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                                        
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/arte/arte.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/pcp/pcp.php" target="_self">
                        	<p align="center" class="fontemenu">Fila PCP</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/pcp/pcpfila.php" target="_self">
                        	<p align="center" class="fontemenu">Minha Fila </p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_3.jpg" width="146px" height="62px" align="center">
                        	
                        	<a href="http://www.rixd.com.br/megalabel/pcp/busca.php" target="_self">
                        	<p align="center" class="fontemenu">Buscar</p>
                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	
                        	<a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                        	<p align="center" class="fontemenu">Realizar Logout</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_5.jpg" width="116px" height="62px" align="center">
                        	
                       
                             <p align="center" class="fontemenu"></p>
                </a>
                         
                        </td>                        
                        <td valign="top" width="356px" height="62px" align="center">
                        	
                        	<img name="Contatos" align="middle" src="/megalabel/img/menu6.jpg" border="0" height="62" width="472" />
                        	
                        </td>
                        
                        
                    </tr>	 
                    
                </table>
                
                <table align="center" width="986px" border="0" cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px" align="center">
	

	
	<div id="boxverpedido_e_ordem">

_END;

if($pedido_cliente_pedido == 0){
	echo <<< _END
<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data:&nbsp; $databr
_END;
}
else{
	
	echo <<< _END
	<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data:$databr &nbsp; | &nbsp; Pedido cliente: $pedido_cliente_pedido
_END;
}

if($nf_data_br == "NP"){
	echo "</div>";
}
else{
	echo "| &nbsp; Data NF: $nf_data_br</div>";
}
echo <<< _END
	<ul>
	<li>
	$erro
	</li>
		<ul><li id="boxverpedidotabcentrobot"><b>Ref. Trabalho: $ref_trabalho_pedido</b></li></ul>

	
	<div class="verpedidoesq">
	<ul>
	<li class="boxverpedidotab">Representante: $nome_representante</li> 
	<li class="boxverpedidotab">Email Cliente:$email_cliente_pedido</li> 
	<li class="boxverpedidotab">Valor Faca: $valor_faca_pedido</li>
	<li class="boxverpedidotab">Valor Cyrel: $valor_cyrel_pedido</li>
	<li class="boxverpedidotab">Valor (milheiro): $valor_milheiro_pedido</li>
	<li class="boxverpedidotab">Quantidade: $qtd_pedido</li>
	<li class="boxverpedidotab">Processo: $processo_pedido</li>
	<li class="boxverpedidotab">Trabalho Novo: $trabalho_pedido</li>
	<li id="obsverpedido">Obs./Alteração: $obs_pedido</li>
	<li class="boxverpedidotab">Material: $material_pedido</li>
	<ul id="acabrot">
	<li id="boxverpedidotabac1">Acabamento 1: $acabamento1_pedido</li>
	<li class="boxverpedidotab">Acabamento 2: $acabamento2_pedido</li>
	<li id="boxverpedidotabrt">Rotulagem: $rotulagem_pedido</li>
	</ul>
	</ul>
	</div>
	
	<div class="verpedidodir">
	<ul><li class="boxverpedidotabcentro"><b>Cliente</b></li></ul>
	<ul>
	<li class="boxverpedidotab">Empresa: $nome_cliente</li>
	<li class="boxverpedidotab">CNPJ: $cnpj_cliente</li>
	<li class="boxverpedidotab">Endereço: $endereco_cliente</li>
	<li class="boxverpedidotab">Bairro: $bairro_cliente</li>
	</ul>
	<div class="verpedidodir1">
	<ul>
	<li class="boxverpedidotab">Telefone: $telefone_cliente</li>
    <li class="boxverpedidotab">Cep: $cep_cliente</li> 	
	</ul>
	</div>
	
	<div class="verpedidodir2">
	<ul>
	<li class="boxverpedidotab">I.E: $ie_cliente</li>
	<li class="boxverpedidotab">Estado: $estado_cliente</li>
	</ul>
	</div>
	
	
	<ul>
    <li id="boxverpedidotabcentroendentrega">Endereço para Entrega: $endereco_entrega_cliente</li>
	</ul>
	
	<ul>
	<li id="boxverpedidotabcentrocidade">Cidade Entrega: $cidade_cliente</li>
	</ul>
	
	<ul><li class="boxverpedidotabcentro"><b>Nota de Remessa de industrialização</b></li></ul>
	
	<ul>
	<li class="boxverpedidotab">Empresa: $empresa_nri_pedido_nri_pedido</li>
	<li class="boxverpedidotab">Endereço: $endereco_nri_pedido</li>
	<li class="boxverpedidotab">Telefone: $telefone_nri_pedido</li>	
    </ul>
    
	<div class="verpedidodir1">
	<ul>
	<li class="boxverpedidotab">CNPJ: $cnpj_nri_pedido</li>
	<li class="boxverpedidotab">Cep: $cep_nri_pedido</li>	
	<li class="boxverpedidotab">Estado: $estado_nri_pedido</li>
	</ul>
	</div>
	
	<div class="verpedidodir2">
	<ul>
	<li class="boxverpedidotab">I.E: $ie_nri_pedido</li>	
	<li class="boxverpedidotab">Bairro: $bairro_nri_pedido</li>
	<li class="boxverpedidotab">Cidade: $cidade_nri_pedido</li>
	</div>	
	
	<ul><li id="boxverpedidotabcentroend">Endereço de Cobrança: $end_cobranca_pedido</li></ul>
	
	<ul><li id="boxverpedidotabcentrofpag">Forma de Pagto: - 
_END;

	      	        
	     $stmt=$mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =0");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($forma_pag_pedido0);
    $stmt->fetch();
	    
	    echo "$forma_pag_pedido0 - ";
	$stmt->close();    
	    
	    
	$stmt=$mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =1");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($forma_pag_pedido1);
    $stmt->fetch();
	    
	    echo "$forma_pag_pedido1 - ";
	$stmt->close();    
    
	    
	$stmt=$mysqli->prepare("SELECT `forma_pag_pedido`
FROM `tipo_pag_pedido`
WHERE `id_pedido` = ?
AND `pos_tipo_pag` =2");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($forma_pag_pedido2);
    $stmt->fetch();
	    
	    echo "$forma_pag_pedido2 - ";
    $stmt->close();    

	    
	    

echo <<< _END
	</li></ul>
		<ul><li id="boxverpedidotabcentroopfat">Opção de Faturamento: $opc_faturamento_pedido</li>
	<li class="boxverpedidotabcentro" >
	Condições de Pagto: $cond_pag_pedido
_END;
	
	if($cond_pag_pedido1 !=""){
		echo "/$cond_pag_pedido1";
	}
	else{
		echo "";
	}
	if ($cond_pag_pedido2 != ""){
		echo "/$cond_pag_pedido2";
	}
	echo <<< _END
		
	</li>
	</ul>
	
	
	</div>
	
	
	
	<div id="botomvp">
	
	<ul><li id="boxverpedidotabcentrobot"><b>Modalidade de Frete</b></li></ul>

<ul class="verpedidoesqbot">
<li class="boxverpedidotab">
Tipo de frete: $tipo_frete_pedido
</li>
<li class="boxverpedidotab">
CNPJ: $cnpj_frete_pedido
</li>
<li class="boxverpedidotab">
Cidade: $cid_frete_pedido
</li>
</ul>



<ul class="verpedidodirbot">
<li class="boxverpedidotab">
Transportadora: $transp_frete_pedido
</li>
<li class="boxverpedidotab">
Telefone: $tel_frete_pedido
</li>
<li class="boxverpedidotab">
Estado: $est_frete_pedido
</li>
</ul>

	<ul>
	
	
	
_END;
	      
	      
	      	    echo "<li id='boxverpedidotabcentrosr'><b>Serigrafica:</b> - ";
	      	        
	      $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =0");	        
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_serigrafica_pedido0);
    $stmt->fetch();
	    
	    echo "$nome_serigrafica_pedido0 - ";
    $stmt->close();    
	    
	    
	    
	    
	      $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =1");	        
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_serigrafica_pedido1);
    $stmt->fetch();
	    
	    echo "$nome_serigrafica_pedido1 - ";
    $stmt->close();    


	    
	    
	      $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =2");	        
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_serigrafica_pedido2);
    $stmt->fetch();
	    
	    echo "$nome_serigrafica_pedido2 - ";
    $stmt->close();    

	    
	    
	      $stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido`
FROM `serigrafica_pedido`
WHERE `id_pedido` = ?
AND `pos_serigrafica` =3");	        
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_serigrafica_pedido3);
    $stmt->fetch();
	    
	    echo "$nome_serigrafica_pedido3 - ";
    $stmt->close();    

	    
    
     echo "</li>";
     
     
     
     	      
     	        echo "<li class='boxverpedidotabcentro'><b>Tinta Impressão:</b> - ";
     	      
	        
     	   $stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=0");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido0);       
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido0 - ";
    $stmt->close();    
    
    
    
	    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=1");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido1);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido1 - ";
    $stmt->close();    

	    
	    
	    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=2");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido2);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido2 - ";
    $stmt->close();    


	    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=3");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido3);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido3 - ";
    $stmt->close();    


    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=4");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido4);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido4 - ";
    $stmt->close();    



	    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=5");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido5);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido5 - ";
    $stmt->close();    



$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=6");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido6);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido6 - ";
    $stmt->close();    


    
$stmt = $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? AND `pos_tinta_imp`=7");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($nome_tinta_imp_pedido7);
    $stmt->fetch();
	    
	    echo "$nome_tinta_imp_pedido7 - ";
    $stmt->close();    
    
echo "</li></uL></div>";



$stmt=$mysqli->prepare("SELECT * FROM `ordem_producao_megalabel` WHERE `id_pedido`= ?");
    $stmt->bind_param('s', $id_pedido);	        
	$stmt->execute();
	$stmt->store_result();
	            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	    	           
    $stmt->bind_result($id_pedido, $id_ordem, $data_aprov_ordem, $largura_papel_ordem, $metros_lineares_ordem, $n_engrenagem_ordem, $faca_ordem, $rotulo_ordem, $data_entrega_prevista, $qtd_final);
    $stmt->fetch();
    $stmt->close();    

	$data_aprov_ordem_br = implode("-",array_reverse(explode("-",$data_aprov_ordem)));

	$data_pedido_br = implode("-",array_reverse(explode("-",$data_pedido)));
	
	$data_entrega_prevista_br= implode("-",array_reverse(explode("-",$data_entrega_prevista)));


if($id_ordem == 0){
	echo "<div id='header_ver_ordem'>Ordem de Serviço: NP </div>";
}
else{
		echo "<div id='header_ver_ordem'>Ordem de Serviço: $id_ordem </div>";
}



echo <<< _END



<div class="ver_ordem_esq1">
<ul><li class="boxverpedidotab">
Data de Entrada: $data_pedido_br
</li></ul>
</div>

<div class="ver_ordem_dir1">
<ul><li class="boxverpedidotab">
Data de Aprovação: $data_aprov_ordem_br
</li></ul>
</div>
<div class="ver_ordem_dir2">
<ul><li class="boxverpedidotab">
&nbsp; Data de Entrega Prevista: $data_entrega_prevista_br
</li></ul>
</div>

<div class="ver_ordem_esq">
<ul>
<li class="boxverpedidotab">
Quantidade Final: $qtd_final
</li>

<li class="boxverpedidotab">
Largura Papel: $largura_papel_ordem
</li>
<li class="boxverpedidotab">
Metros Lineares: $metros_lineares_ordem
</li>
</div>
<div class="ver_ordem_dir">
<li class="boxverpedidotab">
Engrenagem Nº: $n_engrenagem_ordem
</li>
<li class="boxverpedidotab">
Faca: $faca_ordem
</li>
<li class="boxverpedidotab">
Rotulo: $rotulo_ordem
</li>
													      <div class="btpedido1">	      

<li>




</li>
</div>
</ul>
</div>



        </ul>
   

    </div>
    </td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table align="center" width="986px" height="39px" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	
                        <td width="986px" height="39px" align="center" valign="top">
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="981" /> 
                        </td>
                        
                    </tr>	 
                    
                </table>
                
</center>
              
</body>
</html>

_END;

   
   }
   }
   else{
echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

	<script>
		
	</script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/pcp/pcp.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                         
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                           
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_3.jpg" width="146px" height="62px" align="center">
                        	
                        	<p align="center" class="fontemenu"></p>
                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	
                            <p align="center" class="fontemenu"></p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_5.jpg" width="116px" height="62px" align="center">
                        	
                       
                             <p align="center" class="fontemenu"></p>
                </a>
                         
                        </td>
                        
                        <td valign="top" width="356px" height="62px" align="center">
                        	
                        	<img name="Contatos" align="middle" src="/megalabel/img/menu6.jpg" border="0" height="62" width="472" />
                        	
                        </td>
                        
                        
                    </tr>	 
                    
                </table>
                
                <table align="center" width="986px" border="0"  cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px"  align="center">
                            
                            
                            
                            <h2 id="h2cliente">FAVOR REALIZAR O LOGIN</h2>
                                                    <div id="formblack">
  
  <div id="formblackheader">
  <span>Login</span>
  </div>
  
  <div id="formcampos">
      <form id="form" action="/megalabel/pcp/process_login_pcp.php" name="login_form" method="post" autocomplete="off">
      
<input type="text" class="login" placeholder="Usuário" name="nome_user" required aria-required="true" title="nomeusuario"   pattern="\S{4,}">
      
      <input type="password" class="login" id="senha" name="p" placeholder="senha" title="Password" required aria-required="true" pattern="\S{4,}">
      
      <input id="submit" type="submit" value="Efetuar Login" name="posted">    
     
      
      </form>
      
  </div>
  
                        </div>                                                           

																

	      	
	      
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table align="center" id="rodape"  border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	
                        <td width="986px" height="39px" align="center" valign="top">
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="981" /> 
                        </td>
                        
                    </tr>	 
                    
                </table>
                
</center>
              
</body>
</html>
_END;

	
}
   
   ?>