<?php //comercial.php
	
	include("/home/rixd/www/megalabel/funcoes/conecta_db.php");
	include("/home/rixd/www/megalabel/funcoes/funcoes_seguras.php");
	
	
	sec_session_start();
	
if(login_check_repre($mysqli) == true) {



  $data_pedido =  date("Y/m/d");
  $databr = implode("/",array_reverse(explode("/",$data_pedido)));
  


    
    
    
    
    
    
 $email_cliente_pedido = $_POST['email_cliente_pedido']; //ok
 $qtd_pedido = $_POST['qtd_pedido']; //ok
 $valor_faca_pedido = $_POST['valor_faca_pedido']; //ok
 $valor_cyrel_pedido = $_POST['valor_cyrel_pedido']; //ok
 $valor_milheiro_pedido = $_POST['valor_milheiro_pedido']; //ok
 $processo_pedido = $_POST['processo_pedido']; //ok
 $trabalho_pedido = $_POST['trabalho_pedido']; //ok
 $obs_pedido = $_POST['obs_pedido'];//ok
 $pedido_cliente_pedido = $_POST['pedido_cliente_pedido'];  //nao precisa
 $material_pedido = $_POST['material_pedido']; //ok
 
 $nome_tinta_imp_pedido0 = $_POST['nome_tinta_imp_pedido0'];//alterado
 $nome_tinta_imp_pedido1 = $_POST['nome_tinta_imp_pedido1'];//alterado
 $nome_tinta_imp_pedido2 = $_POST['nome_tinta_imp_pedido2'];//alterado
 $nome_tinta_imp_pedido3 = $_POST['nome_tinta_imp_pedido3'];//alterado
 $nome_tinta_imp_pedido4 = $_POST['nome_tinta_imp_pedido4'];//alterado
 $nome_tinta_imp_pedido5 = $_POST['nome_tinta_imp_pedido5'];//alterado
 $nome_tinta_imp_pedido6 = $_POST['nome_tinta_imp_pedido6'];//alterado
 $nome_tinta_imp_pedido7 = $_POST['nome_tinta_imp_pedido7'];//alterado
 
 $acabamento1_pedido = $_POST['acabamento1_pedido']; //ok
 $acabamento2_pedido = $_POST['acabamento2_pedido'];	//ok
 
 $nome_serigrafica_pedido0 = $_POST['nome_serigrafica_pedido0']; //alterado
 $nome_serigrafica_pedido1 = $_POST['nome_serigrafica_pedido1']; //alterado
 $nome_serigrafica_pedido2 = $_POST['nome_serigrafica_pedido2']; //alterado
 $nome_serigrafica_pedido3 = $_POST['nome_serigrafica_pedido3']; //alterado
 
 
 $rotulagem_pedido = $_POST['rotulagem_pedido']; //ok
 $cond_pag_pedido = $_POST['cond_pag_pedido']; //ok
 
 $forma_pag_pedido0 = $_POST['forma_pag_pedido0'];  //alterado
 $forma_pag_pedido1 = $_POST['forma_pag_pedido1'];  //alterado
 $forma_pag_pedido2 = $_POST['forma_pag_pedido2'];  //alterado 
 
 $end_cobranca_pedido = $_POST['end_cobranca_pedido']; //ok
 $opc_faturamento_pedido = $_POST['opc_faturamento_pedido']; // ok
 $tipo_frete_pedido = $_POST['tipo_frete_pedido']; //ok
 $transp_frete_pedido = $_POST['transp_frete_pedido']; //ok
 $cnpj_frete_pedido = $_POST['cnpj_frete_pedido']; //ok
 $tel_frete_pedido = $_POST['tel_frete_pedido']; //ok
 $cid_frete_pedido = $_POST['cid_frete_pedido']; //ok
 $est_frete_pedido = $_POST['est_frete_pedido']; //ok
 $empresa_nri_pedido = $_POST['empresa_nri_pedido'];
 $telefone_nri_pedido = $_POST['telefone_nri_pedido'];
 $cnpj_nri_pedido = $_POST['cnpj_nri_pedido'];
 $ie_nri_pedido = $_POST['ie_nri_pedido'];
 $endereco_nri_pedido = $_POST['endereco_nri_pedido'];
 $cep_nri_pedido = $_POST['cep_nri_pedido'];
 $bairro_nri_pedido = $_POST['bairro_nri_pedido'];
 $estado_nri_pedido = $_POST['estado_nri_pedido'];
 $cidade_nri_pedido = $_POST['cidade_nri_pedido'];		
 
 

  
        
    
if (isset($_POST['addpedido']))
{


   if ($id_cliente ==""){$erropedido="Favor incluir um cliente, o mesmo é obrigatorio!"; }
    elseif($ref_trabalho_pedido== ""){$erropedido="Favor preencher o campo Ref. Trabalho, o mesmo é obrigatorio!";}

    elseif($email_cliente_pedido== ""){$erropedido="Favor preencher o campo Email cliente, o mesmo é obrigatorio!";}
    elseif($valor_faca_pedido ==""){$erropedido="Favor preencher o campo Valor Faca, o mesmo é obrigatorio!"; }
    elseif($valor_cyrel_pedido ==""){$erropedido="Favor preencher o campo Valor Cyrel, o mesmo é obrigatorio!"; }
    elseif($valor_milheiro_pedido ==""){$erropedido="Favor preencher o campo Valor Milheiro, o mesmo é obrigatorio!"; }
	elseif($qtd_pedido ==""){$erropedido="Favor preencher o campo Quantidade, o mesmo é obrigatorio!"; }
	elseif($processo_pedido ==""){$erropedido="Favor preencher o campo Processo, o mesmo é obrigatorio!"; }
	elseif($trabalho_pedido ==""){$erropedido="Favor preencher o campo Trabalho, o mesmo é obrigatorio!"; }
    elseif($trabalho_pedido =="sim" && isset($_POST['alteracao_trabalho'])=="sim" && $obs_pedido =="" ){$erropedido="Quando um trabalho antigo sofre alteração o campo Obs./Alteração é obrigatorio!";}

	elseif($rotulagem_pedido ==""){$erropedido="Favor preencher o campo Rotulagem, o mesmo é obrigatorio!"; }
	elseif($material_pedido ==""){$erropedido="Favor preencher o campo Material, o mesmo é obrigatorio!"; }
	elseif($acabamento1_pedido ==""){$erropedido="Favor preencher o campo Acabamento 1, o mesmo é obrigatorio!"; }
	elseif($acabamento2_pedido ==""){$erropedido="Favor preencher o campo Acabamento 2, o mesmo é obrigatorio!"; }
    
	
	elseif($nome_tinta_imp_pedido0 =="" && $nome_tinta_imp_pedido1 =="" && $nome_tinta_imp_pedido2 =="" && $nome_tinta_imp_pedido3 =="" && $nome_tinta_imp_pedido4 =="" && $nome_tinta_imp_pedido5=="" && $nome_tinta_imp_pedido6 =="" && $nome_tinta_imp_pedido7 ==""){$erropedido="Favor preencher o campo Tinta Impressão, o mesmo é obrigatorio!"; }
	
	
	elseif($nome_serigrafica_pedido0 =="" && $nome_serigrafica_pedido1 =="" && $nome_serigrafica_pedido2 =="" && $nome_serigrafica_pedido3 ==""){$erropedido="Favor preencher o campo Serigrafica, o mesmo é obrigatorio!"; }


	elseif($cond_pag_pedido =="" && $cond_pag_pedido1 =="" && $cond_pag_pedido2 =="" ){$erropedido="Favor preencher o campo Condições de Pagto, o mesmo é obrigatorio!"; }
    
    elseif($forma_pag_pedido0 =="" && $forma_pag_pedido1=="" && $forma_pag_pedido2==""){$erropedido="Favor selecionar pelo menos uma das opções de pagto (Cheque, Boleto Bancario ou Deposito)"; }
	
	elseif($end_cobranca_pedido ==""){$erropedido="Favor preencher o campo End. Cobrança, o mesmo é obrigatorio!"; }
	elseif($opc_faturamento_pedido ==""){$erropedido="Favor preencher o campo Opção de Faturamento, o mesmo é obrigatorio!"; }
	
	elseif($tipo_frete_pedido=="cliente" && $transp_frete_pedido =="" ){$erropedido="Quando a opção de frete é Cliente todos os campos da Modalidade de Frete são obrigatorios!";}
	
		elseif($tipo_frete_pedido=="cliente" && $cnpj_frete_pedido =="" ){$erropedido="Quando a opção de frete é Cliente todos os campos da Modalidade de Frete são obrigatorios!";}

		
			elseif($tipo_frete_pedido=="cliente" &&  $tel_frete_pedido ==""){$erropedido="Quando a opção de frete é Cliente todos os campos da Modalidade de Frete são obrigatorios!";}

			
				elseif($tipo_frete_pedido=="cliente" && $cid_frete_pedido ==""){$erropedido="Quando a opção de frete é Cliente todos os campos da Modalidade de Frete são obrigatorios!";}

				
					elseif($tipo_frete_pedido=="cliente" && $est_frete_pedido ==""){$erropedido="Quando a opção de frete é Cliente todos os campos da Modalidade de Frete são obrigatorios!";}


		
		else{
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







$to = "pedido.mega@hotmail.com";
$subject = "Pedido: $last_id Cliente: $nome_cliente ";
$message = "Pedido $last_id 
Informações do pedido.
Email Cliente: $email_cliente_pedido
Valor Faca: $valor_faca_pedido
Valor Cyrel: $valor_cyrel_pedido
Valor Milheiro: $valor_milheiro_pedido
Quantidade: $qtd_pedido
Trabalho antigo?: $trabalho_pedido
Alteração: $obs_pedido
Rotulagem: $rotulagem_pedido
Material: $material_pedido
Acabamento 1: $acabamento1_pedido
Acabamento 2: $acabamento2_pedido
Tinta Impressão: $nome_tinta_imp_pedido0, $nome_tinta_imp_pedido1, $nome_tinta_imp_pedido2, $nome_tinta_imp_pedido3
Serigrafica: $nome_serigrafica_pedido0, $nome_serigrafica_pedido1, $nome_serigrafica_pedido2, $nome_serigrafica_pedido3
Condição de Pgato.: $cond_pag_pedido
Formas de Pagamento: $forma_pag_pedido0, $forma_pag_pedido1, $forma_pag_pedido2
Endereço de Cobrança: $end_cobranca_pedido
Opção de Faturamento: $opc_faturamento_pedido
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




$url = 'http://www.rixd.com.br/megalabel/comercial/comercialpedidos.php';
    echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'; 
			
			}
			
			 		}
			 		
			 		
			 		
			 		if(isset($_POST['addcliente']) ){

                if ($nome_cliente == "" || $cnpj_cliente == "" || $endereco_cliente == "" || $bairro_cliente == "" || $telefone_cliente == "" || $ie_cliente == "" || $cep_cliente == "" || $estado_cliente == "" || $cidade_cliente == "" || $endereco_entrega_cliente == "")
        $error = "Algum Campo ficou em branco!<br />";
        
        else
    {
    $stmt = $mysqli->prepare("SELECT * FROM  `cliente_megalabel` WHERE  `cnpj_cliente` = ?");
$stmt->bind_param('s', $cnpj_cliente);
$stmt->execute();
$stmt->store_result();

        if ($stmt->num_rows > 0){
            $error = "O Cliente já existe!<br />";
            if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
            $stmt->close();
            }
        else
		  {
	

	$stmt = $mysqli->prepare("INSERT INTO cliente_megalabel (`id_cliente`, `nome_cliente`, `cnpj_cliente`, `endereco_cliente`, `bairro_cliente`, `telefone_cliente`, `ie_cliente`, `cep_cliente`, `estado_cliente`, `cidade_cliente`, `endereco_entrega_cliente`) VALUES (NULL, ? , ?, ?, ?, ?, ?, ?, ?, ?, ? )");

		$stmt->bind_param('ssssssssss', $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente);
		$stmt->execute();
		$stmt->store_result();

           if ($stmt->error ) printf("Error: %s.\n", $sql->error);	
		$stmt->close();
    	}
	}
    }
    

	
	if(isset($_POST['pesquisacliente']) ){
	
	$id_cliente = $_POST['id_busca'];
	
	$stmt = $mysqli->prepare("SELECT * 
FROM  `cliente_megalabel` 
WHERE  `id_cliente` = ?");
$stmt->bind_param('s', $id_cliente);
$stmt->execute();
$stmt->store_result();
           if ($stmt->error ) printf("Error: %s.\n", $sql->error);								
$stmt->bind_result($id_cliente, $nome_cliente, $cnpj_cliente, $endereco_cliente, $bairro_cliente, $telefone_cliente, $ie_cliente, $cep_cliente, $estado_cliente, $cidade_cliente, $endereco_entrega_cliente);
		
$stmt->fetch();
$stmt->close();
   
    
    }

$mysqli->close();
	

    
    echo <<< _END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Megalabel</title>

<link rel="stylesheet" href="/megalabel/global.css">
<link rel="stylesheet" href="/megalabel/style.css">



<script>
function Cliente(){
	var id_cliente2 = document.getElementById("results_box").value;  
		var results_box2 = document.getElementById("results_box2");

		var xhr = new XMLHttpRequest();
    xhr.open("POST", "comercial_busca.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
	    if(xhr.readyState == 4 && xhr.status == 200) {
			var dataArray2 = xhr.responseText.split("||");
			var html_output2 = "";
		    for(i = 0; i < dataArray2.length - 1; i++){
				var itemArray2 = dataArray2[i].split("|");


	
		    html_output2 +=  "<li  class='linhaincluircliente' ><label for='nome_cliente'>Empresa: </label> <input type='text'  id='nome_cliente' name='nome_cliente' value='"+itemArray2[1]+"'/><label for='telefone_cliente'>Telefone: </label> <input type='text' id='telefone_cliente' name='telefone_cliente' value='"+itemArray2[5]+"'/><label for='cnpj_cliente'>CNPJ:</label> <input  type='text' id='cnpj_cliente' name='cnpj_cliente' value='"+itemArray2[2]+"'/></li><li class='linhaincluircliente'><label for='ie_cliente'>I.E: </label> <input type='text' id='ie_cliente' name='ie_cliente'  value='"+itemArray2[6]+"'/><label for='endereco_cliente'>Endereço: </label> <input  type='text' id='endereco_cliente' name='endereco_cliente' value='"+itemArray2[3]+"'/><label for='cep_cliente'>CEP: </label> <input type='text' id='cep_cliente' name='cep_cliente' value='"+itemArray2[7]+"'/></li><li class='linhaincluircliente'><label for='bairro_cliente'>Bairro: </label> <input  type='text' id='bairro_cliente' name='bairro_cliente' value='"+itemArray2[4]+"'/><label for='estado_cliente'>Estado: </label> <input type='text' id='estado_cliente' name='estado_cliente' value='"+itemArray2[8]+"'/><label for='cidade_cliente'>Cidade: </label> <input type='text' id='cidade_cliente' name='cidade_cliente' value='"+itemArray2[9]+"'/></li><li class='linhaincluircliente'><label for='endereco_entrega_cliente'>End. de entrega: </label> <input  type='text' id='endereco_entrega_cliente' name='endereco_entrega_cliente' value='"+itemArray2[10]+"'/></li>";
		    
		    
}
			results_box2.innerHTML = html_output2;
	    }
    }
    xhr.send("results_box2="+id_cliente2);
}

function Pesquisa(){
	document.getElementById('btaddcliente').name='pesquisacliente';
	document.getElementById('btaddcliente').value='Pesquisar Cliente';
	document.getElementById('boxbtaddcliente').style.display='block';
	

    document.getElementById('clientebusca').style.display='block'; 
    document.getElementById('erro').style.display='none';
    

	
}
function Adicionar(){   
	document.getElementById('btaddcliente').name='addcliente';
	document.getElementById('btaddcliente').value='Adicionar Cliente';
    document.getElementById('boxbtaddcliente').style.display='block';
    

    document.getElementById('clientebusca').style.display='none';
    document.getElementById('erro').style.display='none';

}

function pesquisaAlfabeto(clicked_id){
	var alfabeto = clicked_id;
	var results_box = document.getElementById("results_box");

	var hr = new XMLHttpRequest();
    hr.open("POST", "comercial_busca.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			var dataArray = hr.responseText.split("||");
			var html_output = "";
		    for(i = 0; i < dataArray.length - 1; i++){
				var itemArray = dataArray[i].split("|");
				
				
	       
	    html_output +=  "<option value='"+itemArray[1]+"'>"+itemArray[0]+"</option>";
			}
			results_box.innerHTML = html_output;
	    }
    }
    hr.send("alfabeto="+alfabeto);

	
}

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
                            

             
    <div id="boxpedido">
    <ul>
    <li id="h2pedido">Pedido</li>
    <li id="h2erro">$erropedido</li>

<div id="pedido_esquerda">


<div id="box_form_incluir_cliente">
<form id="form_incluir_cliente" action="comercial.php" method="post">
    <ul>
    <li id="h2cliente" >Cliente</li>
    <li id="erro_cliente">$error</li>
    <li> <input type="button" name="a" value="a" id="a" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="b" value="b" id="b" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="c" value="c" id="c" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="d" value="d" id="d" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="e" value="e" id="e" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="f" value="f" id="f" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="g" value="g" id="g" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="h" value="h" id="h" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="i" value="i" id="i" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="j" value="j" id="j" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="k" value="k" id="k" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="l" value="l" id="l" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="m" value="m" id="m" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="n" value="n" id="n" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="o" value="o" id="o" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="p" value="p" id="p" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="q" value="q" id="q" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="r" value="r" id="r" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="s" value="s" id="s" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="t" value="t" id="t" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="u" value="u" id="u" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="v" value="v" id="v" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="w" value="w" id="w" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="x" value="x" id="x" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="y" value="y" id="y" onClick="pesquisaAlfabeto(this.id)" />
    <input type="button" name="z" value="z" id="z" onClick="pesquisaAlfabeto(this.id)" /> 
    </li>
      
      <li>
      <form action="comercial.php" method="post">
      <select name="id_busca" id="results_box">
      <option value=''>Buscar Cliente pela primeira letra.</option>
      </select>
    <input type="submit" name="pesquisacliente" value="Selecionar" id="seleciona"  /> 
      </form>
      
      
<li  class='linhaincluircliente' >
<label for='nome_cliente'>Empresa: </label> <input type='text'  id='nome_cliente' name='nome_cliente' value='$nome_cliente'/>
<label for='telefone_cliente'>Telefone: </label> <input type='text' id='telefone_cliente' name='telefone_cliente' value='$telefone_cliente'/>
<label for='cnpj_cliente'>CNPJ:</label> <input  type='text' id='cnpj_cliente' name='cnpj_cliente' value='$cnpj_cliente'/>
</li>
<li class='linhaincluircliente'>
<label for='ie_cliente'>I.E: </label> <input type='text' id='ie_cliente' name='ie_cliente'  value='$ie_cliente'/>
<label for='endereco_cliente'>Endereço: </label> <input  type='text' id='endereco_cliente' name='endereco_cliente' value='$endereco_cliente'/>
<label for='cep_cliente'>CEP: </label> <input type='text' id='cep_cliente' name='cep_cliente' value='$cep_cliente'/>
</li>
<li class='linhaincluircliente'>
<label for='bairro_cliente'>Bairro: </label> <input  type='text' id='bairro_cliente' name='bairro_cliente' value='$bairro_cliente'/>
<label for='estado_cliente'>Estado: </label> <input type='text' id='estado_cliente' name='estado_cliente' value='$estado_cliente'/>
<label for='cidade_cliente'>Cidade: </label> <input type='text' id='cidade_cliente' name='cidade_cliente' value='$cidade_cliente'/>
</li>
<li class='linhaincluircliente'>
<label for='endereco_entrega_cliente'>End. de entrega: </label> <input  type='text' id='endereco_entrega_cliente' name='endereco_entrega_cliente' value='$endereco_entrega_cliente'/>
</li>
      
      </li>
      
      



   
</div>



<form id="form_incluir_pedido" action="comercial.php" method="post">
<div id="pedido_esq">
<ul>
<li id="h3espc">
<b>Nota de Remesssa de Industrialização</b></li>

 <li  class="linhaincluircliente" ><label for="empresa_nri_pedido">Empresa: </label> <input type="text"  id="empresa_nri_pedido" name="empresa_nri_pedido" value="$empresa_nri_pedido"/>
<label for="telefone_nri_pedido">Telefone: </label> <input type="text" id="telefone_nri_pedido" name="telefone_nri_pedido" value="$telefone_nri_pedido"/>
   </li>
   
   <li class="linhaincluircliente" ><label for="cnpj_nri_pedido">CNPJ:</label> <input  type="text" id="cnpj_nri_pedido" name="cnpj_nri_pedido" value="$cnpj_nri_pedido"/>
<label for="ie_nri_pedido">I.E: </label> <input type="text" id="ie_nri_pedido" name="ie_nri_pedido"  value="$ie_nri_pedido"/></li>
   
   <li class="linhaincluircliente"><label for="endereco_nri_pedido">Endereço: </label> <input  type="text" id="endereco_nri_pedido" name="endereco_nri_pedido" value="$endereco_nri_pedido"/>
<label for="cep_nri_pedido">CEP: </label> <input type="text" id="cep_nri_pedido" name="cep_nri_pedido" value="$cep_nri_pedido"/></li>

   <li class="linhaincluircliente"><label for="bairro_nri_pedido">Bairro: </label> <input  type="text" id="bairro_nri_pedido" name="bairro_nri_pedido" value="$bairro_nri_pedido"/>
<label for="estado_nri_pedido">Estado: </label> <input type="text" id="estado_nri_pedido" name="estado_nri_pedido" value="$estado_nri_pedido"/></li>

   <li class="linhaincluircliente"><label for="cidade_nri_pedido">Cidade: </label> <input type="text" id="cidade_nri_pedido" name="cidade_nri_pedido" value="$cidade_nri_pedido"/></li>
   
  
<li id="h3espc">
<label for="tipo_frete_pedido">
<b>Modalidade de Frete</b>
</label>
</li>
_END;

if (isset($_POST['tipo_frete_pedido']) && $_POST['tipo_frete_pedido'] =='megalabel'){


  echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
}

elseif (isset($_POST['tipo_frete_pedido']) && $_POST['tipo_frete_pedido'] =='representante'){
  echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
}

elseif (isset($_POST['tipo_frete_pedido']) && $_POST['tipo_frete_pedido'] =='cliente'){
  echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
}
   
elseif (isset($_POST['tipo_frete_pedido']) && $_POST['tipo_frete_pedido'] =='correio-mega'){
  echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
}    

elseif (isset($_POST['tipo_frete_pedido']) && $_POST['tipo_frete_pedido'] =='correio-cliente'){
  echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" checked="yes" value="correio-cliente">Correio-Cliente
    </li>
_END;
}
   
 else{
   echo <<< _END
<li>
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="megalabel">Megalabel
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="representante">Representante
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="cliente">Cliente
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-mega">Correio-Mega
    <input type="radio" name="tipo_frete_pedido" id="tipo_frete_pedido" value="correio-cliente">Correio-Cliente
    </li>
_END;
   
    }
    

echo <<< _END
<li class="linhaincluircliente">
<label for="transp_frete_pedido">Transportadora: </label> <input type="text" size="49" id="transp_frete_pedido" name="transp_frete_pedido" value="$transp_frete_pedido"/>
</li>

<li class="linhaincluircliente">
<label for="cnpj_frete_pedido">CNPJ:</label> <input size="25" type="text" id="cnpj_frete_pedido" name="cnpj_frete_pedido" value="$cnpj_frete_pedido"/>
<label for="tel_frete_pedido">Telefone: </label> <input type="text" id="tel_frete_pedido" name="tel_frete_pedido" value="$tel_frete_pedido"/>
</li>

<li class="linhaincluircliente">
<label for="cid_frete_pedido">Cidade: </label> <input type="text" id="cid_frete_pedido" name="cid_frete_pedido" value="$cid_frete_pedido"/>
<label for="est_frete_pedido">Estado: </label> <input type="text" id="est_frete_pedido" name="est_frete_pedido" value="$est_frete_pedido"/>
</li>
</div>

<input type="submit" name="addpedido" id="addpedido" value="Adicionar Pedido"/>

</div>   










<div id="pedido_col_esq">
<ul>
<li class="formpedido_col_esq">Representante: $nome_representante</li>

<li class="formpedido_col_esq">Data: $databr</li>

<li class="formpedido_col_esq" ><label for="ref_trabalho_pedido">Ref. Trabalho: </label><input type="text" id="ref_trabalho_pedido" style="width:90%" name="ref_trabalho_pedido" value="$ref_trabalho_pedido"/></li>
<li>
<label for="pedido_cliente_pedido">Numero de pedido do cliente: </label><input type="text" id="pedido_cliente_pedido"  name="pedido_cliente_pedido" value="$pedido_cliente_pedido"/>
</li>


<li class="formpedido_col_esq"><label for="email_cliente_pedido">Email Cliente: </label><input type="text" id="email_cliente_pedido" name="email_cliente_pedido" value="$email_cliente_pedido"/></li>
<li class="formpedido_col_esq"><label for="valor_faca_pedido">Valor Faca: </label><input type="text" id="valor_faca_pedido" name="valor_faca_pedido" value="$valor_faca_pedido"/></li>
<li class="formpedido_col_esq"><label for="valor_cyrel_pedido">Valor Cyrel: </label><input type="text" id="valor_cyrel_pedido" name="valor_cyrel_pedido" value="$valor_cyrel_pedido"/></li>
<li class="formpedido_col_esq"><label for="valor_milheiro_pedido">Valor Milheiro: </label><input type="text" id="valor_milheiro_pedido" name="valor_milheiro_pedido" value="$valor_milheiro_pedido"/></li>
<li class="formpedido_col_esq"><label for="qtd_pedido">Quantidade: </label><input type="text" id="qtd_pedido" name="qtd_pedido" value="$qtd_pedido"/></li>


<li class="formpedido_col_esq">
_END;


if (isset($_POST['processo_pedido']) && $_POST['processo_pedido'] =='flexo'){
echo <<< _END
<label for="processo_pedido">Processo:</label><input id="processo_pedido" type="radio" name="processo_pedido" checked="yes" value="flexo">FLEXO
<input type="radio" id="processo_pedido" name="processo_pedido" value="digital">DIGITAL</li>
_END;
}
elseif (isset($_POST['processo_pedido']) && $_POST['processo_pedido'] =='digital'){
echo <<< _END
<label for="processo_pedido">Processo:</label><input id="processo_pedido" type="radio" name="processo_pedido" value="flexo">FLEXO
<input type="radio" id="processo_pedido" name="processo_pedido" checked="yes" value="digital">DIGITAL</li>
_END;
}
else{	
echo <<< _END
<label for="processo_pedido">Processo:</label><input id="processo_pedido" type="radio" name="processo_pedido" value="flexo">FLEXO
<input type="radio" id="processo_pedido" name="processo_pedido" value="digital">DIGITAL</li>
_END;
}



echo <<< _END
    <li class="formpedido_col_esq">
    <label for="trabalho_pedido">Trabalho antigo?</label>
_END;



if (isset($_POST['trabalho_pedido']) && $_POST['trabalho_pedido'] =='sim'){
echo <<< _END
<label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" checked="yes" value="sim"> Sim</label>
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="nao"> Não</label>
    </li>
_END;
}
elseif(isset($_POST['trabalho_pedido']) && $_POST['trabalho_pedido'] =='nao'){
echo <<< _END
<label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="sim"> Sim</label>
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" checked="yes" value="nao"> Não</label>
    </li>
_END;
}
else{
echo <<< _END
	<label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="sim"> Sim</label>
    <label><input type="radio" name="trabalho_pedido" id="trabalho_pedido" value="nao"> Não</label>
    </li>
_END;
}



echo <<< _END
    <li class="formpedido_col_esq">
    <label for="alteracao_trabalho">Alteração?</label>
_END;


if(isset($_POST['alteracao_trabalho']) && $_POST['alteracao_trabalho'] =='sim'){
echo <<< _END
<label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" checked="yes" value="sim"> Sim</label>
    <label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" value="nao"> Não</label>
    </li>
_END;
}
elseif(isset($_POST['alteracao_trabalho']) && $_POST['alteracao_trabalho'] =='nao'){
echo <<< _END
<label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" value="sim"> Sim</label>
    <label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" checked="yes" value="nao"> Não</label>
    </li>
_END;
}
else{
echo <<< _END
<label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" value="sim"> Sim</label>
    <label><input type="radio" name="alteracao_trabalho" id="alteracao_trabalho" value="nao"> Não</label>
    </li>
_END;
}

echo <<< _END
<li class="formpedido_col_esq">
<label for="obs_pedido">Obs./Alteração :</label></li>
<li class="formpedido_col_esq">
<textarea id="obs_pedido" rows="6" cols="30" maxlength="240" name="obs_pedido" id="obs_pedido"></textarea>
</li>






<li class="formpedido_col_esq">
_END;

if (isset($_POST['rotulagem_pedido']) && $_POST['rotulagem_pedido'] =='automatica'){
echo <<< _END
<label for="rotulagem_pedido">Rotulagem:</label><input id="rotulagem_pedido" type="radio" checked="yes" name="rotulagem_pedido" value="automatica">Automatica
<input type="radio" id="rotulagem_pedido" name="rotulagem_pedido" value="manual">Manual</li>
_END;
}
elseif (isset($_POST['rotulagem_pedido']) && $_POST['rotulagem_pedido'] =='manual'){
echo <<< _END
<label for="rotulagem_pedido">Rotulagem:</label><input id="rotulagem_pedido" type="radio" name="rotulagem_pedido" value="automatica">Automatica
<input type="radio" id="rotulagem_pedido" name="rotulagem_pedido" checked="yes" value="manual">Manual</li>
_END;
}
else{
echo <<< _END
<label for="rotulagem_pedido">Rotulagem:</label><input id="rotulagem_pedido" type="radio" name="rotulagem_pedido" value="automatica">Automatica
<input type="radio" id="rotulagem_pedido" name="rotulagem_pedido" value="manual">Manual</li>
_END;
}

echo <<< _END
<li class="formpedido_col_esq">
<label for="material_pedido">Material: </label>
<select name="material_pedido">
_END;

if (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='raflex transparente'){
echo <<< _END
<option value="raflex transparente" selected >raflex transparente</option>
<option value="papel couche 30g adesivo">papel couche 30g adesivo</option>
<option value="papel couche">papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='papel couche 30g adesivo'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo" selected >papel couche 30g adesivo</option>
<option value="papel couche">papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='papel couche'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche" selected >papel couche </option>
<option value="bopp metalizado">bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='bopp metalizado'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado" selected >bopp metalizado</option>
<option value="bopp transparente">bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='bopp transparente'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente" selected >bopp transparente</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='bopp prata'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp prata" selected >bopp prata</option>
<option value="bopp branco perolizado">bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='bopp branco perolizado'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado" selected >bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='bopp branco'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco" selected >bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='raflex branco'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco" selected >raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='polietileno transparente'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente" selected >polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='polietileno branco'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco" selected >polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='polietileno prata'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco"  >polietileno branco</option>
<option value="polietileno prata" selected >polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
}

elseif (isset($_POST['material_pedido']) && $_POST['material_pedido'] =='outros'){
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco"  >bopp branco</option>
<option value="raflex branco"  >raflex branco</option>
<option value="polietileno transparente"  >polietileno transparente</option>
<option value="polietileno branco"  >polietileno branco</option>
<option value="polietileno prata"  >polietileno prata</option>
<option value="outros" selected >outros</option>
</select>
</li>
_END;
}

else{
echo <<< _END
<option value="raflex transparente"  >raflex transparente</option>
<option value="papel couche 30g adesivo"  >papel couche 30g adesivo</option>
<option value="papel couche"  >papel couche </option>
<option value="bopp metalizado"  >bopp metalizado</option>
<option value="bopp transparente"  >bopp transparente</option>
<option value="bopp branco perolizado"  >bopp branco perolizado</option>
<option value="bopp branco">bopp branco</option>
<option value="raflex branco">raflex branco</option>
<option value="polietileno transparente">polietileno transparente</option>
<option value="polietileno branco">polietileno branco</option>
<option value="polietileno prata">polietileno prata</option>
<option value="outros">outros</option>
</select>
</li>
_END;
	
}


echo <<< _END
<li class="formpedido_col_esq">
<label for="acabamento1_pedido">Acabamento 1:</label>
<select name="acabamento1_pedido" id="acabamento1_pedido">
_END;

if (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='verniz uv brilho total'){
echo <<< _END
<option value="verniz uv brilho total" selected >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='verniz uv brilho localizado'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado" selected >verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='verniz uv fosco total'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total" selected >verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='verniz uv fosco localizado'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado" selected >verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='laminacao fosca'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca" selected >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='laminacao brilho'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho" selected >laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='hot stamp ouro'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro" selected >hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='hot stamp prata'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata" selected >hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='hot stamp halografico'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico" selected >hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='hot stamp especial'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial" selected >hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='cold stamp ouro'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro" selected >cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='cold stamp prata'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata" selected >cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='cold stamp halografico'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='plastificacao holografica'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica" selected >plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='verniz brilho serigrafia'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento1_pedido']) && $_POST['acabamento1_pedido'] =='nenhum'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum" selected >nenhum</option>
</select>
</li>
_END;
}

else{
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halográfico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
	
}


echo <<< _END
<li class="formpedido_col_esq">
<label for="acabamento2_pedido">Acabamento 2:</label>
<select name="acabamento2_pedido" id="acabamento2_pedido">
_END;
if (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='verniz uv brilho total'){
echo <<< _END
<option value="verniz uv brilho total" selected >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='verniz uv brilho localizado'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado" selected >verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='verniz uv fosco total'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total" selected >verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}
elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='verniz uv fosco localizado'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado" selected >verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='laminacao fosca'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca" selected >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='laminacao brilho'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho" selected >laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='hot stamp ouro'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro" selected >hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='hot stamp prata'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata" selected >hot stamp prata</option>
<option value="hot stamp halografico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='hot stamp halografico'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico" selected >hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='hot stamp especial'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial" selected >hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='cold stamp ouro'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro" selected >cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='cold stamp prata'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata" selected >cold stamp prata</option>
<option value="cold stamp halografico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='cold stamp halografico'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='plastificacao holografica'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica" selected >plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='verniz brilho serigrafia'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
}

