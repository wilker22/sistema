<?php //relatorios.php

	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_relat($mysqli) == true) {

	echo <<< _END
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">

	<script>
 function FilaRepresentante()  
{  
var id_representante = document.getElementById("id_representante").value;  
var xhr;  
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
    xhr = new XMLHttpRequest();  
} else if (window.ActiveXObject) { // IE 8 and older  
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
}  
var data = "id_representante=" + id_representante;  
     xhr.open("POST", "verifica_fila_representante.php", true);   
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
     xhr.send(data);  
xhr.onreadystatechange = display_data;  
    function display_data() {  
     if (xhr.readyState == 4) {  
      if (xhr.status == 200) {  
      
      document.getElementById("num_pedidos").innerHTML = xhr.responseText;  
      } else {  
        alert('Ocorreu um erro com a solicitação.');  
      }  
     }  
    }  
}  

 function FilaPendentes()  
{  
var id_user2 = document.getElementById("id_user2").value;  
var xhr;  
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
    xhr = new XMLHttpRequest();  
} else if (window.ActiveXObject) { // IE 8 and older  
    xhr = new ActiveXObject("Microsoft.XMLHTTP");  
}  
var data = "id_user2=" + id_user2;  
     xhr.open("POST", "verifica_fila.php", true);   
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                    
     xhr.send(data);  
xhr.onreadystatechange = display_data;  
    function display_data() {  
     if (xhr.readyState == 4) {  
      if (xhr.status == 200) {  
      
      document.getElementById("num_pendentes").innerHTML = xhr.responseText;  
      } else {  
        alert('Ocorreu um erro com a solicitação.');  
      }  
     }  
    }  
}  

 </script>
    

</head>


<body topmargin="0" background="/megalabel/img/bg.jpg">	
<center>
				
                
                <table align="center" width="986px" height="125px" border="0" cellpadding="0" cellspacing="0">
                	
                    
                    <tr>
                    	
                        <td valign="top" width="986px" height="125px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
                            <img align="middle" src="/megalabel/img/topo.jpg" border="0" height="125" width="986" />
                            </a>  
                        </td>
                        
                    </tr>	 
                    
                </table> 
                
  <table align="center" width="986px" height="62px" border="0" cellpadding="0" cellspacing="0">
                    
                    <tr>
                    	
                  <td valign="top" background="/megalabel/img/menu_1.jpg" width="151px" height="62px" align="center">
   	                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
                        	<p align="center" class="fontemenu">Relatorios</p>
               	</a>
                         
                        </td>
                        
                  <td valign="top" width="112px" background="/megalabel/img/menu_2.jpg" height="62px" align="center">
   	                        	<a href="http://www.rixd.com.br/megalabel/relatorios/desbloqueia.php" target="_self">
                        	                 <p align="center" class="fontemenu">Desbloquear Usuário</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_2.jpg" width="146px" height="62px" align="center">
                        	 <a href="http://www.rixd.com.br/megalabel/relatorios/cliente.php" target="_self">
                        	<p align="center" class="fontemenu">Incluir Cliente</p>


                            </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_4.jpg" width="100px" height="62px" align="center">
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/busca.php" target="_self">
                        	<p align="center" class="fontemenu">Buscar</p>
                </a>
                         
                        </td>
                        
                  <td valign="top" background="/megalabel/img/menu_5.jpg" width="116px" height="62px" align="center">
                        	
                       
                        	<a href="http://www.rixd.com.br/megalabel/funcoes/logout.php" target="_self">
                        	<p align="center" class="fontemenu">Realizar Logout</p>
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
                        	<div class="box_top_relatorio">RELATORIOS</div>	
_END;

  echo"<ul class='box_relatorios'>  <li class='box_relatorios_1'>";
  $sql = $mysqli->prepare("SELECT 'id_pedido' FROM `pedido_megalabel`");
  $sql->execute();
  $sql->store_result();
                  if ($sql->error ) printf("Error: %s.\n", $sql->error);	

  $pedidos_abertos = $sql->num_rows;  
  echo "Pedidos Realizados: &nbsp; $pedidos_abertos";
  $sql->close();
  echo "</li>";
  
  



