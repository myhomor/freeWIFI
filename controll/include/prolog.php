 <?
	include($_SERVER['DOCUMENT_ROOT'].'/config.php');
	mysql_connect(Config::$HOST, Config::$DB_USER, Config::$DB_PASS);
	mysql_select_db(Config::$DATA_BASE);
	
	//include($_SERVER['DOCUMENT_ROOT'].'/controll/include/_COOKIES.php');
	
	include($_SERVER['DOCUMENT_ROOT'].'/controll/include/functions.php');
	include($_SERVER['DOCUMENT_ROOT'].'/controll/include/funct_mail.php');
	
	include($_SERVER['DOCUMENT_ROOT'].'/controll/classes/c_mail.php');
	include($_SERVER['DOCUMENT_ROOT'].'/controll/classes/c_user.php');
	
?>