elseif (isset($_POST['acabamento2_pedido']) && $_POST['acabamento2_pedido'] =='nenhum'){
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado"  >verniz uv brilho localizado</option>
<option value="verniz uv fosco total"  >verniz uv fosco total</option>
<option value="verniz uv fosco localizado"  >verniz uv fosco localizado</option>
<option value="laminacao fosca"  >laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro"  >hot stamp ouro</option>
<option value="hot stamp prata"  >hot stamp prata</option>
<option value="hot stamp halografico"  >hot stamp halográfico</option>
<option value="hot stamp especial"  >hot stamp especial</option>
<option value="cold stamp ouro"  >cold stamp ouro</option>
<option value="cold stamp prata"  >cold stamp prata</option>
<option value="cold stamp halografico" selected >cold stamp halográfico</option>
<option value="plastificacao holografica"  >plastificacao holografica</option>
<option value="verniz brilho serigrafia" selected >verniz brilho serigrafia</option>
<option value="nenhum" selected >nenhum</option>
</select>
</li>
_END;
}

else{
echo <<< _END
<option value="verniz uv brilho total"  >verniz uv brilho total</option>
<option value="verniz uv brilho localizado">verniz uv brilho localizado</option>
<option value="verniz uv fosco total">verniz uv fosco total</option>
<option value="verniz uv fosco localizado">verniz uv fosco localizado</option>
<option value="laminacao fosca">laminacao fosca</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="laminacao brilho">laminacao brilho</option>
<option value="hot stamp ouro">hot stamp ouro</option>
<option value="hot stamp prata">hot stamp prata</option>
<option value="hot stamp halográfico">hot stamp halográfico</option>
<option value="hot stamp especial">hot stamp especial</option>
<option value="cold stamp ouro">cold stamp ouro</option>
<option value="cold stamp prata">cold stamp prata</option>
<option value="cold stamp halográfico">cold stamp halográfico</option>
<option value="plastificacao holografica">plastificacao holografica</option>
<option value="verniz brilho serigrafia">verniz brilho serigrafia</option>
<option value="nenhum">nenhum</option>
</select>
</li>
_END;
	
}

