<?php
	
			include("/home/rixd/www/megalabel/teste_class.php");


$novo = new Html_mega();
$novo->bt1 ="Relatorios";
$novo->bt1_link ="http://www.rixd.com.br/megalabel/relatorios/relatorios.php";
$novo->script =" function FilaRepresentante()  
{  
var id_representante = document.getElementById('id_representante').value;  
var xhr;  
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
    xhr = new XMLHttpRequest();  
} else if (window.ActiveXObject) { // IE 8 and older  
    xhr = new ActiveXObject('Microsoft.XMLHTTP');  
}  
var data = 'id_representante=' + id_representante;  
     xhr.open('POST', 'verifica_fila_representante.php', true);   
     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');                    
     xhr.send(data);  
xhr.onreadystatechange = display_data;  
    function display_data() {  
     if (xhr.readyState == 4) {  
      if (xhr.status == 200) {  
      
      document.getElementById('num_pedidos').innerHTML = xhr.responseText;  
      } else {  
        alert('Ocorreu um erro com a solicitaηγo.');  
      }  
     }  
    }  
}  

 function FilaPendentes()  
{  
var id_user2 = document.getElementById('id_user2').value;  
var xhr;  
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
    xhr = new XMLHttpRequest();  
} else if (window.ActiveXObject) { // IE 8 and older  
    xhr = new ActiveXObject('Microsoft.XMLHTTP');  
}  
var data = 'id_user2=' + id_user2;  
     xhr.open('POST', 'verifica_fila.php', true);   
     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');                    
     xhr.send(data);  
xhr.onreadystatechange = display_data;  
    function display_data() {  
     if (xhr.readyState == 4) {  
      if (xhr.status == 200) {  
      
      document.getElementById('num_pendentes').innerHTML = xhr.responseText;  
      } else {  
        alert('Ocorreu um erro com a solicitaηγo.');  
      }  
     }  
    }  
}  
";

echo $novo->mostra_html();
	
?>