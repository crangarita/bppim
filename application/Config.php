<?php

//define('BASE_URL', 'http://192.168.3.145/mvc/');
//define('BASE_URL', 'http://localhost/mvc/');
//define('BASE_URL', 'http://localhost/bppim/');
define('DEFAULT_CONTROLLER', 'index');
define('DEFAULT_LAYOUT', 'default');

define('APP_NAME', 'Sistema de Gestion del Banco de Proyectos de Inversión Municipal');
define('APP_EMAIL', 'contacto@bppim.co');
define('APP_SLOGAN', 'Gestion');
define('APP_COMPANY', 'www.bppim.co');
define('SESSION_TIME', 100);
define('HASH_KEY', '4f6a6d832be79');

if (in_array(@$_SERVER['REMOTE_ADDR'], array(
    '127.0.0.1',
    '::1'
))) {
	define('BASE_URL', 'http://localhost/bppim/');
	define('DB_HOST', 'localhost');
	define('DB_HOST_LOCAL', true);	
}else {
	
	define('BASE_URL', 'http://cuidavet.com/');
	define('DB_HOST', 'localhost');	
	define('DB_HOST_LOCAL', false);	
}
//define('BASE_URL', 'http://www.cuidavet.com/');
//define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bppim');
define('DB_PORT', '');
define('DB_CHAR', 'utf8');

/**define('DB_HOST', '192.168.3.146');
define('DB_USER', 'db2admin');
define('DB_PASS', '123456');
define('DB_NAME', 'DBSIANX');
define('DB_CHAR', 'utf8');
define('DB_SCHEMA', 'DOCENTE');**/
?>