echo <<< _END
<li class="formpedido_col_esq">
<label for="nome_tinta_imp_pedido"><b>Tinta Impressão:</b></label>
</li>
<li class="formpedido_col_esq">
_END;

	       if (!isset($_POST['nome_tinta_imp_pedido0']) ){
	       echo 'Branco<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido0" value="branco" />';
	      }

	      else {
	      echo 'Branco<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido0" checked value="branco" />';

	      }


	       if (!isset($_POST['nome_tinta_imp_pedido1']) ){
	       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido1" value="pantone" />';
	      }

	      else {
	      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido1" checked value="pantone" />';

	      }

	       if (!isset($_POST['nome_tinta_imp_pedido2']) ){
	       echo 'Preto<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido2" value="preto" />';
	      }

	      else {
	      echo 'Preto<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido2" checked value="preto" />';

	      }

	       if (!isset($_POST['nome_tinta_imp_pedido3']) ){
	       echo 'Cromia<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido3" value="cromia" />';
	      }

	      else {
	      echo 'Cromia<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido3" checked value="cromia" />';

	      }
	echo <<< _END
</li>

<li class="formpedido_col_esq">
_END;

	       if (!isset($_POST['nome_tinta_imp_pedido4']) ){
	       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido4" value="pantone" />';
	      }

	      else {
	      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido4" checked value="pantone" />';

	      }


	       if (!isset($_POST['nome_tinta_imp_pedido5']) ){
	       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido5" value="pantone" />';
	      }

	      else {
	      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido5" checked value="pantone" />';

	      }

	       if (!isset($_POST['nome_tinta_imp_pedido6']) ){
	       echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido6" value="pantone" />';
	      }

	      else {
	      echo 'Pantone<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido6" checked value="pantone" />';

	      }

	       if (!isset($_POST['nome_tinta_imp_pedido7']) ){
	       echo 'Outros<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido7" value="outros" />';
	      }

	      else {
	      echo 'Outros<input type="checkbox" id="nome_tinta_imp_pedido" name="nome_tinta_imp_pedido7" checked value="outros" />';

	      }
	echo <<< _END
