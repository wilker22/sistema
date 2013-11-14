<?php //conecta_db
	
		
define("HOST", "mysql.rixd.com.br");
define("USUARIO", "rixd");
define("SENHA", "oito88");
define("DATABASE", "rixd");

$mysqli = new mysqli(HOST, USUARIO, SENHA, DATABASE );


if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
	
	
?>