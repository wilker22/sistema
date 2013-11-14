<?php
	
		
		include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_acabamento($mysqli) == true) {

	

if(isset($_POST['pn'])){

	$id_pedido2 = $_POST['id_pedido2'];
	
	
	
	
	

              
              $sql = $mysqli->prepare("SELECT `id_pedido`, `data_pedido`, `nome_cliente`, `cnpj_cliente`, `ref_trabalho_pedido`, `id_representante` FROM `pedido_megalabel` NATURAL JOIN `cliente_megalabel` WHERE `id_pedido` = ?");
              $sql->bind_param('s', $id_pedido2);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($id_pedido3, $data_pedido, $nome_cliente, $cnpj_cliente, $ref_trabalho_pedido, $id_representante);
              $sql->fetch();
              $n_rows = $sql->num_rows;
              $sql->close();
	          		      $databr = implode("-",array_reverse(explode("-",$data_pedido)));
	          		      
              $sql = $mysqli->prepare("SELECT `id_ordem` FROM `ordem_producao_megalabel` WHERE `id_pedido` =? ");
              $sql->bind_param('s', $id_pedido2);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($id_ordem);
              $sql->fetch();
              $sql->close();
                            
              
              if($id_ordem ==""){
	              $id_ordem_final =" &nbsp; Nao possui Ordem Criada.";
              }
              else{
	              $id_ordem_final = $id_ordem;
              }
              
              $sql = $mysqli->prepare("SELECT `nome_representante` FROM `representantes` WHERE `id_representante` =? ");
              $sql->bind_param('s', $id_representante);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($nome_representante);
              $sql->fetch();
              $sql->close();


              $sql = $mysqli->prepare("SELECT `id_area` FROM `fluxo` WHERE `id_pedido` =? ");
              $sql->bind_param('s', $id_pedido2);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($id_area2);
              $sql->fetch();
              $sql->close();


              $sql = $mysqli->prepare("SELECT `nf_data` FROM `data_nf` WHERE `id_pedido` = ? ");
              $sql->bind_param('s', $id_pedido2);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($nf_data);
/*
              if($sql->num_rows ==""){
	                	      

              }
              else{   
	              
              }
 */
              $sql->fetch();
              $sql->close();
              if($nf_data==""){
	              $nf_databr = "NP";
              }	   
              else{       		      
	          $nf_databr = implode("-",array_reverse(explode("-",$nf_data)));
	          }


              
              
              
switch($id_area2){
		      case 1:
		      $area_final = "Pcp";
		      break;
		      
		      case 2:
		      $area_final = "Pcp";
		      break;
		      
		      case 3: 
		      $area_final = "Arte";
		      break;
		      
		      case 4:
		      $area_final= "Acabamento";
		      break;
		      
		      case 5:
		      $area_final= "Faturamento";
		      break;
		      
		      case 6:
		      $area_final = "Finalizado";
		      break;
		      
		      case 8: 
		      $area_final ="Faturamento";
		      break;
		      
		      case 9:
		      $area_final ="Producao";
		      break;
		      
		      case 10:
		      $area_final ="Canelado";
		      break;		      
	      }


	$dataString = $nome_representante.'|'.$ref_trabalho_pedido.'|'.$id_pedido2.'|'.$id_ordem_final.'|'.$databr.'|'.$nome_cliente.'|'.$cnpj_cliente.'|'.$area_final.'|'.$nf_databr.'||';

	              
if ($n_rows > 0){                  
		      	echo $dataString;
		      	}
		      	else{
		      	$inv = "Numero de pedido invalido!";
			      	echo $dataString = $inv.'||' ;
		      	}
	exit();
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