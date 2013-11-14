<?php //pcpalterapedido.php

	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");


	sec_session_start();
	
if(login_check_pcp($mysqli) == true) {

       if (isset($_POST['altpedido'])){
              
    

 $id_pedido =  $_POST['id_pedido'];
 $email_cliente_pedido =  $_POST['email_cliente_pedido']; //ok
 $qtd_pedido =  $_POST['qtd_pedido']; //ok
 $valor_faca_pedido =  $_POST['valor_faca_pedido']; //ok
 $valor_cyrel_pedido =  $_POST['valor_cyrel_pedido']; //ok
 $valor_milheiro_pedido =  $_POST['valor_milheiro_pedido']; //ok
 $processo_pedido =  $_POST['processo_pedido']; //ok
 $trabalho_pedido =  $_POST['trabalho_pedido']; //ok
 $obs_pedido =  $_POST['obs_pedido'];//ok
 $pedido_cliente_pedido =  $_POST['pedido_cliente_pedido'];  //nao precisa
 $id_cliente =  $_POST['id_cliente']; //ok
 $material_pedido =  $_POST['material_pedido']; //ok
 
 $nome_tinta_imp_pedido0 =  $_POST['nome_tinta_imp_pedido0'];//alterado
 $nome_tinta_imp_pedido1 =  $_POST['nome_tinta_imp_pedido1'];//alterado
 $nome_tinta_imp_pedido2 =  $_POST['nome_tinta_imp_pedido2'];//alterado
 $nome_tinta_imp_pedido3 =  $_POST['nome_tinta_imp_pedido3'];//alterado
 $nome_tinta_imp_pedido4 =  $_POST['nome_tinta_imp_pedido4'];//alterado
 $nome_tinta_imp_pedido5 =  $_POST['nome_tinta_imp_pedido5'];//alterado
 $nome_tinta_imp_pedido6 =  $_POST['nome_tinta_imp_pedido6'];//alterado
 $nome_tinta_imp_pedido7 =  $_POST['nome_tinta_imp_pedido7'];//alterado
 
 $acabamento1_pedido =  $_POST['acabamento1_pedido']; //ok
 $acabamento2_pedido =  $_POST['acabamento2_pedido'];	//ok
 
 $nome_serigrafica_pedido0 =  $_POST['nome_serigrafica_pedido0']; //alterado
 $nome_serigrafica_pedido1 =  $_POST['nome_serigrafica_pedido1']; //alterado
 $nome_serigrafica_pedido2 =  $_POST['nome_serigrafica_pedido2']; //alterado
 $nome_serigrafica_pedido3 =  $_POST['nome_serigrafica_pedido3']; //alterado
 
 
 $rotulagem_pedido =  $_POST['rotulagem_pedido']; //ok
 $id_representante =  $_POST['id_representante']; //ok
 $cond_pag_pedido =  $_POST['cond_pag_pedido']; //ok
 
 $forma_pag_pedido0 =  $_POST['forma_pag_pedido0'];  //alterado
 $forma_pag_pedido1 =  $_POST['forma_pag_pedido1'];  //alterado
 $forma_pag_pedido2 =  $_POST['forma_pag_pedido2'];  //alterado 
 
 $end_cobranca_pedido =  $_POST['end_cobranca_pedido']; //ok
 $opc_faturamento_pedido =  $_POST['opc_faturamento_pedido']; // ok
 $tipo_frete_pedido =  $_POST['tipo_frete_pedido']; //ok
 $transp_frete_pedido =  $_POST['transp_frete_pedido']; //ok
 $cnpj_frete_pedido =  $_POST['cnpj_frete_pedido']; //ok
 $tel_frete_pedido =  $_POST['tel_frete_pedido']; //ok
 $cid_frete_pedido =  $_POST['cid_frete_pedido']; //ok
 $est_frete_pedido =  $_POST['est_frete_pedido']; //ok
 $empresa_nri_pedido =  $_POST['empresa_nri_pedido'];
 $telefone_nri_pedido =  $_POST['telefone_nri_pedido'];
 $cnpj_nri_pedido =  $_POST['cnpj_nri_pedido'];
 $ie_nri_pedido =  $_POST['ie_nri_pedido'];
 $endereco_nri_pedido =  $_POST['endereco_nri_pedido'];
 $cep_nri_pedido =  $_POST['cep_nri_pedido'];
 $bairro_nri_pedido =  $_POST['bairro_nri_pedido'];
 $estado_nri_pedido =  $_POST['estado_nri_pedido'];
 $cidade_nri_pedido =  $_POST['cidade_nri_pedido'];	
 


if($email_cliente_pedido== ""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Email cliente, o mesmo é obrigatorio!");     </script>
_END;
}
    elseif($valor_faca_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Valor Faca, o mesmo é obrigatorio!");     </script>
_END;
}
    elseif($valor_cyrel_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Valor Cyrel, o mesmo é obrigatorio!");     </script>
_END;
}
    elseif($valor_milheiro_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Valor Milheiro, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($qtd_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Quantidade, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($processo_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Processo, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($trabalho_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Trabalho, o mesmo é obrigatorio!");     </script>
_END;
}
    elseif($trabalho_pedido =="sim" && isset($_POST['alteracao_trabalho'])=="sim" && $obs_pedido =="" ){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Quando um trabalho antigo sofre alteração o campo Obs./Alteração é obrigatorio!");     </script>
_END;
}

	elseif($rotulagem_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Rotulagem, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($material_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Material, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($acabamento1_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Acabamento 1, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($acabamento2_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Acabamento 2, o mesmo é obrigatorio!");     </script>
_END;
}
    
	
	elseif($nome_tinta_imp_pedido0 =="" && $nome_tinta_imp_pedido1 =="" && $nome_tinta_imp_pedido2 =="" && $nome_tinta_imp_pedido3 =="" && $nome_tinta_imp_pedido4 =="" && $nome_tinta_imp_pedido5=="" && $nome_tinta_imp_pedido6 =="" && $nome_tinta_imp_pedido7 ==""){
echo <<< _END
<input type="hidden" name="verpedido2"/>
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Tinta Impressão, o mesmo é obrigatorio!");     </script>
_END;
}
	
	
	
	
	elseif($nome_serigrafica_pedido0 =="" && $nome_serigrafica_pedido1 =="" && $nome_serigrafica_pedido2 =="" && $nome_serigrafica_pedido3 ==""){	
	echo <<< _END
<input type="hidden" name="id_pedido_erro" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Serigrafica, o mesmo é obrigatorio!");     </script>
_END; 
}




	elseif($cond_pag_pedido =="" ){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Condições de Pagto, o mesmo é obrigatorio!");     </script>
_END;
}
    
    elseif($forma_pag_pedido0 =="" && $forma_pag_pedido1=="" && $forma_pag_pedido2==""){
echo <<< _END

													      <form action="pcpverpedido.php" method="post">
													      <input type="hidden" name="id_pedido" value="$id_pedido"/>
													      <input type="hidden" name="verpedido2"/>												
												          </form>


<script type="text/javascript">    alert  ("Favor selecionar pelo menos uma das opções de pagto (Cheque, Boleto Bancario ou Deposito)");     </script>
_END;
}
	
	elseif($end_cobranca_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo End. Cobrança, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($opc_faturamento_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Opção de Faturamento, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($tipo_frete_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($transp_frete_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo Transportadora em Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($cnpj_frete_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo CNPJ em Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($tel_frete_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo telefone em Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($cid_frete_pedido ==""){
echo <<< _END
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo cidade em Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}
	elseif($est_frete_pedido ==""){
echo <<< _END
<input type="hidden"  name="verpedido"/>											
<input type="hidden" name="id_pedido" value="$id_pedido"/>
<script type="text/javascript">    alert  ("Favor preencher o campo estado em Modalidade de Frete, o mesmo é obrigatorio!");     </script>
_END;
}		

else{

		
  $email_cliente_pedido  = sanitizeString($email_cliente_pedido ) ;
  $qtd_pedido = sanitizeString($qtd_pedido ) ;
  $valor_faca_pedido = sanitizeString($valor_faca_pedido ) ;
  $valor_cyrel_pedido = sanitizeString($valor_cyrel_pedido ) ; 
  $valor_milheiro_pedido= sanitizeString($valor_milheiro_pedido ) ;  
  $processo_pedido  = sanitizeString($processo_pedido ) ;
  $trabalho_pedido  = sanitizeString($trabalho_pedido ) ;
  $obs_pedido  = sanitizeString($obs_pedido ) ;
  $pedido_cliente_pedido= sanitizeString($pedido_cliente_pedido ) ;  
  
  $material_pedido  = sanitizeString($material_pedido ) ;
 
  $acabamento1_pedido = sanitizeString($acabamento1_pedido ) ;
  $acabamento2_pedido = sanitizeString($acabamento2_pedido ) ;

  $rotulagem_pedido = sanitizeString($rotulagem_pedido ) ;
  $cond_pag_pedido = sanitizeString($cond_pag_pedido ) ;

  $end_cobranca_pedido = sanitizeString($end_cobranca_pedido ) ; 
  $opc_faturamento_pedido= sanitizeString($opc_faturamento_pedido ) ;  
  $tipo_frete_pedido = sanitizeString($tipo_frete_pedido ) ;
  $transp_frete_pedido= sanitizeString($transp_frete_pedido ) ; 
  $cnpj_frete_pedido  = sanitizeString($cnpj_frete_pedido ) ;
  $tel_frete_pedido= sanitizeString($tel_frete_pedido ) ;
  $cid_frete_pedido = sanitizeString($cid_frete_pedido ) ;
  $est_frete_pedido  = sanitizeString($est_frete_pedido ) ;
  $empresa_nri_pedido_nri_pedido= sanitizeString($empresa_nri_pedido_nri_pedido ) ; 
  $telefone_nri_pedido  = sanitizeString($telefone_nri_pedido ) ;
  $cnpj_nri_pedido  = sanitizeString($cnpj_nri_pedido ) ;
  $ie_nri_pedido  = sanitizeString($ie_nri_pedido ) ;
  $endereco_nri_pedido= sanitizeString($endereco_nri_pedido ) ;
  $cep_nri_pedido  = sanitizeString($cep_nri_pedido ) ;
  $bairro_nri_pedido= sanitizeString($bairro_nri_pedido ) ; 
  $estado_nri_pedido = sanitizeString($estado_nri_pedido ) ; 
  $cidade_nri_pedido  = sanitizeString($cidade_nri_pedido ) ;
  
  
  
  $stmt = $mysqli->prepare("UPDATE `pedido_megalabel` SET `email_cliente_pedido` =  ?, `qtd_pedido` =  ?, `valor_faca_pedido` =  ?, `valor_cyrel_pedido` =  ?, `valor_milheiro_pedido` =  ?, `processo_pedido` =  ?, `trabalho_pedido` =  ?, `obs_pedido` =  ?, `pedido_cliente_pedido` =  ?, `material_pedido` =  ?, `acabamento1_pedido` =  ?, `acabamento2_pedido` =  ?, `rotulagem_pedido` =  ?, `cond_pag_pedido` =  ?, `end_cobranca_pedido` =  ?, `opc_faturamento_pedido` =  ?, `tipo_frete_pedido` =  ?, `transp_frete_pedido` =  ?, `cnpj_frete_pedido` =  ?, `tel_frete_pedido` =  ?, `cid_frete_pedido` =  ?, `est_frete_pedido` =  ?, `empresa_nri_pedido` =  ?, `cnpj_nri_pedido` =  ?, `endereco_nri_pedido` =  ?, `bairro_nri_pedido` =  ?, `telefone_nri_pedido` =  ?, `ie_nri_pedido` =  ?, `cep_nri_pedido`= ?, `estado_nri_pedido`= ?, `cidade_nri_pedido`= ? WHERE `id_pedido`= ? ");
  
  $stmt->bind_params('ssssssssssssssssssssssssssssssss', $email_cliente_pedido, $qtd_pedido, $valor_faca_pedido, $valor_cyrel_pedido, $valor_milheiro_pedido, $processo_pedido, $trabalho_pedido, $obs_pedido, $pedido_cliente_pedido, $material_pedido, $acabamento1_pedido, $acabamento2_pedido, $rotulagem_pedido, $cond_pag_pedido, $end_cobranca_pedido, $opc_faturamento_pedido, $tipo_frete_pedido, $transp_frete_pedido,  $cnpj_frete_pedido, $tel_frete_pedido, $cid_frete_pedido, $est_frete_pedido, $empresa_nri_pedido, $cnpj_nri_pedido, $endereco_nri_pedido, $bairro_nri_pedido, $telefone_nri_pedido, $ie_nri_pedido, $cep_nri_pedido, $estado_nri_pedido, $cidade_nri_pedido, $id_pedido);
  
  $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  $stmt->close();
  
  
  $stmt = $mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =0 LIMIT 1");
  $stmt->bind_params('ss', $nome_serigrafica_pedido0, $id_pedido );
  $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
  $stmt->close();  
      


  $stmt= $mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =1 LIMIT 1");
      $stmt->bind_params('ss', $nome_serigrafica_pedido1, $id_pedido); 
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close();



     $stmt=$mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =2 LIMIT 1");
      $stmt->bind_params('ss', $nome_serigrafica_pedido2, $id_pedido );
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close();


     $stmt=$mysqli->prepare("
UPDATE `serigrafica_pedido` SET `nome_serigrafica_pedido` = ? WHERE `id_pedido` = ? AND `pos_serigrafica` =3 LIMIT 1");
      $stmt->bind_params('ss', $nome_serigrafica_pedido3, $id_pedido );
      $stmt->execute();
	if (!$stmt) printf("Error: %s.\n", $sql->error);
      $stmt->close(); 
  

  
  $mysqli->close();
    }
    
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
