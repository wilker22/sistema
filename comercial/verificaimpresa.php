<?php //verificaimpresa.php

require_once "/home/rixd/www/megalabel/funcoes/funcoes.php";


 if(isset($_POST['cnpj_cliente']) ){
	 
	 $cnpj_cliente= sanitizeString($_POST['cnpj_cliente']);
	 
	 
	 if (mysql_num_rows(queryMysql("`cliente_megalabel` 
WHERE  `cnpj_cliente` = '$cnpj_cliente'") ) )
$error = "O Cliente já existe2!<br />";

 }
 
?>