echo "<li class='box_relatorios_2'>";
$inicial=1;
$pcp=2;
$arte=3;
$acabamento=4;
$faturamento=5;
$sql = $mysqli->prepare("
SELECT  `id_pedido`
FROM  `pedido_megalabel` 
NATURAL JOIN fluxo
WHERE  `id_area` = ? OR `id_area` = ? OR `id_area` = ? OR `id_area` = ? OR `id_area` = ?");
$sql->bind_param('sssss', $inicial, $pcp, $arte, $acabamento, $faturamento);
$sql->execute();
$sql->store_result();
                if ($sql->error ) printf("Error: %s.\n", $sql->error);	

$num_pedidos_pendentes = $sql->num_rows;  
echo "Pedidos Pendentes: &nbsp;  $num_pedidos_pendentes";
$sql->close();
echo "</li>";



echo "<li class='box_relatorios_3'>";
$sql = $mysqli->prepare("
SELECT  `id_pedido`
FROM  `pedido_megalabel` 
NATURAL JOIN fluxo
WHERE  `id_area` = ? ");

    $pedidos_finalizados = 6;
    $sql->bind_param('s', $pedidos_finalizados);
    $sql->execute();
    $sql->store_result();
                if ($sql->error ) printf("Error: %s.\n", $sql->error);	

    $num_pedidos_finalizados = $sql->num_rows;  
    echo "Pedidos Finalizados: &nbsp; $num_pedidos_finalizados";
$sql->close();
echo"</li>";



  echo"<li class='box_relatorios_4'>";
  $sql = $mysqli->prepare("
SELECT  `id_pedido`
FROM  `pedido_megalabel` 
NATURAL JOIN fluxo
WHERE  `id_area` = ? ");
 $pedidos_cancelados = 10;
 
 
 $sql->bind_param('s', $pedidos_cancelados);
    $sql->execute();
    $sql->store_result();
                if ($sql->error ) printf("Error: %s.\n", $sql->error);	
    $num_pedidos_cancelados = $sql->num_rows;            
    echo "Pedidos Cancelados: &nbsp; $num_pedidos_cancelados";
$sql->close();

  
  echo"</li>";




echo"</ul>";






echo <<< _END
<div class="box_relatorios">
<form name="fila_representante" id="fila_representante">
<ul>
<li>
&nbsp;
Total de: &nbsp; <a id="num_pedidos"></a>  &nbsp; pedidos realizados pelo 
<label for="id_representante">Representante: </label>
<select name="id_representante" id="id_representante" onchange="FilaRepresentante()" >
<option value="">Selecione um Representante:</option>
_END;

$sql = $mysqli->prepare("
SELECT `id_representante`, `nome_representante` FROM `representantes`");
    $sql->execute();
    $sql->bind_result($id_representante, $nome_representante);

 
while ($sql->fetch() ){
    echo"<option value='$id_representante'>$nome_representante</option>";

}
$sql->close();


echo <<< _END
</select>

</li>

</ul>
</form>

</div>






<div class="box_relatorios">
<form name="fila_usuario" id="fila_usuario">
<ul>
<li>
&nbsp;
Total de: &nbsp; <a id="num_pendentes"></a>  &nbsp; pedidos pendentes na fila do  
<label for="id_user2">Usuário: </label>
<select name="id_user2" id="id_user2" onchange="FilaPendentes()" >
<option value="">Selecione um Usuário:</option>
_END;

$sql = $mysqli->prepare("
SELECT `id_user`, `nome_user` FROM `usuarios_megalabel`");
    $sql->execute();
    $sql->bind_result($id_user2, $nome_user2);

 
while ($sql->fetch() ){
    echo"<option value='$id_user2'>$nome_user2</option>";

}
$sql->close();
$mysqli->close();

echo <<< _END
</select>
</li>
</ul>
</form>
</div>
_END;


echo"<div class='box_bottom_relatorio'></div>";

                        



echo "</select></li></ul></div>";
                      
                        
                        
               
                        
                        
                        
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
                        	<a href="http://www.rixd.com.br/megalabel/relatorios/relatorios.php" target="_self">
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
      <form id="form" action="/megalabel/relatorios/process_login_relat.php" name="login_form" method="post" autocomplete="off">
      
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