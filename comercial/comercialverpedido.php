<?php //comercialverpedido.php




	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_repre($mysqli) == true) {	

   if (isset($_POST['verpedido']) ){
   

   
   $stmt= $mysqli->prepare("SELECT * 
FROM  `pedido_megalabel` 
NATURAL JOIN cliente_megalabel
WHERE  `id_pedido` = ? ");
$stmt->bind_param('s', $id_pedido);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->bind_result($id_cliente, $id_pedido, $data_pedido, $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido, $processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $id_representante2, $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido, $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido, $empresa_nri_pedido_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido, $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido, $cidade_nri_pedido, $ref_trabalho_pedido, $cond_pag_pedido1, $cond_pag_pedido2, $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente);
$stmt->fetch();    
	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
$stmt->close();
      
	      
	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

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
                        	<a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
                        	<p align="center" class="fontemenu">Adicionar Pedido</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/comercial/comercialpedidos.php" target="_self">
                        	<p align="center" class="fontemenu">Meus Pedidos</p>
                </a>
                         
                        </td>
                        
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	
                        	<a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                         	<p align="center" class="fontemenu">Realizar Logout</p>
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
                
                <table align="center" width="986px" height="478px" border="0" cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px" height="431px" align="center">
                            

	
	<div id="boxverpedido">
_END;

if($pedido_cliente_pedido == 0){
	echo <<< _END
<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data:$databr</div>
_END;
}
else{
	
	echo <<< _END
	<div id="headervp">Pedido: $id_pedido &nbsp; | &nbsp; Data: &nbsp; $databr &nbsp; | &nbsp; Pedido cliente: $pedido_cliente_pedido</div>
_END;
}
echo <<< _END
	
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
	
	<ul><li id="boxverpedidotabcentrocidade">Cidade Entrega: $cidade_cliente</li></ul>
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


$stmt= $mysqli->prepare("SELECT `forma_pag_pedido` 
FROM  `tipo_pag_pedido` 
WHERE  `id_pedido` = ? ");
$stmt->bind_param('s', $id_pedido);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->bind_result($forma_pag_pedido);  
  
  
  
    while($stmt->fetch()){
	    
	    echo "$forma_pag_pedido - ";
	    
    } 
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
$stmt=$mysqli->prepare("SELECT `nome_serigrafica_pedido` FROM  `serigrafica_pedido` WHERE  `id_pedido` = ? ");
$stmt->bind_param('s', $id_pedido);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
  
  
  echo "<li id='boxverpedidotabcentrosr'><b>Serigrafica:</b> - ";
  
$stmt->bind_result($nome_serigrafica_pedido);  
while($stmt->fetch()){	    
	    echo "$nome_serigrafica_pedido - ";
	    
    } 
     echo "</li>";
$stmt->close();     
     
     	      
     	      
$stmt= $mysqli->prepare("SELECT `nome_tinta_imp_pedido` 
FROM  `tinta_imp_pedido` 
WHERE  `id_pedido` = ? ");     	      
$stmt->bind_param('s', $id_pedido);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
  
  echo "<li id='boxverpedidotabcentroultimo'><b>Tinta Impressão:</b> - ";
$stmt->bind_result($nome_tinta_imp_pedido);  
    while($stmt->fetch()){
	    echo "$nome_tinta_imp_pedido - ";
	    
    } 
    $stmt->close();
    $mysqli->close();
 echo "</li>";

	      	echo <<< _END
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table align="center" width="986px" height="39px" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                    	
                        <td width="986px" height="39px" align="center" valign="top">
                            <img align="middle" src="/megalabel/img/rodape.jpg" border="0" height="39" width="986" /> 
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
                        	<a href="http://www.rixd.com.br/megalabel/comercial/comercial.php" target="_self">
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
      <form id="form" action="/megalabel/comercial/process_login_comercial.php" name="login_form" method="post" autocomplete="off">
      
<input type="text" class="login" placeholder="Usuário" name="nome_representante" required aria-required="true" title="nomeusuario"   pattern="\S{4,}">
      
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