</li>






<li class="formpedido_col_esq">
<label for="nome_serigrafica_pedido"><b>Serigrafica:</b></label>
</li>
<li class="formpedido_col_esq">
_END;

       if (!isset($_POST['nome_serigrafica_pedido0']) ){
       echo 'Branco<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido0" value="branco"/>';
      }
      
      else {
      echo 'Branco<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido0" checked value="branco"/>';
	      
      }
      
       if (!isset($_POST['nome_serigrafica_pedido1']) ){
       echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido1" value="pantone"/>';
      }
      
      else{
      echo 'Pantone<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido1" checked value="pantone"/>';
	      
      }
      
             if (!isset($_POST['nome_serigrafica_pedido2']) ){
       echo 'Preto<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido2" value="preto"/>';
      }
      
      else{
      echo 'Preto<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido2" checked value="preto"/>';
	      
      }
      
       if (!isset($_POST['nome_serigrafica_pedido3']) ){
       echo 'Nao<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido3" value="nao"/>';
      }
      
      else {
      echo 'Nao<input type="checkbox" id="nome_serigrafica_pedido" name="nome_serigrafica_pedido3" checked value="nao"/>';
	      
      }
echo <<< _END
</li>



    <li class="formpedido_col_esq"><b>Condições de Pagto:</b>
    </li>
    <li>
    <input type="text" id="cond_pag_pedido" name="cond_pag_pedido"size="3" value="$cond_pag_pedido" />
    <input type="text" id="cond_pag_pedido1" name="cond_pag_pedido1"size="3" value="$cond_pag_pedido1" />
    <input type="text" id="cond_pag_pedido2" name="cond_pag_pedido2"size="3" value="$cond_pag_pedido2" />
    </li>
    
