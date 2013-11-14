<?php
	
		include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_producao($mysqli) == true) {

//       busca_elem.setAttribute('name', 'busc_resp');         

$rpp = 8;
$last = ceil($total_rows/$rpp);
if($last < 1){
	$last = 1;
}	


if (isset($_POST['resp']) ){
	
	$url = 'http://www.rixd.com.br/megalabel/producao/pag_busca_resp.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 

	
}

	echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

	<script>
	
	function Busca(){

        var busca_elem = document.getElementById("bt_busca")
		var busca2 = document.getElementById("busca").value;  
					document.getElementById('busca_id').style.display='none'; 
					


		
		
if(busca2 =="repre"){
			document.getElementById('busca_repre').style.display='block';   
						document.getElementById('busca_ordem').style.display='none'; 
					document.getElementById('busca_id').style.display='none'; 
			document.getElementById('busca_respons').style.display='none';         
      

	
}		
		      
	      
	
		
		if(busca2 =="n_pedido"){
		
			document.getElementById('busca_id').style.display='block'; 
						document.getElementById('busca_ordem').style.display='none'; 
														document.getElementById('busca_respons').style.display='none'; 


		}
		
		if(busca2 == "n_ordem"){
			document.getElementById('busca_ordem').style.display='block'; 
						document.getElementById('busca_id').style.display='none'; 
														document.getElementById('busca_respons').style.display='none'; 


			
		}

		
		
	}
	
	function Buscaid(){
					var n_pedido = document.getElementById("id").value; 

	        var rpp =  $rpp;  // results per page
        var last =  $last; // last page number

request_page(1);

				 
				        function request_page(pn){
	var results_box = document.getElementById("results_box");
	var pagination_controls = document.getElementById("pagination_controls");
	results_box.innerHTML = "<div class='pedidofilacomerc'><ul><li><img src='/megalabel/img/teste2.gif' alt='Carregando' width='110' height='110'></li></ul></div>";
	var hr = new XMLHttpRequest();
    hr.open("POST", "busca_id.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			var dataArray = hr.responseText.split("||");
			var html_output = "";
		    for(i = 0; i < dataArray.length - 1; i++){
				var itemArray = dataArray[i].split("|");
				
		//		$dataString = $nome_representante.'|'.$ref_trabalho_pedido.'|'.$id_pedido2.'|'.$id_ordem_final.'|'.$databr.'|'.$nome_cliente.'|'.$cnpj_cliente.'|'.$area_final.'|'.$nf_databr.'||';

if( itemArray[0] == "Numero de pedido invalido!"){
	    html_output +=  "<div class='pedidofilacomerc'><ul> <li> "+itemArray[0]+" </li></div>";
}
	       else{
	    html_output +=  "<div class='pedidofilacomerc'><ul> <li>Nome Representante: "+itemArray[0]+" - &#32; Ref. Trabalho: "+itemArray[1]+" </li> <br /><li>Status: "+itemArray[7]+" - Pedido: "+itemArray[2]+" - Ordem:"+itemArray[3]+" - Data NF: &nbsp; "+itemArray[8]+" </li><br /> <li>  Data: "+itemArray[4]+"  -Empresa:  "+itemArray[5]+" - CNPJ: "+itemArray[6]+" </li> </ul><div class='btpedido1'><form action='ordem_pedido_busca.php' method='post'><input type='hidden' name='id_pedido' value='"+itemArray[2]+"'/><input type='submit'  name='verpedido' value='Visualizar'/></form></div></div>";
}
					
												          
													      
													    
			}
			results_box.innerHTML = html_output;
	    }
    }
    hr.send("pn="+pn+"&id_pedido2="+n_pedido);
}

				

	}
	
		function Busca_ordem(){
					var n_ordem = document.getElementById("n_ordem").value; 

	        var rpp =  $rpp;  // results per page
        var last =  $last; // last page number

request_page(1);

				 
				        function request_page(pn){
	var results_box = document.getElementById("results_box");
	var pagination_controls = document.getElementById("pagination_controls");
	results_box.innerHTML = "<div class='pedidofilacomerc'><ul><li><img src='/megalabel/img/teste2.gif' alt='Carregando' width='110' height='110'></li></ul></div>";
	var hr = new XMLHttpRequest();
    hr.open("POST", "busca_ordem.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			var dataArray = hr.responseText.split("||");
			var html_output = "";
		    for(i = 0; i < dataArray.length - 1; i++){
				var itemArray = dataArray[i].split("|");
				
		//		$dataString = $nome_representante.'|'.$ref_trabalho_pedido.'|'.$id_pedido2.'|'.$id_ordem_final.'|'.$databr.'|'.$nome_cliente.'|'.$cnpj_cliente.'|'.$area_final.'|'.$nf_databr.'||';


	       
		if( itemArray[0] == "Numero de ordem invalido!"){
	    html_output +=  "<div class='pedidofilacomerc'><ul> <li> "+itemArray[0]+" </li></div>";
}
	       else{
	    html_output +=  "<div class='pedidofilacomerc'><ul> <li>Nome Representante: "+itemArray[0]+" - &#32; Ref. Trabalho: "+itemArray[1]+" </li> <br /><li>Status: "+itemArray[7]+" - Pedido: "+itemArray[2]+" - Ordem:"+itemArray[3]+" - Data NF: &nbsp; "+itemArray[8]+" </li><br /> <li>  Data: "+itemArray[4]+"  -Empresa:  "+itemArray[5]+" - CNPJ: "+itemArray[6]+" </li> </ul><div class='btpedido1'><form action='ordem_pedido_busca.php' method='post'><input type='hidden' name='id_pedido' value='"+itemArray[2]+"'/><input type='submit'  name='verpedido' value='Visualizar'/></form></div></div>";
}			

												          
													      
													    
			}
			results_box.innerHTML = html_output;
	    }
    }
    hr.send("pn="+pn+"&id_ordem2="+n_ordem);
}

				

	}

	</script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                                                    <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/producao/producao.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/producao/producao.php" target="_self">
                        	<p align="center" class="fontemenu">Fila Producao</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
                        	
                            <a href="http://www.rixd.com.br/megalabel/producao/buscapedido.php" target="_self">
                        	<p align="center" class="fontemenu">Buscar Pedido</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/producao/buscas.php" target="_self">
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
                
                <table align="center" width="986px" border="0"  cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px"  align="center">
                            
                            
                            
                            
                            
	<div class="boxfila"><div class="headerfila">Buscar Pedidos</div>	
