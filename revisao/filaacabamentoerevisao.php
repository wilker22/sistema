<?php	//filaacabamentoerevisao.php


	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if( login_check_acabamento($mysqli) == true) {




	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">
</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                   
                   
                   
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
                        	<p align="center" class="fontemenu">Fila Acab. e Revis�o</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/revisao/filaacabamentoerevisao.php" target="_self">
                        	<p align="center" class="fontemenu">Minha Fila</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/revisao/busca.php" target="_self">
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

<div class="boxfila"><div class="headerfila">Fila de Acabamento e Revis�o Usu�rio: $nome_user</div>	
<br /> 
_END;

		$stmt = $mysqli->prepare("SELECT `id_pedido`, `data_pedido`, `nome_cliente`, `cnpj_cliente`, `id_representante`, `ref_trabalho_pedido` FROM `pedido_megalabel` NATURAL JOIN cliente_megalabel NATURAL JOIN fluxo
WHERE  `id_area` ='4' AND `id_user`= ? ORDER BY id_pedido DESC");
	$stmt->bind_param('s', $id_user);
	$stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
	$stmt->store_result();
	$stmt->bind_result($id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente, $id_representante, $ref_trabalho_pedido);
	
	while ($stmt->fetch() ){
		      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
		      
		      												    $sql = $mysqli->prepare("SELECT `nome_representante` FROM `representantes` WHERE `id_representante` = ? ");
																$sql->bind_param('s', $id_representante);
																$sql->execute();
																$sql->store_result();
																	if (!$sql) printf("Error: %s.\n", $sql->error);
																$sql->bind_result($nome_representante);	
																$sql->fetch();
																$sql->close();
																
		      												    $sql = $mysqli->prepare("SELECT `id_ordem` FROM `ordem_producao_megalabel` WHERE `id_pedido` = ? ");
																$sql->bind_param('s', $id_pedido);
																$sql->execute();
																$sql->store_result();
																	if (!$sql) printf("Error: %s.\n", $sql->error);
																$sql->bind_result($id_ordem);	
																$sql->fetch();
																$sql->close();


/*
	$stmt = $mysqli->prepare("SELECT  `id_ordem`, `id_pedido` ,  `data_pedido` ,  `nome_cliente` ,  `cnpj_cliente` 
FROM  `pedido_megalabel` 
NATURAL JOIN cliente_megalabel
NATURAL JOIN fluxo
NATURAL JOIN ordem_producao_megalabel
WHERE  `id_area` =  '4' 
AND `id_user`= ?
ORDER BY id_pedido DESC");
	$stmt->bind_param('s', $id_user);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($id_ordem, $id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente);

	while ($stmt->fetch() ){
	      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
	      */

	      	      echo <<< _END
	      <div class="pedidofilacomerc">
	       	      												    <ul>
												    												    <li>
												    Representante: $nome_representante - &nbsp; Ref. Trabalho: $ref_trabalho_pedido
												    </li>
												    <br />

												    <li>

	      
												    <ul><li>Ordem: $id_ordem - &nbsp; 
												          Pedido: $id_pedido - &nbsp;
													      Data: $databr  - &nbsp;
													      Empresa:  $nome_cliente - &nbsp;
													      CNPJ: $cnpj_cliente </li>
													      	      </ul>
													      <div class="btpedido1">	
													      <form id="ver_ordem" action="acabereviverordem.php" method="post">
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<input type="submit"  name="ver_ordem" value="Ver Ordem de Produ��o"/>													  												      
</form>   

</div>
												</div>
													  
	   
_END;
	      	}
$stmt->close();
$mysqli->close();


	      echo <<< _END
</td>
                        
                    </tr>
                    
                    
                                           
                                        
                </table>
                
                
               
               
               
				<table id="rodape" align="center" width="986px" height="39px" border="0" cellpadding="0" cellspacing="0">
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
                        	<a href="http://www.rixd.com.br/megalabel/revisao/acabamentoerevisao.php" target="_self">
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
      <form id="form" action="/megalabel/revisao/process_login_revisao.php" name="login_form" method="post" autocomplete="off">
      
<input type="text" class="login" placeholder="Usu�rio" name="nome_user" required aria-required="true" title="nomeusuario"   pattern="\S{4,}">
      
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