<li class="formpedido_col_esq">
_END;

       if (!isset($_POST['forma_pag_pedido0']) ){
       echo 'Cheque<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido0"  value="cheque"/>';
      }
      
      else {
      echo 'Cheque<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido0" checked value="cheque"/>';
	      
      }

       if (!isset($_POST['forma_pag_pedido1']) ){
       echo 'Boleto Bancario<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido1" value="boleto"/>';
      }
      
      else {
      echo 'Boleto Bancario<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido1" checked value="boleto"/>';
	      
      }
      
       if (!isset($_POST['forma_pag_pedido2']) ){
       echo 'Deposito<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido2" value="deposito" />';
      }
      
      else {
      echo 'Deposito<input type="checkbox" id="forma_pag_pedido" name="forma_pag_pedido2" checked value="deposito" />';
	      
      }

echo <<< _END
</li>

<li class="linhaincluircliente">
<label for="end_cobranca_pedido">End. Cobrança:</label> <input type="text" id="end_cobranca_pedido" name="end_cobranca_pedido" value="$endereco_cliente">
</li>

    <li class="formpedido_col_esq">
    <label for="opc_faturamento_pedido">Opção de Faturamento: </label>
_END;
    
           if (isset($_POST['opc_faturamento_pedido']) && $_POST['opc_faturamento_pedido'] == '1'){
           echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="1">1</label>
_END;
           }