<br /> 

	      <div class="pedidofilacomerc">
	      <select name="busca" id="busca" onchange="Busca()" >
	      <option value="">Escolha a opção de busca desejada</option>
	      <option value="n_pedido">Buscar por nº Pedido.</option>
	      <option value="n_ordem">Buscar por nº Ordem.</option>
	      <option value="repre">Buscar por Representante.</option>
	      <select>
	      
	      <div id="busca_id" style="display:none">	      
	      <input type="text" name="id" id="id" />
	      <input type="button"  id="bt_busca" name="busc" value="buscar" onclick="Buscaid()"/>	      
	      </div>
	      
	      <div id="busca_ordem" style="display:none">	      
	      <input type="text" name="n_ordem" id="n_ordem" />
	      <input type="button"  id="bt_busca" name="busc" value="buscar" onclick="Busca_ordem()"/>	      
	      </div>

_END;

echo "<div id='busca_repre' style='display:none'><form action='pag_busca_repre.php' method='post'><select name='busca_repres' id='busca_repres'>";
$stmt = $mysqli->prepare("SELECT `nome_representante`, `id_representante` FROM representantes");
$stmt->execute();
$stmt->store_result();
       if ($stmt->error ) printf("Error: %s.\n", $stmt->error);	
$stmt->bind_result($nom_repre, $id_repre);
while($stmt->fetch()){
	echo "<option value='$id_repre'>$nom_repre</option>";
}

$stmt->close();    


echo "</select><input type='submit' name='ver_repre' value='Visualizar'/></form></div>";	      




echo <<< _END
	<div id="pagination_controls"></div>
<div id="results_box"></div>
_END;
	      /*
	      if(isset($_POST['busc_resp']) ){
		      
		      $stmt = $mysqli->prepare("SELECT  `id_pedido` 
FROM responsaveis
WHERE  `id_user` = ?
AND  `id_area` =2");
              $stmt->bind_param('s', $id_user);
              $stmt->execute();
              $stmt->store_result();
              $stmt->bind_result($id_pedido);
              while($stmt->fetch() ){
              
              $sql = $mysqli->prepare("SELECT `id_pedido`, `data_pedido`, `nome_cliente`, `cnpj_cliente`, `ref_trabalho_pedido` FROM `pedido_megalabel` NATURAL JOIN `cliente_megalabel` WHERE `id_pedido` = ?");
              $sql->bind_param('s', $id_pedido);
              $sql->execute();
              $sql->store_result();
              $sql->bind_result($id_pedido, $data_pedido, $nome_cliente, $cnpj_cliente, $ref_trabalho_pedido);
              $sql->fetch();
              $sql->close();
	          		      $databr = implode("-",array_reverse(explode("-",$data_pedido)));

	          echo <<< _END
	          
	          <div class="pedidofilacomerc">
	          									    <ul>
												    												    <li>
												    Representante: $nome_representante - &nbsp; Ref. Trabalho: $ref_trabalho_pedido
												    </li>
												    <br />
												    <li>
												    <li>
	          											  Pedido: $id_pedido - &nbsp;
													      Data: $databr  - &nbsp;
													      Empresa:  $nome_cliente - &nbsp;
													      CNPJ: $cnpj_cliente 
	          </ul></li>
</div>
_END;
	              
              }              
		      
	      }

	      */
	      
	      echo <<< _END
	      </div>

</div>
_END;



	      	echo <<< _END
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
                        	<a href="http://www.rixd.com.br/megalabel/producao/producao.php" target="_self">
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
      <form id="form" action="/megalabel/producao/process_login_producao.php" name="login_form" method="post" autocomplete="off">
      
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