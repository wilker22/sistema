<?php
	
			include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_producao($mysqli) == true) {

//       busca_elem.setAttribute('name', 'busc_resp');  

$id_representante = $_POST['busca_repres'];   

$stmt = $mysqli->prepare("SELECT COUNT(`id_pedido`) FROM `pedido_megalabel` WHERE `id_representante` = ?"); 
$stmt->bind_param('s', $id_representante);
$stmt->execute();
$stmt->store_result();
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
$stmt->bind_result($total_rows);
$stmt->fetch();
$stmt->close();    

$rpp = 6;
$last = ceil($total_rows/$rpp);
if($last < 1){
	$last = 1;
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
	
	var rpp =  $rpp;  // results per page
    var last =  $last; // last page number
    var id_representante = $id_representante;

	        function request_page(pn){
	var results_box = document.getElementById("results_box");
	var pagination_controls = document.getElementById("pagination_controls");
	results_box.innerHTML = "<div class='pedidofilacomerc'><ul><li><img src='/megalabel/img/teste2.gif' alt='Carregando' width='110' height='110'></li></ul></div>";
	var hr = new XMLHttpRequest();
    hr.open("POST", "busca_repre.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			var dataArray = hr.responseText.split("||");
			var html_output = "";
		    for(i = 0; i < dataArray.length - 1; i++){
				var itemArray = dataArray[i].split("|");
				

	       
	    html_output +=  "<div class='pedidofilacomerc'><ul> <li>Nome Representante: "+itemArray[0]+" - &#32; Ref. Trabalho: "+itemArray[1]+" </li> <br /><li>Status: "+itemArray[7]+" - Pedido: "+itemArray[2]+" - Ordem:"+itemArray[3]+" - Data NF: &nbsp; "+itemArray[8]+" </li><br /> <li>  Data: "+itemArray[4]+"  -Empresa:  "+itemArray[5]+" - CNPJ: "+itemArray[6]+" </li> </ul><div class='btpedido1'><form action='ordem_pedido_busca.php' method='post'><input type='hidden' name='id_pedido' value='"+itemArray[2]+"'/><input type='submit'  name='verpedido' value='Visualizar'/></form></div></div>";

												          
													      
													    
			}
			results_box.innerHTML = html_output;
	    }
    }
    hr.send("rpp="+rpp+"&last="+last+"&pn="+pn+"&id_representante="+id_representante);
	// Change the pagination controls
	var paginationCtrls = "";
    // Only if there is more than 1 page worth of results give the user pagination controls
    if(last != 1){
		if (pn > 1) {
			paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
    	}
		paginationCtrls += ' &nbsp; &nbsp; <b>Pagina '+pn+' de '+last+'</b> &nbsp; &nbsp; ';
    	if (pn != last) {
        	paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
    	}
    }
	pagination_controls.innerHTML = paginationCtrls;
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
                        <td valign="top" width="356px" height="62px" align="center">
                        	
                        	<img name="Contatos" align="middle" src="/megalabel/img/menu6.jpg" border="0" height="62" width="472" />
                        	
                        </td>
                        
                        
                    </tr>	 
                    
                </table>
                
                <table align="center" width="986px" border="0"  cellpadding="0" cellspacing="0">
                 
                    <tr>
                    	
                        <td valign="top" width="986px"  align="center">
                            
                            
                            
                            
                            
	<div class="boxfila"><div class="headerfila">Pedidos Representante.</div>	
		<div id="pagination_controls"></div>
<div id="results_box"></div>
<script> request_page(1); </script>

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