else{
	echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="1">1</label>
_END;
}


if (isset($_POST['opc_faturamento_pedido']) && $_POST['opc_faturamento_pedido'] == '2'){
           echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="2">2</label>
_END;
           }
else{
	echo <<< _END
<label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="2">2</label>
_END;
}


if (isset($_POST['opc_faturamento_pedido']) && $_POST['opc_faturamento_pedido'] == '3'){
           echo <<< _END
    <label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="3">3</label>
_END;
           }
else{
	echo <<< _END
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="3">3</label>
_END;
}


if (isset($_POST['opc_faturamento_pedido']) && $_POST['opc_faturamento_pedido'] == '4'){
           echo <<< _END
    <label><input type="radio" name="opc_faturamento_pedido" checked="yes" id="opc_faturamento_pedido" value="4">4</label>
_END;
           }
else{
	echo <<< _END
    <label><input type="radio" name="opc_faturamento_pedido" id="opc_faturamento_pedido" value="4">4</label>
_END;
}

    echo <<< _END
    </li>
    
    
<input type="hidden" name="id_cliente" value="$id_cliente"/>
<input type="hidden" name="nome_cliente" value="$nome_cliente"/>
<input type="hidden" name="cnpj_cliente" value="$cnpj_cliente"/>
<input type="hidden" name="endereco_cliente" value="$endereco_cliente"/>
<input type="hidden" name="bairro_cliente" value="$bairro_cliente"/>
<input type="hidden" name="telefone_cliente" value="$telefone_cliente"/>
<input type="hidden" name="ie_cliente" value="$ie_cliente"/>
<input type="hidden" name="cep_cliente" value="$cep_cliente"/>
<input type="hidden" name="estado_cliente" value="$estado_cliente"/>
<input type="hidden" name="cidade_cliente" value="$cidade_cliente"/>
<input type="hidden" name="endereco_entrega_cliente" value="$endereco_entrega_cliente"/>

</div>



</form>


</div>


 

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